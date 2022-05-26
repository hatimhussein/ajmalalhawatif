<?php

namespace Modules\ConfigModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ConfigModule\Entities\Advertisement;
use Modules\ConfigModule\Entities\Slider;
use Modules\CommonModule\Helper\UploaderHelper;

class SliderController extends Controller
{

  use UploaderHelper;

    public function __construct()
    {
      $this->middleware('auth:admin');
      $this->middleware('permission:show_slider')->only('index');
      $this->middleware('permission:add_slider')->only('create');
      $this->middleware('permission:delete_slider')->only('destroy');
      $this->middleware('permission:update_slider')->only(['edit','update']);

    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $sliders=Slider::all();
        return view('configmodule::admin.slider.index',compact('sliders'));
    }


    public function create()
    {
        return view('configmodule::admin.slider.create');
    }



    public function store(Request $request)
    {

                $request->validate([
                    'image_ar' => 'required|image|mimes:jpg,png,jpeg,gif',
                    'image_en' => 'required|image|mimes:jpg,png,jpeg,gif',
                    'link'=>'nullable|url'
                ]);

                $data['image_ar']=$this->upload($request->file('image_ar'),'slider');
                $data['image_en']=$this->upload($request->file('image_en'),'slider');
                $data['link']=$request->link;
                Slider::create($data);
                return redirect()->to('admin/slider')->with('success', 'success');

    }


    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('configmodule::admin.slider.edit',compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $data=$request->except('_token','_method');
        $request->validate([
            'link' => 'nullable|url',
            'image_ar'=>'image|mimes:jpeg,png,jpg,gif',
            'image_en'=>'image|mimes:jpeg,png,jpg,gif',
        ]);

        if($request->file('image_ar'))
            $data['image_ar']=$this->upload($request->file('image_ar'),'slider');

        if($request->file('image_en'))
            $data['image_en']=$this->upload($request->file('image_en'),'slider');

        $slider=Slider::where('id',$id)->update($data);


        return redirect('admin/slider')->with('updated', 'updated');


    }
    public function destroy($id)
    {
        Slider::destroy($id);

        return redirect()->back()->with('deleted', 'deleted');
    }
}
