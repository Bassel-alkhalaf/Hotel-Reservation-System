<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DateTime;

class HRSController extends Controller
{
    public function index() {
        // get weather forecast
        $forecast = $this->fetchMontrealForecast();
    
        // renders the home template
        return view('welcome', compact('forecast'));
    }



    public function createReservation(Request $request) {
            

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
                'check_in_date' => $request->input('check_in_date'),
                'check_out_date' => $request->input('check_out_date'),
            ]);

            // Optionally, you can return a success message or redirect the user to a success page
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

        // Create and save the user
        $user = new User();
        $user->fill($validatedData);
        $user->password = Hash::make($validatedData['password']); // Hash the password before saving
        $user->save();

        // Optionally, you can redirect the user after successful registration
        return redirect()->route('sign_in')->with('successMsg', 'Registration successful. You can now login.');
    }

    public function rooms() {
        // Path to the text file containing room details
        $filePath = storage_path('app/room_details.txt');
    
        // Parse the room details from the text file
        $rooms = $this->parseRoomDetails($filePath);

        // Pass the room details to the view
        return view('rooms', compact('rooms'));
    }
    

    private function parseRoomDetails($filePath) {
        $rooms = [];
    
        $file = fopen($filePath, 'r');
    
        while (!feof($file)) {
            $line = fgets($file);
    
            // Extract room number, title, and rate from the line
            preg_match('/Room number: (\d+), title: (.*), rate: (\$\d+)/', $line, $matches);
    
            // Check if the line matches the expected format
            if (count($matches) === 4) {
                // Store room details in an associative array
                $rooms[] = [
                    'room_number' => trim($matches[1]),
                    'title' => trim($matches[2]),
                    'rate' => trim($matches[3])
                ];
            }
        }

        fclose($file);
        return $rooms;
    }

    public function fetchMontrealForecast() {
        $api_key = env('WEATHER_API_KEY', 'default');
        $url = "http://api.openweathermap.org/data/2.5/forecast?lat=45.50&lon=73.56&appid=" . $api_key;
    
        // Initialize cURL session
        $curl = curl_init();
    
        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,  // Return the response as a string
            CURLOPT_FOLLOWLOCATION => true,   // Follow redirects
            CURLOPT_HTTPGET => true,          // Use GET method
        ));
    
        // Execute cURL request
        $response = curl_exec($curl);
    
        // Check for errors
        if ($response === false) {
            $error = curl_error($curl);
            curl_close($curl);
            throw new \Exception("cURL request failed: $error");
        }
    
        // Close cURL session
        curl_close($curl);
    
        // Decode JSON response
        $weatherData = json_decode($response, true);
    
        // Check for JSON decoding errors
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception("Error decoding JSON response: " . json_last_error_msg());
        }

        $forecast = [];
        foreach ($weatherData['list'] as $data) {
            $date = date('Y-m-d', strtotime($data['dt_txt']));
            $forecast[$date][] = [
                'day' => date('l', strtotime($data['dt_txt'])),
                'time' => date('H:i', strtotime($data['dt_txt'])),
                'description' => $data['weather'][0]['description'],
                'temperature' => round($data['main']['temp'] - 273.15),
            ];
        }
    
        // Filter forecast for today and the next five days
        $today = date('Y-m-d');
        $nextFiveDays = [];
        foreach ($forecast as $date => $data) {
            $nextFiveDays[$date] = $data[0];
        }
    
        return $nextFiveDays;
       
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
            $userReservations = $this->getReservationsByUserId($user_id);

            return view('my_profile', compact('userReservations'));
        }
    }

    public function getReservationsByUserId($userId) {
        // Query reservations table to get reservations for the given user ID
        $reservations = Reservation::where('user_id', $userId)->get();

        // Return the reservations array
        return $reservations;
    }


    
}
