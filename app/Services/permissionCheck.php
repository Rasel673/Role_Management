<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionCheck{

    public $user;

    public function __construct(String $permission)
    {
        $this->user=Auth::guard('admin')->user();
       
        if(is_null($this->user) || !$this->user->hasPermissionTo($permission)){
            abort('403','Unathorized Aceess');
        }
        
    }
 


}