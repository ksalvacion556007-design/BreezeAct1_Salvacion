<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Bookings</h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto">

        <div class="mb-4">
            <a href="{{ url()->previous() }}"
                class="inline-block bg-gray-800 text-white px-4 py-2 rounded shadow hover:bg-gray-900 focus:bg-gray-900 active:bg-gray-900">
                    ← Back
            </a>
        </div>

        <div class="mb-4">
            <a href="{{ route('bookinglist.index') }}"
               class="bg-green-600 text-white px-4 py-2 rounded">
                View Booking List
            </a>
        </div>

        <form method="POST"
              action="{{ isset($editBooking) ? route('bookings.update', $editBooking->id) : route('bookings.store') }}"
              class="bg-white p-4 mb-6 shadow">

            @csrf
            @if(isset($editBooking))
                @method('PUT')
            @endif

            <select name="guest_id" class="border p-2 w-full mb-2">
                <option value="">Select Guest</option>
                @foreach($guests as $guest)
                    <option value="{{ $guest->id }}"
                        {{ isset($editBooking) && $editBooking->guest_id == $guest->id ? 'selected' : '' }}>
                        {{ $guest->full_name }}
                    </option>
                @endforeach
            </select>

            <select name="room_id" class="border p-2 w-full mb-2">
                <option value="">Select Room</option>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}"
                        {{ isset($editBooking) && $editBooking->room_id == $room->id ? 'selected' : '' }}>
                        {{ $room->room_type }}
                    </option>
                @endforeach
            </select>

            <input type="date" name="check_in" value="{{ $editBooking->check_in ?? '' }}" class="border p-2 w-full mb-2">
            <input type="date" name="check_out" value="{{ $editBooking->check_out ?? '' }}" class="border p-2 w-full mb-2">

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                {{ isset($editBooking) ? 'Update Booking' : 'Add Booking' }}
            </button>

        </form>

        <div class="bg-white shadow">
            <table class="w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2">Guest</th>
                        <th class="p-2">Room</th>
                        <th class="p-2">Check In</th>
                        <th class="p-2">Check Out</th>
                        <th class="p-2">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($bookings as $booking)
                    <tr class="border-t">
                        <td class="p-2">{{ $booking->guest->full_name ?? '' }}</td>
                        <td class="p-2">{{ $booking->room->room_type ?? '' }}</td>
                        <td class="p-2">{{ $booking->check_in }}</td>
                        <td class="p-2">{{ $booking->check_out }}</td>

                        <td class="p-2 flex gap-2">
                            <a href="{{ route('rooms.index', ['edit' => $room->id]) }}"
                                class="inline-block !bg-green-600 !text-white px-4 py-2 rounded shadow no-underline hover:!bg-green-700">
                                    Edit
                            </a>

                            <form method="POST" action="{{ route('bookings.destroy', $booking->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>