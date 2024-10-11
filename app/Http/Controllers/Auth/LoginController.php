<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Hanya user yang belum login bisa mengakses halaman login
        // Method logout dikecualikan sehingga bisa diakses oleh user yang sudah login
        $this->middleware('guest')->except('logout');
    }

    /**
     * Logout the user and redirect to the welcome page.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        // Lakukan proses logout
        Auth::logout();

        // Redirect ke halaman welcome setelah logout
        return redirect('/welcome'); // Pastikan route ini mengarah ke welcome.blade.php
    }
}
