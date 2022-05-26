<?php

namespace Modules\ProductFeatureModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\ProductFeatureModule\Entities\OptionValue;
use Modules\ProductFeatureModule\Entities\Option;

class OptionValueController extends Controller
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
      $values=OptionValue::all();
      return view('productfeaturemodule::admin.option.option_value.index',compact('values'));
  }

  /**
   * Show the form for creating a new resource.
   * @return Response
   */
  public function create()
  {   $options=Option::all();
      return view('productfeaturemodule::admin.option.option_value.create',compact('options'));
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
      $data['value']=($data['type']=='color')?$data['color']:'';
      OptionValue::create($data);

      return redirect()->back()->with('success','success')->withInput($request->only('option_id','type'));
  }

  public function setValue(Request $request)
  {
      $data=$request->except('_token');
      $data['value']=($data['type']=='color')?$data['color']:'';
      OptionValue::create($data);
      return $this->setCode(200)->setSuccess('success')->send();
  }

  /**
   * Show the specified resource.
   * @param int $id
   * @return Response
   */
  public function show($id)
  {
      return view('productfeaturemodule::show');
  }

  /**
   * Show the form for editing the specified resource.
   * @param int $id
   * @return Response
   */
  public function edit($id)
  {   $options=Option::all();
      $value=OptionValue::where('id',$id)->with('option')->first();
      return view('productfeaturemodule::admin.option.option_value.edit',compact('value','options'));
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
      'name_ar' => 'required',
      'name_en' => 'required',
      'type' => '|required',
    ]);

      $data=$request->except('_token','_method','type','color');
      $data['value']=($request->type=='color')?$request->color:'';

      $new=OptionValue::where('id',$id)->update($data);
      return redirect('/admin/option/'.$data['option_id'])->with('updated','updated');

  }

  /**
   * Remove the specified resource from storage.
   * @param int $id
   * @return Response
   */

   public function destroy($id)
   {
     $option=OptionValue::where('id',$id)->with('products')->first();

     if($option->products->count() <=0)
     {
       OptionValue::destroy($id);
       return redirect('/admin/option')->with('deleted','deleted');
     }
     return redirect()->back()->with('deleted',__('productfeaturemodule::admin.cant_delete_assign_product'));

   }

}
