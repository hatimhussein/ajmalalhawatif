<?php

namespace Modules\WarrantyModule\Http\Controllers;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Modules\WarrantyModule\Repository\ReturnRepository;

class ReturnReasonController extends Controller
{
    /**
     * @var ReturnRepository
     */
    private ReturnRepository $returnRepository;

    public function __construct(ReturnRepository $returnRepository)
    {
        $this->middleware('permission:return_reason');
        $this->returnRepository = $returnRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Application|Factory|View
     */
    public function index()
    {
        $reasons = $this->returnRepository->getAllReturnReasons();
        return view('warrantymodule::admin.returns.reasons.index', compact('reasons'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('warrantymodule::admin.returns.reasons.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'view_for' => 'nullable',
        ]);
        $this->returnRepository->reasonQuery()->create($data);
        return redirect()->route('reasons.index')->with('success', 'success');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $reason = $this->returnRepository->reasonQuery()->find($id);
        return view('warrantymodule::admin.returns.reasons.edit', compact('reason'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'view_for' => 'nullable',
        ]);
        $data['view_for'] = $data['view_for'] ?? ['2'];

        $reason = $this->returnRepository->reasonQuery()->findOrFail($id);
        $reason->update($data);
        return redirect()->route('reasons.index')->with('updated', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $reason = $this->returnRepository->reasonQuery()->findOrFail($id);
        try {
            $reason->delete();
            return redirect()->route('reasons.index')->with('deleted', 'deleted');
        } catch (Exception $exception) {
            return redirect()->route('reasons.index')->with('deleted', 'failed');
        }
    }
}
