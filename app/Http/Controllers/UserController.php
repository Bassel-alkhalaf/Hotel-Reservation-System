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
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'country' => 'required|string',
            'postal' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);
    
        $validatedData['first_name'] = ucfirst(strtolower($validatedData['first_name']));
        $validatedData['last_name'] = ucfirst(strtolower($validatedData['last_name']));
    
        $user = new User();
        $user->fill($validatedData);
        $user->password = Hash::make($validatedData['password']); // Hash the password before saving
        $user->save();
    
        return redirect()->route('sign_in')->with('successMsg', 'Registration successful. You can now login.');
    }

    public function signIn() {
        return view('sign_in');        
    }

    public function validateSignIn(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        
        if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
        
            return redirect()->route('home')->with('successMsg', 'Welcome back!');
        } else {

            return back()->withErrors(['error' => 'Invalid email or password'])->withInput();
        }
    }

    public function update_email(Request $request, $id) {
        
        $user = User::find($id);
        
        // Validate the request data
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);
        
        
        $user->email = $request->email;
        $user->save();
        return redirect()->back()->with('success', 'Email updated successfully');

    }


    public function logout() {
        Auth::logout();

        return redirect()->route('sign_in'); 
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
