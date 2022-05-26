<?php

namespace Modules\ConfigModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ConfigModule\Repository\VoucherRepository;
use Modules\OrderModule\Repository\OrderRepository;


use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\CommonModule\Helper\LanguageHelper;
use Session;


class VoucherController extends Controller
{

    use ApiResponseHelper;

    private $voucherRepository;

    public function __construct(VoucherRepository $repo, OrderRepository $orderRepository)
    {
        $this->middleware('auth:admin')->except('checkCode');
        $this->middleware('permission:show_voucher')->only('index');
        $this->middleware('permission:add_voucher')->only('create');
        $this->middleware('permission:delete_voucher')->only('destroy');
        $this->middleware('permission:update_voucher')->only(['edit', 'update']);

        $this->voucherRepository = $repo;
        $this->orderRepository = $orderRepository;

    }

    public function checkCode(Request $request)
    {
        $total = $this->orderRepository->calSubTotal();
        $currency = Session::get('currency');


        $code = $this->voucherRepository->findCode($total, $request->code);

        if ($code['code'] == 200) {
            if ($code['item']->min_total >= $total)
                return $this->setCode(201)->SetError(__('commonmodule::validation.voucher_code_limit') . ' ' . $code['item']->min_total * $currency->value . ' ' . LanguageHelper::nameTranslate($currency))->send();

            $data = $this->voucherRepository->calAmount($total, $code['item']);
            $total = $total - $data['amount'];
            $data['total_after_disc'] = $total;
            $tax_percent = $request->tax_percent;
            $total_tax = ($total * $tax_percent) / 100;
            $total_after_tax = $total + $total_tax;
            $data['total'] = $total_after_tax;
            $data['message'] = __('commonmodule::validation.voucher_success');
            $data['currency'] = LanguageHelper::nameTranslate($currency);

            return $this->setCode(200)->setData($data)->send();
        }
        return $this->setCode(201)->SetError($code['message'])->send();
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        $vouchers = $this->voucherRepository->FindAllVouchers();

        return view('configmodule::admin.voucher.index', compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('configmodule::admin.voucher.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {


        request()->validate([
            'code' => 'required|unique:vouchers',
            'max_num_of_use' => 'required|numeric',
            'min_total' => 'required|numeric',
            'from' => 'required|date',
            'to' => 'required|date|after:from',
            'voucher_type' => 'required|numeric',
            'status' => 'required',
            'amount' => 'numeric',
            'percentage' => 'numeric',
        ]);


        $data = $this->voucherRepository->saveVoucher($request->except('_token'));

        return redirect('admin/voucher')->with('success', 'success');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {

        return view('configmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $voucher = $this->voucherRepository->findById($id);

        return view('configmodule::admin.voucher.edit', compact('voucher'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'code' => 'required|unique:vouchers,id,' . $id,
            'max_num_of_use' => 'required|numeric',
            'min_total' => 'required|numeric',
            'from' => 'required|date',
            'to' => 'required|date|after:from',
            'voucher_type' => 'required|numeric',
            'status' => 'required',
            'amount' => 'numeric',
            'percentage' => 'numeric',

        ]);
        $data = $request->except(['_token', '_method']);
        if ($data['voucher_type'] == 1)
            $data['percentage'] = null;
        else
            $data['amount'] = null;

        $voucher = $this->voucherRepository->update($data, $id);
        return redirect('admin/voucher')->with('updated', 'updated');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->voucherRepository->delete($id);
        return redirect('admin/voucher');
    }


    public function bulk(Request $request)
    {
        $request->validate([
            'ids' => 'required',
            'method' => 'required|in:active,de-active,delete',
        ]);

        $ids = explode(',', $request->get('ids'));
        switch ($request->get('method')) {
            case 'active':
                $this->voucherRepository->bulkStatus($ids, 'enabled');
                break;
            case 'de-active':
                $this->voucherRepository->bulkStatus($ids, 'disabled');
                break;
            case 'delete':
                $failed = bulkDelete('vouchers', $request->get('ids'));
                break;
        }

        if ($failed ?? false)
            return back()->with('warning', __('productmodule::admin.warn_count', ['attribute' => $failed]));
        return back()->with('success', 'success');
    }

}
