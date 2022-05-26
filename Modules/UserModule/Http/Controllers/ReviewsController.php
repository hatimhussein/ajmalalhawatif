<?php

namespace Modules\UserModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ProductModule\Entities\ProductReview;


class ReviewsController extends Controller
{

    public function index()
    {
        return view('usermodule::index');
    }

    public function create()
    {
        return view('usermodule::create');
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        return view('usermodule::show');
    }


    public function edit($id)
    {
        return view('usermodule::edit');
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
