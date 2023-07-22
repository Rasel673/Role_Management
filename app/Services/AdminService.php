<?php

namespace App\Services;

use Spatie\Permission\Models\Role;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;



class AdminService{

public function getAllAdmins(){
    return Admin::all();
}

public function getRoles(){
     // get roles wtitout super admin for admins create-------
    return Role::where('name','!=','super_admin')->get();
}

public function saveAdmin($data){
    $admin = Admin::create([
        'name' => $data->name,
        'email' => $data->email,
        'phone' => $data->phone,
        'password' => Hash::make($data->password),
    ]);

    $roles=$data->roles;

    if($admin && !empty($roles)){
        $admin->assignRole($roles);
    }

    return;
}

public function updateAdmin($data,$id){


    $admin=Admin::find($id);
    $admin->name = $data->name;
    $admin->email = $data->email;
    $admin->phone = $data->phone;
    $admin->password = Hash::make($data->password);
    $admin->save();
    
    $roles=$data->roles;

    if($admin && !empty($roles)){
        $admin->syncRoles($roles);
    }

    return;

}

public function findAdmin($id){

    return Admin::find($id);
}

public function adminDelete($id){
    $admin=Admin::find($id);
    if($admin){
        $admin->delete();
    }
    return;
}

}