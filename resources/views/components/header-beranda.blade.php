@php
    $notifikasiReservasi = $notifikasiReservasi ?? collect();
@endphp

<nav class="fixed top-0 z-50 w-full bg-slate-800 border-b border-slate-700">
    <div class="max-w-screen-xl flex justify-between items-center mx-auto p-4">
        <a href="#" class="text-white text-2xl font-bold">BILLIARD</a>
        
        <div class="flex items-center space-x-4">
            <!-- Tombol Notifikasi Lonceng -->
            <button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification"
                class="relative inline-flex items-center text-sm text-gray-500 hover:text-gray-300 focus:outline-none">
                <!-- Ikon Lonceng -->
                <svg class="w-6 h-6 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 14 20">
                    <path d="M12.133 10.632v-1.8A5.406 5.406 0 0 0 7.979 3.57.946.946 0 0 0 8 3.464V1.1a1 1 0 0 0-2 0v2.364a.946.946 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C1.867 13.018 0 13.614 0 14.807 0 15.4 0 16 .538 16h12.924C14 16 14 15.4 14 14.807c0-1.193-1.867-1.789-1.867-4.175ZM3.823 17a3.453 3.453 0 0 0 6.354 0H3.823Z"/>
                </svg>
                <!-- Badge -->
                @if(!empty($notifikasiReservasi))

                    <span class="absolute top-0 right-0 block w-2.5 h-2.5 bg-red-600 border-2 border-white rounded-full"></span>
                @endif
            </button>

            <!-- Tombol User -->
            <button id="dropdownUserButton" data-dropdown-toggle="dropdownUser"
                class="text-white focus:outline-none rounded-full">
                <i class="fas fa-user-circle text-2xl"></i>
            </button>
        </div>

        <!-- Dropdown Notifikasi -->
        <div id="dropdownNotification"
            class="hidden z-50 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-800 dark:divide-gray-700">
            <div class="px-4 py-2 font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-800 dark:text-white">
                Notifikasi ({{ !empty($notifikasiReservasi) ? count($notifikasiReservasi) : 0 }})
            </div>
            <div class="divide-y divide-gray-100 dark:divide-gray-700 max-h-60 overflow-y-auto">
                @forelse($notifikasiReservasi as $notif)
                    <a href="reservasi" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <div class="w-full">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Reservasi dari <b>{{ $notif->pelanggan->nama_pengguna ?? 'Pelanggan' }}</b> menunggu konfirmasi.
                            </p>
                        </div>
                    </a>
                @empty
                    <p class="px-4 py-3 text-center text-gray-500 dark:text-gray-400">Tidak ada notifikasi baru</p>
                @endforelse
            </div>
        </div>

        <!-- Dropdown User -->
        <div id="dropdownUser"
            class="hidden z-50 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow">
            <div class="px-4 py-2 text-black text-center">
                <p class="mb-2">Hello, Pemilik</p>
                <form method="POST" action="{{ route('pemilik.logout') }}">
                    @csrf
                    <button type="submit"
                        class="text-red-600 border border-red-500 px-4 py-2 rounded hover:bg-red-500 hover:text-white transition">
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
