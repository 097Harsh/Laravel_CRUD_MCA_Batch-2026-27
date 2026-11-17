<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Login function
    public function login(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        $password = $request->input('password');
        /* $role = User::where('email', $request->input('email'))->value('password');
        if($password !== $role){
           die("Password does not match");
        } */
        // Get email and original password
        $credentials = $request->only('email', 'password');

        // Attempt authentication
        if (Auth::attempt($credentials)) {

            // Regenerate session
            $request->session()->regenerate();

            // Redirect to dashboard
            return redirect()->route('dashboard');
        }
        die("end");
        // Authentication failed
        return back()
            ->withErrors(['email' => 'Invalid email or password.'])
            ->onlyInput('email');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
