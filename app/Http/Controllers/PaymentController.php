<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $payments = Payment::with('booking')->get();
        $bookings = Booking::all();
        $editPayment = null;

        if ($request->has('edit')) {
            $editPayment = Payment::find($request->edit);
        }

        return view('paymentview', compact('payments', 'bookings', 'editPayment'));
    }

    public function store(Request $request)
    {
        Payment::create($request->all());
        return redirect()->route('payments.index');
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update($request->all());

        return redirect()->route('payments.index');
    }

    public function destroy($id)
    {
        Payment::destroy($id);
        return redirect()->route('payments.index');
    }
}