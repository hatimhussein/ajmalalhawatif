<?php

namespace Modules\ProductFeatureModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\ProductFeatureModule\Entities\Option;

class OptionController extends Controller
{

    use ApiResponseHelper;

    public function __construct()
    {
      $this->middleware('is_admin');

      $this->middleware('permission:show_options')->only('index');
      $this->middleware('permission:add_options')->only('create');
      $this->middleware('permission:delete_options')->only('destroy');
      $this->middleware('permission:update_options')->only(['edit','update']);

    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $options=Option::all();
        return view('productfeaturemodule::admin.option.index',compact('options'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('productfeaturemodule::admin.option.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

      request()->validate([
        'name_ar' => 'required',
        'name_en' => 'required',
        'type' => '|required',
      ]);

        $data=$request->except('_token');
        Option::create($data);

        return redirect('/admin/option')->with('success','success');
    }

    public function setOption(Request $request)
    {
        Option::create($request->except('_token'));
        $options=Option::all();
        return $this->setCode(200)->setData($options)->send();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $option=Option::where('id',$id)->with('optionValues')->first();
        return view('productfeaturemodule::admin.option.show',compact('option'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $option=Option::find($id);
        return view('productfeaturemodule::admin.option.edit',compact('option'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data=$request->except('_token','_method');
        Option::where('id',$id)->update($data);
        return redirect('/admin/option')->with('updated','updated');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
      $option=Option::where('id',$id)->with('optionValues')->first();

      if($option->optionValues->count() <=0)
      {
        Option::destroy($id);
        return redirect('/admin/option')->with('deleted','deleted');
      }
      return redirect('/admin/option')->with('deleted',__('productfeaturemodule::admin.cant_delete_value'));

    }


    public function getOptionsByIds(Request $request)
    {
      $ids=$request->ids;
      $options=Option::whereIn('id',$ids)->with('optionValues')->get();

      return response()->json(['code'=>200,'data'=>$options]);
    }

}
