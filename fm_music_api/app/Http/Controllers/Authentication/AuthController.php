<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
    
        // Check if the user already exists in the database
        $existingUser = User::where('email', $user->email)->first();
    
        if ($existingUser) {
            // If the user exists, log them in
            Auth::login($existingUser);
    
            // Redirect the user to the UI dashboard
            return redirect('http://localhost:8080/dashboard');
        } else {
            // If the user doesn't exist, create a new user
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
            ]);
    
            // Log in the newly created user
            Auth::login($newUser);
    
            // Redirect the user to the UI dashboard
            return redirect('http://localhost:8080/dashboard');
        }
    }

    public function getUser()
    {
        $user = Auth::user();

        if ($user) {
            return response()->json(['user' => $user]);
        } else {
            return response()->json(['user' => null]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
