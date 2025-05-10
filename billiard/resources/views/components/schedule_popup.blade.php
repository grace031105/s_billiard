<div id="schedulePanel" class="fixed top-0 right-0 w-80 bg-slate-300 h-full transform translate-x-full transition-transform duration-300 ease-in-out p-6 flex flex-col rounded-l-2xl shadow-lg z-50">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-bold">Jadwal Dipilih</h2>
    <button id="closeCart" class="text-2xl text-slate-900">&times;</button>
  </div>
  <div class="flex justify-between font-bold mb-2">
    <span>Tipe Meja</span>
    <span>No Meja</span>
  </div>
  
  <div class="space-y-4">
    <div class="border rounded p-4 bg-slate-200 flex justify-between items-center mb-6">
    <div class="text-sm">Hari, Tanggal, Waktu, Tahun<br />Harga</div>
    <button class="text-slate-900">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142..." />
      </svg>
    </button>
  </div>
  </div>
  <button onclick="lanjutKeDetail()" class="mt-auto w-full bg-slate-900 text-white font-bold py-3 rounded">
  Selanjutnya
</button>
</div>
<div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>
