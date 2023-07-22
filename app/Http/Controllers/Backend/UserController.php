<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        //

        $users=User::all();
        return view('backend.pages.users.allUserList',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.pages.users.userCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        //
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

       
        
        $notification=array(
            'messege'=>'Successfully user created ',
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user=User::find($id);
    
         return view('backend.pages.users.userEdit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',],
            'phone' => ['required', 'string', 'max:11','min:11',],
            'password' => ['required', Rules\Password::defaults()],
           ]);
        $user=User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();
        
     
        $notification=array(
            'messege'=>'Successfully user created ',
            'alert-type'=>'success'
            );


             return Redirect()->back()->with($notification);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user=User::find($id);

        if($user){
            $user->delete();
        }

        $notification=array(
            'messege'=>'User Deleted ',
            'alert-type'=>'success'
            );

            return Redirect()->back()->with($notification);

    
    }
}
