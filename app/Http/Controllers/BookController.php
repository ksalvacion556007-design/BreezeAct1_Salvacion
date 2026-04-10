<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\Guest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $bookings = Booking::with(['room', 'guest'])->get();
        $rooms = Room::all();
        $guests = Guest::all();
        $editBooking = null;

        if ($request->has('edit')) {
            $editBooking = Booking::find($request->edit);
        }

        return view('bookingview', compact('bookings', 'rooms', 'guests', 'editBooking'));
    }

    public function list()
    {
        $bookings = Booking::with(['room', 'guest'])->get();

        return view('bookinglistview', compact('bookings'));
    }

    public function store(Request $request)
    {
        Booking::create($request->all());
        return redirect()->route('bookings.index');
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update($request->all());

        return redirect()->route('bookings.index');
    }

    public function destroy($id)
    {
        Booking::destroy($id);
        return redirect()->route('bookings.index');
    }
}