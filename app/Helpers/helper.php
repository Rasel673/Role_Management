<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Auth;


// check have this permission for this role---
function PermissionCheck(String $permission){
    $user=Auth::guard('admin')->user();
    if(is_null($user) || !$user->can($permission)){

        abort('403','Unathorized Aceess');
    }

}

// check have to view ermission for this role---
function canView(String $permission){
    $canview=true;
    $user=Auth::guard('admin')->user();
    if(is_null($user) || !$user->can($permission)){
        $canview=false;
    }

    return $canview;

}