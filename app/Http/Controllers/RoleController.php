<?php

namespace App\Http\Controllers;

use App\Models\RoleModel;
use Illuminate\Http\Request;
use App\Models\PermissionModel;
use App\Models\PermissionRoleModel;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function list(){
        $PermissionRole = PermissionRoleModel::getPermission('Role', Auth::user()->role_id);
        if(empty($PermissionRole)){
            abort(404);
        }

        $data['PermissionAdd'] = PermissionRoleModel::getPermission('Add Role', Auth::user()->role_id);
        $data['PermissionEdit'] = PermissionRoleModel::getPermission('Edit Role', Auth::user()->role_id);
        $data['PermissionDelete'] = PermissionRoleModel::getPermission('Delete Role', Auth::user()->role_id);


        $data['getRecord'] = RoleModel::getRecord();
        return view('panel.role.list', $data);
    }

    public function add(){
        $PermissionRole = PermissionRoleModel::getPermission('Add Role', Auth::user()->role_id);
        if(empty($PermissionRole)){
            abort(404);
        }

        $getPermission = PermissionModel::getRecord();
        $data['getPermission'] = $getPermission;
        return view('panel.role.add',$data);
    }

    public function insert(Request $request){

        $PermissionRole = PermissionRoleModel::getPermission('Add Role', Auth::user()->role_id);
        if(empty($PermissionRole)){
            abort(404);
        }

        $save = new RoleModel;
        $save->name = $request->name;
        $save->save();

        PermissionRoleModel::InsertUpdateRecord($request->permission_id, $save->id);

        return redirect()->back()->with('success','Role is successfully created!');

    }

    public function edit($id){
        $PermissionRole = PermissionRoleModel::getPermission('Edit Role', Auth::user()->role_id);
        if(empty($PermissionRole)){
            abort(404);
        }

        $role = RoleModel::find($id);
        $data['getPermission'] = PermissionModel::getRecord();
        $data['getRolePermission'] = PermissionRoleModel::getRolePermission($id);
        return view('panel.role.edit',$data, compact('role'));
    }

    public function update(Request $request, $id){
        $PermissionRole = PermissionRoleModel::getPermission('Edit Role', Auth::user()->role_id);
        if(empty($PermissionRole)){
            abort(404);
        }

        $role = RoleModel::find($id);
        $role->name = $request->name;
        $role->update();
        PermissionRoleModel::InsertUpdateRecord($request->permission_id, $role->id);
        return redirect()->back()->with('success','Role is successfully Updated!');
    }

    public function delete($id){
        $PermissionRole = PermissionRoleModel::getPermission('Delete Role', Auth::user()->role_id);
        if(empty($PermissionRole)){
            abort(404);
        }

        $role = RoleModel::find($id);
        $role->delete();
        return redirect()->back()->with('success','Role is successfully Deleted!');
    }
}