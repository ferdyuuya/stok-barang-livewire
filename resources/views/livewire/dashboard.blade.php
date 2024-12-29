@livewire('dashboard')
<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <!-- Dashboard Section -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Message Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold">{{ __("Welcome") }}, <strong>{{ Auth::user()->name }}</strong></h3>
                    <p class="text-sm mt-2">Here's an overview of your dashboard.</p>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Total Barang Count Card -->
                <div class="bg-blue-100 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-blue-700">Total Barang</h3>
                    <p class="text-3xl font-bold text-gray-900 mt-4">{{ $totalBarang }}</p>
                </div>

                <!-- Recent Updates Card -->
                <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-700">Recent Updates</h3>
                    <ul class="mt-4">
                        @forelse ($recentUpdates as $update)
                            <li class="mb-2">
                                <div class="flex justify-between">
                                    <span class="font-bold text-gray-800">{{ $update->barang->name }}</span>
                                    <span class="text-green-500">{{ $update->quantity }}</span>
                                </div>
                            </li>
                        @empty
                            <li>No recent updates available.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
