<?php

namespace Modules\SkudoModule\Http\Controllers;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\SkudoModule\Repository\ReturnRepository;

class ReturnAdminController extends Controller
{
    /**
     * @var ReturnRepository
     */
    private ReturnRepository $returnRepository;

    public function __construct(ReturnRepository $returnRepository)
    {
        $this->middleware('permission:returns');
        $this->returnRepository = $returnRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Application|Factory|View
     */
    public function index()
    {
        $returns = $this->returnRepository->all();
        $returns->load('user', 'order_product.product', 'order_product.order.currency', 'address', 'reason');

        $this->returnRepository->markSeen($returns);

        return view('warrantymodule::admin.returns.index', compact('returns'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        // TODO::update status
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(int $id): RedirectResponse
    {
        $return = $this->returnRepository->first(['id' => $id]);
        $return->delete();
        return redirect()->route('skudo.returns.index')->with('deleted', 'deleted');
    }
}
