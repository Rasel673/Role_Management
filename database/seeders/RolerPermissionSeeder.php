<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolerPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create Role--
        $rolesuperAdmin = Role::create(['guard_name' => 'admin','name' => 'super_admin']);
        $roleAdmin = Role::create(['guard_name' => 'admin','name' => 'admin']);
        $roleEditor = Role::create(['guard_name' => 'admin','name' => 'editor']);
        $roleUser = Role::create([ 'guard_name' => 'web','name' => 'user']);


        //create or default permission list--
  
        $permissions=[


            [
                'guard_name' => 'admin',
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard.view',
                    'dashboard.edit',
                ]
            ],

            [
                'guard_name' => 'admin',
                'group_name' => 'admin',
                'permissions' => [
                    // admin Permissions
                    'admin.create',
                    'admin.view',
                    'admin.edit',
                    'admin.delete',
                    'admin.approve',
                ]
            ],
            [
                'guard_name' => 'admin',
                'group_name' => 'role',
                'permissions' => [
                    // role Permissions
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approve',
                ]
            ],

            [
                'guard_name' => 'admin',
                'group_name' => 'profile',
                'permissions' => [
                    // profile Permissions
                    'profile.view',
                    'profile.edit',
                ]
            ],
        ];

        //Create and Assign permissions to those roles--
        // $permission = Permission::create(['name' => 'admin.create']); for single  permission.


        // for multtiple permission---
        for($i=0; $i<count($permissions);$i++){
            $permissionGroup=$permissions[$i]['group_name'];
            $guardName=$permissions[$i]['guard_name'];

            for($j=0;$j<count($permissions[$i]['permissions']);$j++){

                $permission = Permission::create(
                    [
                        'guard_name' => $guardName,
                        'name' => $permissions[$i]['permissions'][$j],
                        'group_name'=> $permissionGroup

                     ]);
                $rolesuperAdmin->givePermissionTo($permission);
                $permission->assignRole($rolesuperAdmin);
            }
           
        }




    }
}
