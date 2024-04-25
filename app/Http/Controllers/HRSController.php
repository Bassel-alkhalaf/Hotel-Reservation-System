<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Log;

class HRSController extends Controller
{
    public function index() {
        // renders the home template
        return view('welcome');
    }

    public function reserve() {
        // render the reservation template
        echo "Reserve Page";
    }

    public function createReservation(Request $request) {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'phone_number' => 'required|string',
                'check_in' => 'required|date',
                'check_out' => 'required|date|after:check_in',
            ]);

            // Create a new Reservation instance
            $reservation = new Reservation();
            $reservation->name = $validatedData['name'];
            $reservation->email = $validatedData['email'];
            $reservation->phone_number = $validatedData['phone_number'];
            $reservation->check_in = $validatedData['check_in'];
            $reservation->check_out = $validatedData['check_out'];

            // Save the reservation
            $reservation->save();

            // Log the successful reservation
            Log::info('Reservation created successfully.', ['reservation_id' => $reservation->id]);

            return redirect(route('home'))->with('successMsg', 'Reservation Successfully Added!');
        } catch (\Exception $e) {
            // Log any errors that occur during reservation creation
            Log::error('Error creating reservation: ' . $e->getMessage());

            // Return a response indicating the error occurred
            return back()->withInput()->withErrors(['error' => 'An error occurred while processing your reservation. Please try again later.']);
        }
    }

    // sign in page 
    public function signIn() {
        return view('sign_in');        
    }

    public function validateSignIn(Request $request) {
        // validate sign logic
    }

    public function register(){
        return view('register');
    }

    public function validateRegister(Request $request) {
        // register logic
    }


    
}
