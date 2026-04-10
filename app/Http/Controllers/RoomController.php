<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $rooms = Room::all();
        $editRoom = null;

        if ($request->has('edit')) {
            $editRoom = Room::find($request->edit);
        }

        return view('roomsview', compact('rooms', 'editRoom'));
    }

    public function store(Request $request)
    {
        Room::create($request->all());
        return redirect()->route('rooms.index');
    }

    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $room->update($request->all());

        return redirect()->route('rooms.index');
    }

    public function destroy($id)
    {
        Room::destroy($id);
        return redirect()->route('rooms.index');
    }
}