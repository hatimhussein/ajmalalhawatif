<?php

namespace Modules\ConfigModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\ConfigModule\Entities\MenuLink;

class MenuLinkController extends Controller
{
    use ApiResponseHelper;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:menu_links');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $links = MenuLink::orderBy('sort', 'asc')->get();
        return view('configmodule::admin.menu.index', compact('links'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $link = MenuLink::find($id);
        $link->update($request->only('status', 'sort'));
        return $this->setCode(200)->setSuccess(__('commonmodule::validation.updated'))->send();
    }

}
