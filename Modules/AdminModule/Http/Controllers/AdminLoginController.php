<?php

namespace Modules\AdminModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminLoginController extends Controller
{
    function showLoginForm()
    {
        return view('adminmodule::login');
    }

    function login(Request $request)
    {
        $rememberme = request()->has('rememberme') ? 1 : 0;
        if (auth()->guard('admin')->attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ], $rememberme)) {

            return redirect(redirect()->intended('/admin')->getTargetUrl());
        }

        return redirect()->back()->withErrors(['error' => __('usermodule::login.in_valid_login')]);
    }


    function adminLogout()
    {
        auth()->guard('admin')->logout();
        return redirect()->to('/admin/login');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('adminmodule::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('adminmodule::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('adminmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('adminmodule::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
