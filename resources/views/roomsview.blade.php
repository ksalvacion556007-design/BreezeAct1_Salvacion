<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Rooms</h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto">

        <div class="mb-4">
            <a href="{{ url()->previous() }}"
                class="inline-block bg-gray-800 text-white px-4 py-2 rounded shadow hover:bg-gray-900 focus:bg-gray-900 active:bg-gray-900">
                    ← Back
            </a>
        </div>

        <form method="POST"
              action="{{ isset($editRoom) ? route('rooms.update', $editRoom->id) : route('rooms.store') }}"
              class="bg-white p-4 mb-6 shadow">

            @csrf
            @if(isset($editRoom))
                @method('PUT')
            @endif

            <input name="room_type"
                   value="{{ $editRoom->room_type ?? '' }}"
                   placeholder="Room Type"
                   class="border p-2 w-full mb-2">

            <input name="price"
                   value="{{ $editRoom->price ?? '' }}"
                   placeholder="Price"
                   class="border p-2 w-full mb-2">

            <input name="status"
                   value="{{ $editRoom->status ?? '' }}"
                   placeholder="Status"
                   class="border p-2 w-full mb-2">

            <button class="bg-blue-600 text-white px-3 py-1 rounded">
                {{ isset($editRoom) ? 'Update Room' : 'Add Room' }}
            </button>

        </form>

        <div class="bg-white shadow">
            <table class="w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2">Type</th>
                        <th class="p-2">Price</th>
                        <th class="p-2">Status</th>
                        <th class="p-2">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($rooms as $room)
                    <tr class="border-t">
                        <td class="p-2">{{ $room->room_type }}</td>
                        <td class="p-2">{{ $room->price }}</td>
                        <td class="p-2">{{ $room->status }}</td>

                        <td class="p-2">
                            <div class="flex gap-2">

                                <a href="{{ route('rooms.index', ['edit' => $room->id]) }}"
                                    class="inline-block !bg-green-600 !text-white px-4 py-2 rounded shadow no-underline hover:!bg-green-700">
                                        Edit
                                </a>

                                <form method="POST" action="{{ route('rooms.destroy', $room->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 text-white px-3 py-1 rounded shadow border border-red-800 hover:bg-red-700">
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>