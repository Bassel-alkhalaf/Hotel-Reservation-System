<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function createReservation() {
        // add reservation to db logic
    }
}
