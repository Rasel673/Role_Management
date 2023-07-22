<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Services\AdminService;
use Illuminate\View\View;

use function App\Helpers\PermissionCheck;

class AdminController extends Controller
{

  /**
     * Display a listing of the resource.
     */

     protected $adminservice;

     public function __construct(AdminService $adminservice)
     {
        $this->adminservice=$adminservice;
     }
    public function dashboard():View{
        //check permission of this role---
        PermissionCheck('dashboard.view');

        return view('backend.pages.dashboard.index');
    }


    public function index():View
    {
        //check permission of this role---
        PermissionCheck('admin.view');
        //get all admins----
        $admins=$this->adminservice->getAllAdmins();
        return view('backend.pages.admins.allUserList',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // //check permission of this role---
        PermissionCheck('admin.view');

        // get roles for admins create-------
        $roles=$this->adminservice->getRoles();
        return view('backend.pages.admins.userCreate',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
         //check permission of this role---
         PermissionCheck('admin.create');

        $this->adminservice->saveAdmin($request);

        session()->flash('success', 'Admin has been created !!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // //check permission of this role---
        PermissionCheck('admin.edit');
        // find admin----------
        $admin=$this->adminservice->findAdmin($id);
        //   get all roles-------------
        $roles=$this->adminservice->getRoles();

         return view('backend.pages.admins.userEdit',compact('admin','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUpdateRequest $request, string $id)
    {
        

        //check permission of this role---
        PermissionCheck('admin.edit');
        //updete admin---- 
        $this->adminservice->updateAdmin($request,$id);
        session()->flash('success', 'Admin has been Updated !!');
        return back();


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // //check permission of this role---
        PermissionCheck('admin.delete');

       $this->adminservice->adminDelete($id);

         session()->flash('success', 'Admin has been deleted !!');

        return back();

    
    }


}
