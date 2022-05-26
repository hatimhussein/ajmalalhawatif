<?php

namespace Modules\OrderModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\OrderModule\Entities\Status;
use Modules\OrderModule\Entities\StatusType;

class StatusController extends Controller
{
  public function __construct()
  {
    $this->middleware('permission:show_status')->only('index');
    $this->middleware('permission:add_status')->only('create');
    $this->middleware('permission:delete_status')->only('destroy');
    $this->middleware('permission:update_status')->only(['edit','update']);

  }

    public function index()
    {
        $statuses= Status::with('status_type')->get();

        return view('ordermodule::admin.status.index',compact('statuses'));
    }

    public function create()
    {
        $status_types=StatusType::where('id',1)->get();
        return view('ordermodule::admin.status.create',compact('status_types'));
    }

    public function store(Request $request)
    {
      $request->validate([
          'status_type_id' => 'required',
          'title' => 'required',
      ]);

      Status::create($request->except('_token'));
      return redirect('admin/status');
    }


    public function show($id)
    {
        return view('ordermodule::status.show');
    }

    public function edit($id)
    {
        $status=Status::find($id);

        if($status->status_type_id !=1)
        return redirect('admin/status');
        $status_types=StatusType::where('id',1)->get();
        return view('ordermodule::admin.status.edit',compact('status_types','status'));
    }

    public function update(Request $request, $id)
    {
      Status::where('id',$id)->update($request->except('_token','_method'));
      return redirect('admin/status');

    }

    public function destroy($id)
    {
      $status=Status::where('id',$id)->with('orders')->first();
      if($status->orders->count() <= 0)
      {
        Status::destroy($id);
        return redirect('admin/status')->with('deleted','deleted');

      }
      else
        return redirect('admin/status')->with('deleted','failed-status');



    }
}
