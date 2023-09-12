<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\AuthURequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        // Check login
        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        // Email notification not found
        return back()->withErrors([
            'email' => 'We did not find your email.',
        ])->onlyInput('email');
    }

    public function register(AuthRequest $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request['password']);
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);
        // dd($user);
        return redirect()->back()->with('message', 'Register has been successfully');
    }

    public function profileUpdate(AuthURequest $request, User $user)
    {
        $user->update([
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
        ]);
        // dd($user);
        return redirect()->back()->with('message', 'Update profile has been successfully');
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();    
        $request->session()->regenerateToken();
    
        return redirect()->route('login');
    }
}
