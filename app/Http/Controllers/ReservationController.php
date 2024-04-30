<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller {
    public function createReservation(Request $request) {
       
        $checkInDate = $request->input('check_in_date');
        $checkOutDate = $request->input('check_out_date');
    
        if ($checkInDate <= date('Y-m-d') || $checkInDate >= $checkOutDate) {
            return back()->withInput()->withErrors(['error' => 'Invalid check-in or check-out date.']);
        }
    
       
        $availableRoomNumber = $this->checkAvailability($request);
    
        
        if (is_numeric($availableRoomNumber)) {
           
            $user = Auth::user();
    
            // Create the reservation
            $reservation = Reservation::create([
                'user_id' => $user->id,
                'room_number' => $availableRoomNumber,
                'check_in_date' => $checkInDate,
                'check_out_date' => $checkOutDate,
            ]);
    
            
            return view('reservation_success', ['reservation' => $reservation]);
        } else {
           
            return back()->withInput()->withErrors(['error' => $availableRoomNumber]);
        }
    }
    

    public function checkAvailability(Request $request) {
        $roomType = $request->input('room_type');
    
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
    
            if ($conflictingReservations->isEmpty()) {
                
                return $roomNumber;
            }
        }
    
        
        return 'Sorry, there are no available rooms for the selected dates.';
    }
    
    

    public function delete(Request $request){
        $id = $request->input('reservation_id');

        Reservation::find($id)->delete();
        
        return redirect()->back()->with('success', 'Reservation deleted successfully');
    }
}
