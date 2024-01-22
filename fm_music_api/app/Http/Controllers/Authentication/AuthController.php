<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = Auth::attempt($credentials)) {
            return response()->json([
                'access_token' => $token,
            ]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
        } catch (\Exception $e) {
            // Handle the exception if Socialite fails to fetch the user
            // Redirect or show an error message as appropriate
            // For example:
            return redirect('/login')->with('error', 'Google authentication failed.');
        }

        // Check if the user already exists in the database
        $existingUser = User::where('email', $googleUser->email)->first();

        if ($existingUser) {
            // If the user exists, log them in
            Auth::login($existingUser);
        } else {
            // If the user doesn't exist, create a new user
            $newUser = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => '', // No need to set the password because the user is authenticated via Google
                'google_id' => $googleUser->id,
            ]);

            // Log in the newly created user
            Auth::login($newUser);
            $existingUser = $newUser;
        }

        // Generate a JWT token for the user
        $token = JWTAuth::fromUser($existingUser);

        // Redirect the user to the Vue frontend dashboard URL with the token and user data as query parameters
        return redirect('http://localhost:8080/dashboard')
            ->with('access_token', $token)
            ->with('user_id', $existingUser->id)
            ->with('user_name', $existingUser->name)
            ->with('user_email', $existingUser->email);
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
