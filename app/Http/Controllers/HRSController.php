<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

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

        return redirect(route('home')) -> with('successMsg', 'Reservation Successfully Added!');
    }
    
}
