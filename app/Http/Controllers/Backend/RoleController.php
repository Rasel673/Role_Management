<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

use function App\Helpers\PermissionCheck;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        // //check user wise permission

        PermissionCheck('role.view');
   

        $roles=Role::where('guard_name','!=','web')->get();
        return view('backend.pages.roles.rolelist',compact('roles'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() :View
    {

        //check user wise permission
        PermissionCheck('role.create');
   


        // $permissions=Permission::all();
        $permission_groups =Admin::getPermissionGroup();
        return view('backend.pages.roles.roleCreate',compact('permission_groups'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {

         //check user wise permission
        PermissionCheck('role.create');
        //
           $request->validate([
            'name'=>'required|max:100|unique:roles',
           ],
           [
            'name.required'=>'Please give a role'
           ]
        
        );


        $role = Role::create(['guard_name' => 'admin','name' => $request->name]);

        $permissions=$request->permissions;

        if(!empty($permissions)){
            $role->syncPermissions($permissions);
        }

             $notification=array(
            'messege'=>'Successfully role created ',
            'alert-type'=>'success'
            );


             return Redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    // custom  admnin guard check  in role---
    protected function checkAdminGuard($id){
        $role=Role::findById($id,'admin');
        return $role;
    } 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):View
    {

         //check user wise permission
      PermissionCheck('role.edit');
        //
        $role=$this->checkAdminGuard($id);
        //   $permissions=Permission::all();
         $permission_groups =Admin::getPermissionGroup();
         return view('backend.pages.roles.roleEdit',compact('permission_groups','role'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):RedirectResponse
    {
        // //check user wise permission
       PermissionCheck('role.edit');
       // Validation Data
       $request->validate([
        'name' => 'required|max:100|unique:roles,name,' . $id
    ], [
        'name.requried' => 'Please give a role name'
    ]);

        $role=$this->checkAdminGuard($id);
        $permissions=$request->permissions;
        if(!empty($permissions)){
            $role->name=$request->name;
            $role->save();
            $role->syncPermissions($permissions);
        }

        $notification=array(
            'messege'=>'Role updated ',
            'alert-type'=>'success'
            );


            return Redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        //
         //check user wise permission
      PermissionCheck('role.delete');

        $role=$this->checkAdminGuard($id);

        if($role){
            $role->delete();
        }

        $notification=array(
            'messege'=>'Role Deleted ',
            'alert-type'=>'success'
            );

            return Redirect()->back()->with($notification);

    }
}
