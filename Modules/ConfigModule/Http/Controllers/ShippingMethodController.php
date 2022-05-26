<?php

namespace Modules\ConfigModule\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Modules\ConfigModule\Entities\ShippingMethod;
use Modules\CommonModule\Helper\UploaderHelper;

class ShippingMethodController extends Controller
{

    use UploaderHelper;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:show_shipping_method')->only('index');
        $this->middleware('permission:add_shipping_method')->only('create');
        $this->middleware('permission:delete_shipping_method')->only('destroy');
        $this->middleware('permission:update_shipping_method')->only(['edit', 'update']);

    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $methods = ShippingMethod::all();
        return view('configmodule::admin.shippingmethod.index', compact('methods'));
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {


        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data['image'] = $this->upload($request->file('photo'), 'img');
        ShippingMethod::create($data);
        return redirect()->back()->with('success', 'success');


    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        ShippingMethod::destroy($id);
        return redirect()->back()->with('deleted', 'deleted');
    }
}
