<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller {
    public function createReservation(Request $request) {
        // Check if the check-in date is in the past or after the check-out date
        $checkInDate = $request->input('check_in_date');
        $checkOutDate = $request->input('check_out_date');
    
        if ($checkInDate <= date('Y-m-d') || $checkInDate >= $checkOutDate) {
            return back()->withInput()->withErrors(['error' => 'Invalid check-in or check-out date.']);
        }
    
        // Check availability for the selected room type and dates
        $availableRoomNumber = $this->checkAvailability($request);
    
        // If there are available rooms, proceed with reservation creation
        if (is_numeric($availableRoomNumber)) {
            // Retrieve the authenticated user
            $user = Auth::user();
    
            // Create the reservation
            $reservation = Reservation::create([
                'user_id' => $user->id,
                'room_number' => $availableRoomNumber,
                'check_in_date' => $checkInDate,
                'check_out_date' => $checkOutDate,
            ]);
    
            // Return a success message or redirect the user to a success page
            return view('reservation_success', ['reservation' => $reservation]);
        } else {
            // If no available rooms, return an error message or redirect back to the reservation form with an error
            return back()->withInput()->withErrors(['error' => $availableRoomNumber]);
        }
    }
    

    public function checkAvailability(Request $request) {
        $roomType = $request->input('room_type');
    
        // Define room numbers based on room type
        switch ($roomType) {
            case '1 King Bed, Traditional Guest Room':
                $roomNumbers = [101, 102, 103];
                break;
            case '2 Double Beds, Deluxe Suite':
                $roomNumbers = [201, 202, 203];
                break;
            case '1 Queen Bed, Executive Room':
                $roomNumbers = [301, 302, 303, 304];
                break;
            default:
                $roomNumbers = [];
        }
    
        // Check for conflicting reservations using room numbers
        foreach ($roomNumbers as $roomNumber) {
            $conflictingReservations = Reservation::where('room_number', $roomNumber)
                ->where(function ($query) use ($request) {
                    $query->where(function ($query) use ($request) {
                        $query->where('check_in_date', '<', $request->input('check_out_date'))
                            ->where('check_out_date', '>', $request->input('check_in_date'));
                    })
                    ->orWhere(function ($query) use ($request) {
                        $query->where('check_in_date', '>=', $request->input('check_in_date'))
                            ->where('check_in_date', '<', $request->input('check_out_date'));
                    })
                    ->orWhere(function ($query) use ($request) {
                        $query->where('check_out_date', '>', $request->input('check_in_date'))
                            ->where('check_out_date', '<=', $request->input('check_out_date'));
                    });
                })
                ->get();
    
            if (!$conflictingReservations->isEmpty()) {
                // If there are conflicting reservations, return an error message
                return 'Sorry, there are no available rooms for the selected dates.';
            }
        }
    
        // If no conflicting reservations found, return the first available room number
        return $roomNumbers[0];
    }

    public function delete(Request $request){
        $id = $request->input('reservation_id');

        Reservation::find($id)->delete();
        
        return redirect()->back()->with('success', 'Reservation deleted successfully');
    }
}
