<?php

namespace Modules\ProductFeatureModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\ProductFeatureModule\Entities\Deliverytime;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\ProductFeatureModule\Repository\DeliverytimeRepository;

// use Maatwebsite\Excel\Excel;

class DeliveryTimeController extends Controller
{
    use UploaderHelper;
    use ApiResponseHelper;


    /**
     * @var DeliverytimeRepository
     */
    private DeliverytimeRepository $deliverytimeRepository;

    public function __construct(DeliverytimeRepository $deliverytimeRepository)
    {
        $this->middleware('is_admin');

        $this->middleware('permission:show_deliverytime')->only('index');
        $this->middleware('permission:add_deliverytime')->only('create');
        $this->middleware('permission:delete_deliverytime')->only('destroy');
        $this->middleware('permission:update_deliverytime')->only(['edit', 'update']);
        $this->deliverytimeRepository = $deliverytimeRepository;
    }

    public function index()
    {
        $deliveryTimes = Deliverytime::OrderBy('sort_order', 'desc')->get();
        return view('productfeaturemodule::admin.delivery_time.index', compact('deliveryTimes'));
    }


    public function create()
    {
        return view('productfeaturemodule::admin.delivery_time.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'deliverytime_ar' => 'required',
            'deliverytime_en' => 'required',
            'sort_order' => 'required',
            'for_user' => 'required',
            'for_merchant' => 'required',
        ]);

        Deliverytime::create($data);
        return redirect('admin/delivery_time')->with('success', 'success');
    }

    public function edit($id)
    {
        $delivery_time = Deliverytime::find($id);
        return view('productfeaturemodule::admin.delivery_time.edit', compact('delivery_time'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'deliverytime_ar' => 'required',
            'deliverytime_en' => 'required',
            'sort_order' => 'required',
            'for_user' => 'required',
            'for_merchant' => 'required',
        ]);

        Deliverytime::where('id', $id)->update($data);

        return redirect('admin/delivery_time')->with('updated', 'updated');

    }


    public function destroy($id)
    {
        // set delivery_id of order and check to delete

        $status = $this->deliverytimeRepository->delete($id);
        if ($status)
            return redirect('admin/delivery_time')->with('deleted', 'deleted');

        return redirect('admin/delivery_time')->with('deleted', __('productfeaturemodule::admin.cant_delete_assign_time'));

    }


}
