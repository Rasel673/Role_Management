<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $super_admin=DB::table('model_has_roles')->where('role_id','==','1')->first();

        if(is_null($super_admin)){

            $superadmin_permissions_give=DB::table('model_has_roles')->
            insert([
                'role_id'=>1,
                'model_type'=>'App\Models\Admin',
                'model_id'=>1
            ]);
        }
      
       
    }
}
