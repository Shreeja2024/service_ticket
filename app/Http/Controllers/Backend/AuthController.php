<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    //

    public function adminLoginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Attempt to log in the user
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember'); // check if remember me is checked

        // Set the cookie expiration time
        $minutes = 60 * 24 * 30; // 30 days

        // Store a cookie
        if ( $remember ) {
            // Set a cookie with the remember me value
            Cookie::queue(Cookie::make('remember_me', $remember, $minutes));

            // Set a cookie with the user's email and password
            Cookie::queue(Cookie::make('email', $request->email, $minutes));
            Cookie::queue(Cookie::make('password', $request->password, $minutes));
        } else {
            // Remove the remember me cookie
            Cookie::queue(Cookie::forget('remember_me'));

            // Remove the user's email and password cookies
            Cookie::queue(Cookie::forget('email'));
            Cookie::queue(Cookie::forget('password'));
        }

        // Attempt to log in the user
        if (Auth::attempt($credentials )) {  

            $user = Auth::user(); 
            if ($user->hasRole('OFFICE-MANAGERS')) {
               
                return redirect()->route('super-admin.dashboard');
            }else {
               
                Auth::logout();
                return redirect()->route('admin.login')->withError('Unauthorized access.');
            }         
        } else {
            // Redirect the user back to the login page with an error message
            return redirect()->route('admin.login')->withError('You have entered invalid credentials')->withInput();
        }
    }

    public function superAdminLoginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Attempt to log in the user
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember'); // check if remember me is checked

        // Set the cookie expiration time
        $minutes = 60 * 24 * 30; // 30 days

        // Store a cookie
        if ( $remember ) {
            // Set a cookie with the remember me value
            Cookie::queue(Cookie::make('remember_me', $remember, $minutes));

            // Set a cookie with the user's email and password
            Cookie::queue(Cookie::make('email', $request->email, $minutes));
            Cookie::queue(Cookie::make('password', $request->password, $minutes));
        } else {
            // Remove the remember me cookie
            Cookie::queue(Cookie::forget('remember_me'));

            // Remove the user's email and password cookies
            Cookie::queue(Cookie::forget('email'));
            Cookie::queue(Cookie::forget('password'));
        }

        // Attempt to log in the user
        if (Auth::attempt($credentials )) {  

            $user = Auth::user(); 
            if ($user->hasRole('SUPER-ADMIN')) {
               
                return redirect()->route('super-admin.dashboard');
            }else {
               
                Auth::logout();
                return redirect()->route('super-admin.login')->withError('Unauthorized access.');
            }         
        } else {
            // Redirect the user back to the login page with an error message
            return redirect()->route('super-admin.login')->withError('You have entered invalid credentials')->withInput();
        }
    }

    public function superAdminLogout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('super-admin.login');
    }

    public function adminLogout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
