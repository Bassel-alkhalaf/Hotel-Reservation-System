<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    public function register(){
        return view('register');
    }

    public function validateRegister(Request $request) {
        // Validate the incoming data
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'country' => 'required|string',
            'postal' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);
    
        // Capitalize the first and last names
        $validatedData['first_name'] = ucfirst(strtolower($validatedData['first_name']));
        $validatedData['last_name'] = ucfirst(strtolower($validatedData['last_name']));
    
        // Create and save the user
        $user = new User();
        $user->fill($validatedData);
        $user->password = Hash::make($validatedData['password']); // Hash the password before saving
        $user->save();
    
        // Optionally, you can redirect the user after successful registration
        return redirect()->route('sign_in')->with('successMsg', 'Registration successful. You can now login.');
    }

    // sign in page 
    public function signIn() {
        return view('sign_in');        
    }

    public function validateSignIn(Request $request) {
        // Validate the sign-in form data
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
        
            return redirect()->route('home')->with('successMsg', 'Welcome back!');
        } else {
            // Authentication failed, redirect back with an error message
            return back()->withErrors(['error' => 'Invalid email or password'])->withInput();
        }
    }

    public function update_email(Request $request, $id) {
        
        $user = User::find($id);
        
        // Validate the request data
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);
        
        // Update the email
        $user->email = $request->email;
        $user->save();
        return redirect()->back()->with('success', 'Email updated successfully');

    }


    public function logout() {
        Auth::logout();

        return redirect()->route('sign_in'); // Redirect to login page after logout
    }  
    
    public function myProfile() {
        if (!Auth::check()) {
            return redirect()->route('sign_in');
        } else {
            $user_id = Auth::id();

            $userReservations = Reservation::where('user_id', $user_id)->get();
    
            return view('my_profile', compact('userReservations'));
        }
    }

}
