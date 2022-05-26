<?php

namespace Modules\ConfigModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ConfigModule\Entities\Seo;

use Modules\ConfigModule\Repository\ConfigRepository;

class SeoController extends Controller
{

    public function __construct(ConfigRepository $configRepository)
    {
      $this->middleware('auth:admin');
      $this->middleware('permission:show_seo')->only('index');
      $this->middleware('permission:add_seo')->only('create');
      $this->middleware('permission:delete_seo')->only('destroy');
      $this->middleware('permission:update_seo')->only(['edit','update','getScripts','updateSeo']);

      $this->configRepository=$configRepository;

    }
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function index()
    {
        $all_seo=Seo::all();
        return view('configmodule::admin.seo.index',compact('all_seo'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('configmodule::admin.seo.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
      request()->validate([
        'url' => 'required',
        'author' => 'required',
        'name_ar' => 'required',
        'name_en' => 'required',
        'desc_ar' => 'required',
        'desc_en' => 'required',
        'keys_en' => 'required',
        'keys_ar' => 'required',
        'script_header' => 'required',
        'script_footer' => 'required',
      ]);
      Seo::create($request->except('_token'));

      return redirect('admin/seo')->with('success','success');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('configmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $seo=Seo::find($id);
        return view('configmodule::admin.seo.edit',compact('seo'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
      request()->validate([
        'url' => 'required',
        'author' => 'required',
        'name_ar' => 'required',
        'name_en' => 'required',
        'desc_ar' => 'required',
        'desc_en' => 'required',
        'keys_en' => 'required',
        'keys_ar' => 'required',
        'script_header' => 'required',
        'script_footer' => 'required',
      ]);

      Seo::where('id',$id)->update($request->except('_token','_method'));

      return redirect('admin/seo')->with('updated','updated');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
       Seo::destroy($id);
       return redirect('admin/seo')->with('deleted','deleted');

    }


    function getScripts()
    {
      $seo=$this->configRepository->getConfigByCategoryId([6])[0];
      return view('configmodule::admin.seo.seo_script',compact('seo'));
    }

    function updateSeo(Request $request)
    {
      $data = $request->except('_token');
      $configCategorires=$this->configRepository->update($data);

      return redirect('admin/seo')->with('updated', 'updated');
    }


}
