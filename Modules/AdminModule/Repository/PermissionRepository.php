<?php

namespace Modules\AdminModule\Repository;


use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionRepository
{


    function getAllPermissions()
    {
      return  Permission::all();
    }

    function getAllRoles()
    {
      return  Role::all();
    }


    function updateRolePermission($data)
    {
      $role=Role::find($data['role_id']);

      if(!$role->hasPermissionTo($data['premession']))
          $status=$role->givePermissionTo($data['premession']);
      else
          $status=$role->revokePermissionTo($data['premession']);

      return $status;
    }

    public static function quickRandom($length = 6)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }


    function saveRolePermissions($data)
    {
    do
    {
        $token = $this->quickRandom();
    }
    while(Role::where('name',$token)->exists());

      $role=Role::create(['name'=>$data->roleName,'title'=>$data->roleName,'guard_name'=>'admin']);

      $role->syncPermissions($data->permission);
    }

    function assignRoleToAdmin($admin,$role)
    {
      // dd('gfg');
      return  $admin->assignRole($role);
    }

    function updateAdminRole($admin,$role)
    {

      if($admin->roles()->first())
        $admin->removeRole($admin->roles()->first()->name);

      return $this->assignRoleToAdmin($admin,$role);
    }

    function updateRoleName($data)
    {
      return Role::where('id',$data['roleId'])->update(['name'=>$data['roleName']]);
    }

}
