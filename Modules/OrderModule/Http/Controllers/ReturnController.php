<?php

namespace Modules\OrderModule\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

class ReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     * Redirect to WarrantyModule returns
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('front.warranty.returns.index');
    }

    /**
     * Show the form for creating a new resource.
     * Redirect to WarrantyModule returns orders
     */
    public function create(): RedirectResponse
    {
        return redirect()->route('front.warranty.returns.orders');
    }

    /**
     * Store a newly created resource in storage.
     * Redirect to WarrantyModule returns orders
     */
    public function store(): RedirectResponse
    {
        return redirect()->route('front.warranty.returns.orders');
    }
}
