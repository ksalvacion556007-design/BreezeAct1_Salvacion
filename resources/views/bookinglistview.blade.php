<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Booking List</h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto">

        <div class="mb-4">
            <a href="{{ url()->previous() }}"
                class="inline-block bg-gray-800 text-white px-4 py-2 rounded shadow hover:bg-gray-900 focus:bg-gray-900 active:bg-gray-900">
                    ← Back
            </a>
        </div>

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

    </div>
</x-app-layout>