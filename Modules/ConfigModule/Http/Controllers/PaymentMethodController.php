<?php

namespace Modules\ConfigModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ConfigModule\Entities\PaymentMethod;
use Modules\CommonModule\Helper\UploaderHelper;

class PaymentMethodController extends Controller
{

    use UploaderHelper;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:show_payment_method')->only('index');
        $this->middleware('permission:add_payment_method')->only('create');
        $this->middleware('permission:delete_payment_method')->only('destroy');
        $this->middleware('permission:update_payment_method')->only(['edit', 'update']);

    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $methods = PaymentMethod::all();
        return view('configmodule::admin.paymentmethod.index', compact('methods'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data['image'] = $this->upload($request->file('photo'), 'img');
        PaymentMethod::create($data);
        return redirect()->back()->with('success', 'success');


    }


    public function destroy($id)
    {
        PaymentMethod::destroy($id);

        return redirect()->back()->with('deleted', 'deleted');
    }
}
