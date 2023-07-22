<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $admin=Admin::where('email','admin@gmail.com')->first();
        if(is_null($admin)){
            $admin=new Admin();
            $admin->name="super_admin";
            $admin->email="admin@gmail.com";
            $admin->phone="01833025822";
            $admin->password=Hash::make('12345678');
            $admin->save();
        }
    }
}
