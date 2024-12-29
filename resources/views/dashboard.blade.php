<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg">{{ __("Selamat datang! ") }}, <strong>{{ Auth::user()->name }}</strong></h3>
                    <p class="text-sm mt-2">Here's an overview of your dashboard.</p>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Total Barang Count Card -->
                <div class="bg-blue-100 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-blue-700">Total Barang</h3>
                    {{-- <p class="text-3xl font-bold text-gray-900 mt-4">{{ $totalBarang }}</p> --}}
                    @if($totalBarang > 0)
                        <p class="text-3xl font-bold text-gray-900 mt-4">{{ $totalBarang }}</p>
                    @else
                        <p class= mt-4>Tidak ada barang</p>
                    @endif
                    {{-- <livewire:dashboard /> --}}
                </div>

                <!-- Recent Updates Card -->
                <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-700">Aktivitas Terakhir</h3>
                    <ul class="mt-4">
                        @forelse ($recentUpdates as $update)
                            <li class="mb-2">
                                <div class="flex justify-between text-sm">
                                    <span class="font-bold text-gray-800">{{ $update->barang->name }}</span>
                                    <span class="{{ $update->action == 'subtracted' ? 'text-red-500' : 'text-green-500' }}">
                                        {{ $update->action == 'subtracted' ? '-' . $update->quantity : '+' . $update->quantity }}
                                    </span>
                                    <span class="text-gray-500">{{ $update->created_at->format('d/m/Y') }}</span>
                                </div>
                            </li>
                        @empty
                            <li>No recent updates available.</li>
                        @endforelse
                    </ul>
                </div>

                <div class="bg-blue-100 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-blue-700">Total User</h3>
                    {{-- <p class="text-3xl font-bold text-gray-900 mt-4">{{ $totalBarang }}</p> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
