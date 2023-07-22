<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{


    
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('backend.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(AdminRequest $request)
    {
      

      //attempt to login--
      $request->authenticate();
      $request->session()->regenerate();
      return redirect()->intended(RouteServiceProvider::ADMIN);

       
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
