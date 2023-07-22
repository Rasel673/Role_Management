<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class AdminLoginController extends Controller
{
    //

    public function showLoginForm()
    {
        return view('backend.auth.login');
    }

    public function login(AdminRequest $request)
    {
      //attempt to login--
      $request->authenticate();
      $request->session()->regenerate();
      return redirect()->intended(RouteServiceProvider::ADMIN);

    }

    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

}
