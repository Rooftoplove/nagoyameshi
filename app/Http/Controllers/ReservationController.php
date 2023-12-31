<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();

        return view('reservations.index', compact('reservations'));
    }

    public function create(Request $request)
    {
        $restaurantId = $request->input('restaurant_id');
        $restaurant = Restaurant::find($restaurantId);


        return view('reservations.subscription', compact('restaurant'));
    }

    public function store(Request $request)
    {
        $time = $request->input('time');
        $date = $request->input('date');
        $reservationTime = $date . ' ' . $time;
        $reservation = new Reservation();
        $reservation->user_id = Auth::id();
        $reservation->restaurant_id = $request->input('restaurant_id');
        $reservation->time = $reservationTime;
        $reservation->people = $request->input('people');
        $reservation->save();

        return redirect()->route('reservations.index');
    }
}
