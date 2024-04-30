<?php

namespace App\Http\Controllers;


class HRSController extends Controller
{
    public function index() {
       
        $forecast = $this->fetchMontrealForecast();
    
   
        return view('welcome', compact('forecast'));
    }
    

    public function rooms() {
        
        $filePath = storage_path('app/room_details.txt');
    
        
        $rooms = $this->parseRoomDetails($filePath);

        
        return view('rooms', compact('rooms'));
    }
    

    private function parseRoomDetails($filePath) {
        $rooms = [];
    
        $file = fopen($filePath, 'r');
    
        while (!feof($file)) {
            $line = fgets($file);
    
            
            preg_match('/Room number: (\d+), title: (.*), rate: (\$\d+)/', $line, $matches);
    
            
            if (count($matches) === 4) {
                
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
    
        
        $curl = curl_init();
    
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,  
            CURLOPT_FOLLOWLOCATION => true,   
            CURLOPT_HTTPGET => true,          
        ));
    
        
        $response = curl_exec($curl);
    
        
        if ($response === false) {
            $error = curl_error($curl);
            curl_close($curl);
            throw new \Exception("cURL request failed: $error");
        }
    
      
        curl_close($curl);
    
      
        $weatherData = json_decode($response, true);
    
        
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
    
        
        $today = date('Y-m-d');
        $nextFiveDays = [];
        foreach ($forecast as $date => $data) {
            $nextFiveDays[$date] = $data[0];
        }
    
        return $nextFiveDays;
       
    }


    




}
