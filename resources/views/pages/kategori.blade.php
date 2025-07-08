@extends('layouts.meja')

@section('title', 'Kelola Kategori')

@section('sidebar')
@php
use App\Models\Reservasi;
$adaNotifBaru = Reservasi::where('status', 'menunggu_konfirmasi')
    ->where('is_seen', false)
    ->exists();
@endphp


<aside class="fixed top-0 left-0 w-64 h-screen bg-blue-900 text-white z-50">
    <div class="text-center py-6 border-b border-blue-600">
        <h2 class="text-2xl font-bold  tracking-wide">🎱 Billiard</h2>

    </div>
    <nav class="mt-4 px-4 space-y-2">
        <a href="{{ url('beranda') }}" class="flex items-center p-3 rounded-lg hover:bg-slate-700 transition">
            <div class="relative flex items-center gap-3">
                <i class="fas fa-home mr-3"></i>
                <span>Beranda</span>
            </div>
        </a>
        <a href="{{ url('reservasi') }}" class="flex items-center p-3 rounded-lg hover:bg-slate-700 transition">
            <div class="relative flex items-center gap-3">
                <i class="fas fa-calendar-alt mr-3"></i>
                <span>Data Reservasi</span>
                @if($adaNotifBaru)
                    <span class="absolute top-1.5 left-[200px] w-2.5 h-2.5 bg-red-500 rounded-full ring-2 ring-white "></span>
                    <span class="absolute top-1.5 left-[200px] w-2.5 h-2.5 bg-red-500 rounded-full ring-2 ring-white animate-ping"></span>
                @endif
            </div>
        </a>
        <a href="{{ url('kelola_meja') }}" class="flex items-center p-3 rounded-lg hover:bg-slate-700 transition">
            <div class="relative flex items-center gap-3">
                <i class="fas fa-table mr-3"></i>
                <span>Kelola Meja</span>
            </div>
        </a>
        <a href="{{ url('kategori.index') }}" class="flex items-center p-3 rounded-lg hover:bg-slate-700 transition">
            <div class="relative flex items-center gap-3">
                <i class="fas fa-table mr-3"></i>
                <span>Kelola Kategori</span>
            </div>
        </a>
        <a href="{{ route('pemilik.pelanggan') }}" class="flex items-center p-3 rounded-lg hover:bg-slate-700 transition">
            <div class="relative flex items-center gap-3">
                <i class="fas fa-users mr-3"></i>
                <span>Pelanggan</span>
            </div>
        </a>
    </nav>
    <div class="absolute bottom-0 w-full px-4 py-4 border-t border-blue-600">
        <form method="POST" action="{{ route('pemilik.logout') }}">
            @csrf
            <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center p-3 rounded-lg hover:bg-slate-700 transition">
                <div class="relative flex items-center gap-3">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    <span>Keluar</span>
                </div>
            </a>
        </form>
</div>
</aside>
@endsection

<!-- Kelola Kategori Section -->
@section('content')
    <h1 class="text-3xl font-bold mb-4"><i class="fas fa-table mr-3"></i>KELOLA KATEGORI</h2>
    <hr class="border-white mb-4">
    <table class="w-full text-sm text-left text-gray-900 bg-white rounded-lg shadow overflow-hidden dark:bg-gray-800 dark:text-black">
        <thead class="bg-blue-300 text-black">
            <tr class="border-b border-blue-600 text-center">
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Nama Kategori</th>
                <th class="px-4 py-2">Harga Default</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody style="background-color:rgb(244, 247, 249);" >
            @forelse ($kategoris as $index => $kategori)
                <tr class="border-b border-blue-600 text-center">
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2">{{ $kategori->nama_kategori }}</td>
                    <td class="px-4 py-2">Rp{{ number_format($kategori->harga_default, 0, ',', '.') }}</td>
                    <td class="px-4 py-2 flex justify-center gap-2">
                        <button
                            onclick="openEditModal('{{ $kategori->id_kategori }}', '{{ $kategori->nama_kategori }}', '{{ $kategori->harga_default }}')"
                            class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">
                                Edit
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-4 py-2 text-gray-500">Belum ada kategori.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modal Edit Kategori -->
<div id="modalKategoriEdit" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md mx-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex justify-between items-center p-4 border-b rounded-t dark:border-gray-600 bg-gray-100 dark:bg-gray-800">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Edit Kategori</h3>
                <button type="button" data-modal-hide="modalKategoriEdit"
                    class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto dark:hover:bg-gray-600 dark:hover:text-white">✕</button>
            </div>
            <form id="formEditKategori" method="POST" class="p-6 space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-white">Nama Kategori</label>
                    <input type="text" name="nama_kategori" id="edit_nama_kategori" required
                        class="w-full p-2 border rounded bg-white dark:bg-gray-800 text-gray-900 dark:text-white">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-white">Harga Default</label>
                    <input type="number" name="harga_default" id="edit_harga_default" required
                        class="w-full p-2 border rounded bg-white dark:bg-gray-800 text-gray-900 dark:text-white">
                </div>
                <div class="flex justify-end gap-2">
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Update</button>
                    <button type="button" data-modal-hide="modalKategoriEdit"
                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
<script>
    function openEditModal(id, nama, harga) {
        const modal = document.getElementById('modalKategoriEdit');
        const form = document.getElementById('formEditKategori');
        const url = `/kategori/${id}`; // Sesuai route update

        // Isi input
        document.getElementById('edit_nama_kategori').value = nama;
        document.getElementById('edit_harga_default').value = harga;

        // Update form action
        form.action = url;

        modal.classList.remove('hidden');
        modal.classList.add('flex');

        const closeButtons = modal.querySelectorAll('[data-modal-hide]');
        closeButtons.forEach(button => {
            button.onclick = () => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            };
        });
    }
</script>

