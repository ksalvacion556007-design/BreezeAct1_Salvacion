<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Payments</h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto">

        <div class="mb-4">
            <a href="{{ url()->previous() }}"
                class="inline-block bg-gray-800 text-white px-4 py-2 rounded shadow hover:bg-gray-900 focus:bg-gray-900 active:bg-gray-900">
                    ← Back
            </a>
        </div>

        <form method="POST"
              action="{{ isset($editPayment) ? route('payments.update', $editPayment->id) : route('payments.store') }}"
              class="bg-white p-4 mb-6 shadow">

            @csrf
            @if(isset($editPayment))
                @method('PUT')
            @endif

            <select name="booking_id" class="border p-2 w-full mb-2">
                <option value="">Select Booking</option>
                @foreach($bookings as $booking)
                    <option value="{{ $booking->id }}"
                        {{ isset($editPayment) && $editPayment->booking_id == $booking->id ? 'selected' : '' }}>
                        Booking #{{ $booking->id }}
                    </option>
                @endforeach
            </select>

            <input name="amount_paid"
                   value="{{ $editPayment->amount_paid ?? '' }}"
                   placeholder="Amount"
                   class="border p-2 w-full mb-2">

            <input name="payment_method"
                   value="{{ $editPayment->payment_method ?? '' }}"
                   placeholder="Method"
                   class="border p-2 w-full mb-2">

            <input name="payment_status"
                   value="{{ $editPayment->payment_status ?? 'unpaid' }}"
                   placeholder="Status"
                   class="border p-2 w-full mb-2">

            <input type="date"
                   name="payment_date"
                   value="{{ $editPayment->payment_date ?? '' }}"
                   class="border p-2 w-full mb-2">

            <button class="bg-blue-600 text-white px-3 py-1 rounded">
                {{ isset($editPayment) ? 'Update Payment' : 'Add Payment' }}
            </button>

        </form>

        <table class="w-full bg-white shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2">Booking</th>
                    <th class="p-2">Amount</th>
                    <th class="p-2">Method</th>
                    <th class="p-2">Status</th>
                    <th class="p-2">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($payments as $payment)
                <tr class="border-t">

                    <td class="p-2">Booking #{{ $payment->booking_id }}</td>
                    <td class="p-2">{{ $payment->amount_paid }}</td>
                    <td class="p-2">{{ $payment->payment_method }}</td>
                    <td class="p-2">{{ $payment->payment_status }}</td>

                    <td class="p-2 flex gap-2">

                        <a href="{{ route('rooms.index', ['edit' => $room->id]) }}"
                            class="inline-block !bg-green-600 !text-white px-4 py-2 rounded shadow no-underline hover:!bg-green-700">
                                Edit
                        </a>

                        <form method="POST"
                              action="{{ route('payments.destroy', $payment->id) }}">
                            @csrf
                            @method('DELETE')

                            <button class="bg-red-600 text-white px-3 py-1 rounded">
                                Delete
                            </button>
                        </form>

                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-app-layout>