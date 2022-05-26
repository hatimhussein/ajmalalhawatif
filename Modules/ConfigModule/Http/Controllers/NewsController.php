<?php

namespace Modules\ConfigModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ConfigModule\Entities\News;

class NewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('can:News');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $news = News::all();
        return view('configmodule::admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('configmodule::admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'desc_ar' => 'required',
            'desc_en' => 'required',
            'viewed_levels.*' => 'in:1,2,3,4,5'
        ]);

        $data['status'] = isset($request->status) ? 1 : 0;

        News::create($data);
        return redirect()->route('news.index')->with('success', 'success');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('configmodule::admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $news = News::find($id);
        $data = $request->validate([
            'desc_ar' => 'required',
            'desc_en' => 'required',
            'viewed_levels.*' => 'in:1,2,3,4,5'
        ]);
        $data['viewed_levels'] = $data['viewed_levels'] ?? null;
        $data['status'] = isset($request->status) ? 1 : 0;

        $news->update($data);
        return redirect()->route('news.index')->with('success', 'success');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        News::where('id', $id)->delete();
        return redirect()->route('news.index')->with('deleted', 'deleted');
    }
}
