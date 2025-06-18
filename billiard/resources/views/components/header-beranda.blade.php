<nav class="fixed top-0 z-50 w-full bg-slate-800 border-b border-slate-700">
    <div class="max-w-screen-xl flex justify-between items-center mx-auto p-4">
        <a href="#" class="text-white text-2xl font-bold">BILLIARD</a>
        <div class="flex items-center space-x-4">
            <button id="dropdownUserButton" data-dropdown-toggle="dropdownUser"
                class="text-white focus:outline-none rounded-full">
                <i class="fas fa-user-circle text-2xl"></i>
            </button>
            <div id="dropdownUser"
                 class="hidden z-50 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow">
                <div class="px-4 py-2 text-black text-center">
                    <p class="mb-2">Hello, Pemilik</p>
                    <form method="POST" action="{{ route('pemilik.logout') }}">
                        @csrf
                        <button type="submit"class="text-red-600 border border-red-500 px-4 py-2 rounded hover:bg-red-500 hover:text-white transition">
                            Keluar
                        </button>
                    </form>
                </div>
        </div>
    </div>
</nav>
