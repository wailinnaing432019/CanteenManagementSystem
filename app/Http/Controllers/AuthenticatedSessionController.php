<?php

namespace App\Http\Controllers;


use App\Http\Requests\Auth\StaffLoginRequest;
use App\Models\Staff;
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
        return view('login.loginCustomer');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(StaffLoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if(Auth::guard('staff')->user()->role_as=='chef'){
            return redirect()->intended(RouteServiceProvider::CHEF_HOME);

        }else if(Auth::guard('staff')->user()->role_as=='admin'){
            return redirect()->intended(RouteServiceProvider::ADMIN_HOME);

        }else{
            return redirect()->intended(RouteServiceProvider::PURCHASER_HOME);

        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('staff')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/staff/login');
    }


}