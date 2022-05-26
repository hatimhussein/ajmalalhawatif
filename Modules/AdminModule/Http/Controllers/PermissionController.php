<?php

namespace Modules\AdminModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Modules\AdminModule\Http\Requests\RoleRequest;
use Modules\AdminModule\Repository\PermissionRepository;
use Auth;
use Modules\CommonModule\Helper\ApiResponseHelper;
class PermissionController extends Controller
{
  use ApiResponseHelper;
    public function __construct(PermissionRepository $permissionRepository)
    {
      $this->middleware('auth:admin');
      $this->middleware('permission:show_role')->only('index');
      $this->middleware('permission:add_role')->only('create');
      $this->middleware('permission:delete_role')->only('destroy');
      $this->middleware('permission:update_role')->only(['edit','update']);

      $this->permissionRepository=$permissionRepository;


    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $roles=Role::all();
        return view('adminmodule::Permissions.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
      $permissions=Permission::where('category_id',1)->get();
      $custom_permissions=Permission::where('category_id',2)->get();
      $permissionsGroup=$permissions->groupBy('title');
        return view('adminmodule::Permissions.create',compact('permissionsGroup','custom_permissions'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(RoleRequest $request)
    {
      $this->permissionRepository->saveRolePermissions($request);
      return redirect('admin/permissions')->with('success', 'success');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {

        return view('adminmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $role=Role::find($id);
        $permissions=Permission::where('category_id',1)->get();
        $custom_permissions=Permission::where('category_id',2)->get();
        $permissionsGroup=$permissions->groupBy('title');

        return view('adminmodule::Permissions.edit',compact('role','permissionsGroup','custom_permissions'));
    }

    public function updateRolePermission(Request $request)
    {
      $status=$this->permissionRepository->updateRolePermission($request->all());

      return $this->setCode(200)->setData($status)->send();

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function updateRoleName(Request $request)
    {

      $request->validate([
        'roleName' => 'required|unique:roles,name'

    ]);

      $status=$this->permissionRepository->updateRoleName($request->all());

      return redirect('admin/permissions')->with('updated', 'updatedupdated');

    }


    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
      $role = Role::findOrFail($id);
      $role->delete();

      return redirect('admin/permissions')->with('deleted', 'deleted');

    }
}
