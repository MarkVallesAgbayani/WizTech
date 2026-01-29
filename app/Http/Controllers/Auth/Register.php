<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Register extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try{
        // Create the user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Log them in
        Auth::login($user);

        // Redirect to dashboard
        return redirect('/')->with('success', 'Welcome to WizTech!');
        }
        catch (\Exception $e){
                return back()
                ->withErrors(['name' => 'Username must be atleast 3 characters long.',
                'email'=>'Email must be a valid email address.',
                'password'=>'Password must be at least 8 characters long and match the confirmation.',
                ])
                ->withInput();
        }
    }
}
