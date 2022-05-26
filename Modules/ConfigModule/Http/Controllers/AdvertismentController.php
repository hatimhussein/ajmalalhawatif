<?php

namespace Modules\ConfigModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ConfigModule\Entities\Advertisement;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\ConfigModule\Entities\AdvertiseSettting;

class AdvertismentController extends Controller
{

  use UploaderHelper;

    public function __construct()
    {
      $this->middleware('auth:admin');
      $this->middleware('permission:show_advertisment')->only('index');
      $this->middleware('permission:add_advertisment')->only('create');
      $this->middleware('permission:delete_advertisment')->only('destroy');
      $this->middleware('permission:update_advertisment')->only(['edit','update']);

    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $advertisements=Advertisement::all();
        $status = AdvertiseSettting::all();
        return view('configmodule::admin.advertisement.index',compact('advertisements','status'));
    }

    public function edit($id)
    {
        $advertisement=Advertisement::find($id);
        return view('configmodule::admin.advertisement.edit',compact('advertisement'));
    }


    public function update(Request $request, $id)
    {
      $data=$request->except('_token','_method');
      $request->validate([
          'link' => 'required',
          'image_ar'=>'image|mimes:jpeg,png,jpg,gif',
          'image_en'=>'image|mimes:jpeg,png,jpg,gif',
      ]);

      if($request->file('image_ar'))
       $data['image_ar']=$this->upload($request->file('image_ar'),'img');

    if($request->file('image_en'))
        $data['image_en']=$this->upload($request->file('image_en'),'img');

      $advertisement=Advertisement::where('id',$id)->update($data);


      return redirect('admin/advertisment')->with('updated', 'updated');


    }



    public function store(Request $request)
    {


                $request->validate([
                    'photo'=>'required|image|mimes:jpeg,png,jpg,gif',
                ]);

                $data['image']=$this->upload($request->file('photo'),'slider');
                Advertisement::create($data);
                return redirect()->back()->with('success', 'success');


    }



    public function destroy($id)
    {
        Advertisement::destroy($id);

        return redirect()->back();
    }


    public  function changeAdvertise(Request  $request)
    {
        $avertiseStatus = AdvertiseSettting::find($request->id);
        $status = $avertiseStatus->status==1?0:1;
        $avertiseStatus->update(['status'=>$status]);
        echo true;
    }
}
