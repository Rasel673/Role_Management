<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=User::where('email','raselamin@gmail.com')->first();
        if(is_null($user)){
            $user=new User();
            $user->name="Rasel Amin";
            $user->email="raselamin@gmail.com";
            $user->phone="01833025822";
            $user->password=Hash::make('12345678');
            $user->save();
        }
       
    }
}
