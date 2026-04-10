<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(Request $request)
    {
        $guests = Guest::all();
        $editGuest = null;

        if ($request->has('edit')) {
            $editGuest = Guest::find($request->edit);
        }

        return view('guestview', compact('guests', 'editGuest'));
    }

    public function store(Request $request)
    {
        Guest::create($request->all());
        return redirect()->route('guests.index'); 
    }

    public function update(Request $request, $id)
    {
        $guest = Guest::findOrFail($id);
        $guest->update($request->all());

        return redirect()->route('guests.index');
    }

    public function destroy($id)
    {
        Guest::destroy($id);
        return redirect()->route('guests.index'); 
    }
}