<?php

namespace App\Http\Controllers;


class HRSController extends Controller
{
    public function index() {
        // get weather forecast
        $forecast = $this->fetchMontrealForecast();
    
        // renders the home template
        return view('welcome', compact('forecast'));
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


    




}
