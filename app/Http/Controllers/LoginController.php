<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request, authenticate the user, etc.
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        
        // Redirect based on user role
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } 
            elseif ($user->role === 'staff') {
                return redirect()->route('manager.dashboard');
            } 
        }

        return response()->json([
            'message' => 'Incorrect email or password',
            ], 
            401
        );
    }

    public function logoutUser(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function register(Request $request)
    {
        // Handle registration logic here
        // Validate the request, create a new user, etc.
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required',
        ]);


        if( $request->password !== $request->password_confirmation) {
            return response()->json(['message' => 'Passwords do not match'], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'staff'
        ]);

        // Auth::login($user);

        return redirect()->route('login');
    }
}
