<?php

namespace Modules\ConfigModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ConfigModule\Entities\Tax;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\CommonModule\Helper\ApiResponseHelper;

class TaxController extends Controller
{

    use UploaderHelper;
    use ApiResponseHelper;


    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:tax');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $tax = Tax::all()->first();
        return view('configmodule::admin.tax.index', compact('tax'));
    }

    public function saveTaxStatus(Request $request)
    {
        $status = $request->status;
        $id = $request->id;

        $update_status = Tax::where('id', $id)->update(['is_active' => $status]);
        if ($update_status) {
            return $this->setCode(200)->setSuccess(__('commonmodule::swal.edited'))->send();

        }

    }

    public function saveTaxShipping(Request $request)
    {
        $status = $request->status;
        $id = $request->id;

        $update_status = Tax::where('id', $id)->update(['tax_shipping' => $status]);
        if ($update_status) {
            return $this->setCode(200)->setSuccess(__('commonmodule::swal.edited'))->send();

        }

    }

    public function saveTaxProduct(Request $request)
    {
        $status = $request->status;
        $id = $request->id;

        $update_status = Tax::where('id', $id)->update(['tax_product' => $status]);
        if ($update_status) {
            return $this->setCode(200)->setSuccess(__('commonmodule::swal.edited'))->send();

        }

    }

    public function saveOtherCountryTax(Request $request)
    {
        $other_country_tax = $request->other_country_tax;
        $id = $request->id;

        $update_status = Tax::where('id', $id)->update(['other_country_tax' => $other_country_tax]);


        $status = ($update_status) ? 'updated' : 'failed';
        return redirect('admin/tax')->with('updated', $status);


    }

    public function saveCountryTax(Request $request)
    {
        $country_tax = $request->country_tax;
        $id = $request->id;

        $update_status = Tax::where('id', $id)->update(['country_tax' => $country_tax]);


        $status = ($update_status) ? 'updated' : 'failed';
        return redirect('admin/tax')->with('updated', $status);


    }
}
