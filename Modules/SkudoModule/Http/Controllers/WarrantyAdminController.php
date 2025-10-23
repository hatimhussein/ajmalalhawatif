<?php

namespace Modules\SkudoModule\Http\Controllers;

use App\Exports\WarrantyExport;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\ConfigModule\Repository\CurrencyRepository;
use Modules\SkudoModule\Notifications\WarrantyReplyNotification;
use Modules\SkudoModule\Repository\WarrantyRepository;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class WarrantyAdminController extends Controller
{
    use ApiResponseHelper;

    private WarrantyRepository $warrantyRepository;
    private CurrencyRepository $currencyRepository;

    public function __construct(WarrantyRepository $warrantyRepository, CurrencyRepository $currencyRepository)
    {
        $this->middleware('permission:warranty');
        $this->warrantyRepository = $warrantyRepository;
        $this->currencyRepository = $currencyRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $type = $request->get('type', 'card');
        $warranties = $this->warrantyRepository->query()->where('type', $type);

        switch ($request->get('filter')) {
            case 'completed':
                $warranties->where('is_applicable', '!=', 2);
                break;
            case 'new':
                $warranties->where('is_applicable', '=',null);
                break;
            case 'in_progress':
                $warranties->where('is_applicable', '=',2);
                break;
            default:
                break;
        }

        if ($request->get('date')) {
            $warranties->whereDate('created_at', $request->get('date'));
        }

        $warranties = $warranties->with(['admin', 'merchant', 'currency', 'insurance'])->get();

        $localeFile = $type == 'sms' ? 'sms_warranty' : 'warranty';

        return view('skudomodule::admin.warranty.index', compact('warranties', 'localeFile'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $warranty = $this->warrantyRepository->first(['id' => $id]);

        $localeFile = $warranty->type == 'sms' ? 'sms_warranty' : 'warranty';

        return view('skudomodule::admin.warranty.edit', compact('warranty', 'localeFile'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $data = $request->validate([
            'is_applicable' => 'nullable|in:1,0,2',
            'application_number' => 'required_if:is_applicable,1',
            'value' => 'required_if:is_applicable,1|nullable|numeric|min:0',
            'reason' => 'required_if:is_applicable,0',
            'store_reason' => 'required_without:is_applicable',
        ]);

        if ($data['is_applicable']) {
            $data['reason'] = null;
            $data['currency_id'] = $this->currencyRepository->getDefaultCurrency()->id;
        } else if ($data['is_applicable'] === '0') {
            $data['value'] = null;
            $data['application_number'] = null;
            $data['currency_id'] = null;
        } else {
            $data['value'] = null;
            $data['application_number'] = null;
            $data['reason'] = null;
        }

        $data['admin_id'] = auth('admin')->id();

        $warranty = $this->warrantyRepository->first(['id' => $id]);

        $warranties = $warranty->with(['admin', 'merchant', 'currency', 'insurance'])->get();

        $this->warrantyRepository->newMarkSeen($warranties,$id);

        if (is_null($warranty->replied_at)) $data['replied_at'] = now();

        $warranty->update($data);

        notify($warranty->merchant, new WarrantyReplyNotification($warranty));

        return redirect()->route('skudo.warranty.index', ['type' => $warranty->type])->with('updated', 'updated');
    }

    /**
     * @return BinaryFileResponse
     */
    public function export(): BinaryFileResponse
    {
        return Excel::download(new WarrantyExport($this->warrantyRepository), 'Warranties.xlsx');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy($id): RedirectResponse
    {
        $warranty = $this->warrantyRepository->first(['id' => $id]);
        $warranty->delete();
        return redirect()->route('skudo.warranty.index', ['type' => $warranty->type])->with('updated', 'updated');
    }
}
