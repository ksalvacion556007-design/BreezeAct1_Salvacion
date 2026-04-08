<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <x-primary-button onclick="window.location.href='{{ route('rooms.view') }}'">
                        Go to Rooms View
                    </x-primary-button>
                    <x-primary-button onclick="window.location.href='{{ route('booking.view') }}'">
                        Go to Booking View
                    </x-primary-button>
                    <x-primary-button onclick="window.location.href='{{ route('bookinglist.view') }}'">
                        Go to Booking List View
                    </x-primary-button>
                    <x-primary-button onclick="window.location.href='{{ route('guest.view') }}'">
                        Go Guest to View
                    </x-primary-button>
                    <x-primary-button onclick="window.location.href='{{ route('payment.view') }}'">
                        Go to Payment View
                    </x-primary-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
