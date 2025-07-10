@extends('layouts.dashboard-public')
@section('title', 'Reservasi Meja')
@section('content')

<!-- Hero Section with Video Background -->
<section id="beranda" class="relative h-[700px] overflow-hidden font-poppins">
  <!-- Video Background -->
  <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover z-0">
    <source src="{{ asset('videos/forcue.mp4') }}" type="video/mp4" />
    Browser kamu tidak mendukung video.
  </video>

  <!-- Overlay dan Konten -->
  <div class="absolute inset-0 bg-black bg-opacity-60 z-10 flex items-start justify-start px-6 md:px-20 pt-32">
    <div class="text-white space-y-4 animate-fadeInLeft max-w-xl z-20" data-aos="fade-right" data-aos-duration="1000">
      <h1 class="text-4xl md:text-5xl font-bold leading-tight">
        CHALLENGE ACCEPTED!<br />SIAP ADU SKILL DI MEJA BILLIARD?
      </h1>
      <p class="text-sm md:text-base">Klik tombol di bawah untuk reservasi meja billiard.</p>
      <a href="#pilih-meja" class="relative top-6 bg-[#1E3A5F] text-white text-base px-6 py-2 rounded-full border-2 border-white shadow-md hover:bg-[#162c48] transition">
        Pesan Sekarang
      </a>
    </div>
  </div>
</section>

@include('components.schedule_popup')


<!-- Pilih Meja Section -->
<section id="pilih-meja" class="py-20 text-center bg-[#1E3A5F] text-white font-poppins">
  <h2 class="text-2xl font-bold mb-10" data-aos="fade-up">TENTUKAN PILIHANMU</h2>
  <div class="slider-container mx-auto">
    <div class="slider-track flex gap-6 justify-center flex-wrap">
      @foreach($meja as $m)
        <div class="slider-item bg-white text-[#1E3A5F] rounded-2xl shadow-xl w-[280px] p-4 flex flex-col items-center"
             data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
          <img src="<?= $m['src']; ?>" alt="<?= $m['judul']; ?>" class="w-full h-full object-cover rounded-[20px]" />
          <div class="p-4 space-y-2">
            <h3 class="text-base font-bold mb-6 uppercase text-[#1E3A5F]"><?= $m['judul']; ?></h3>
            <a href="<?= $m['link']; ?>" class="mt-4 bg-[#1E3A5F] text-white font-semibold text-sm py-2 px-6 rounded-full border border-white hover:bg-[#162c48] transition">
              Pilih Meja
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Tentang Section -->
<section id="tentang" class="bg-[#D7E6F4] py-20 px-4 text-[#1E3A5F] font-poppins" data-aos="fade-up" data-aos-duration="1000">
  <div class="max-w-3xl mx-auto text-center">
    <h2 class="text-3xl font-extrabold mb-6">MENGAPA FORCUE?</h2>
    <p class="text-base md:text-lg font-medium leading-relaxed">
      Karena kami tahu betapa menyebalkannya datang ke tempat billiard dan harus antre lama, apalagi di jam-jam sibuk.
      <br class="hidden sm:block" />
      <span class="inline-block mt-2">
        Forcue hadir sebagai solusi reservasi yang cepat, simpel, dan efisien — proses reservasi, billing, dan bahkan memilih meja jadi lebih nyaman dan terintegrasi.
      </span>
    </p>
  </div>
</section>

<!-- Lokasi Section -->
<section id="lokasi" class="py-20 bg-[#1E3A5F] text-white font-poppins" data-aos="fade-up" data-aos-duration="800">
  <div class="container mx-auto text-center">
    <h2 class="text-2xl font-bold mb-6">LOKASI KAMI</h2>
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d15956.129539065887!2d104.040722!3d1.137265!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMcKwMDgnMTQuMiJOIDEwNMKwMDInMjYuNiJF!5e0!3m2!1sen!2sus!4v1751639181550!5m2!1sen!2sus" 
      width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </div>
</section>

<!-- Google Fonts: Poppins -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<script>
  function loadKeranjang() {
    const keranjangContent = document.getElementById("keranjangContent");
    keranjangContent.innerHTML = `<p class="text-gray-400">Memuat keranjang...</p>`;

    fetch("/keranjang/data")
      .then(res => res.json())
      .then(data => {
        if (data.length === 0) {
          keranjangContent.innerHTML = `<p class="text-gray-400">Keranjang kosong.</p>`;
        } else {
          keranjangContent.innerHTML = data.map(item => `
            <div class="p-4 border rounded-lg mb-2 bg-white shadow">
              <p class="font-bold text-[#1E3A5F]">${item.nama_meja}</p>
              <p class="text-sm text-gray-700">Tanggal: ${item.tanggal}</p>
              <p class="text-sm text-gray-700">Jam: ${item.jam_mulai} - ${item.jam_selesai}</p>
            </div>
          `).join('');
        }
      })
      .catch(() => {
        keranjangContent.innerHTML = `<p class="text-red-500">Gagal memuat keranjang.</p>`;
      });
  }

  function toggleKeranjang() {
    const popup = document.getElementById("schedulePopup");
    popup.classList.remove("hidden");
    loadKeranjang(); // ⬅️ Pastikan ini dipanggil di sini
  }

  function closeSchedulePopup() {
    document.getElementById("schedulePopup").classList.add("hidden");
  }

  // Tutup dropdown profil saat klik di luar
  document.addEventListener("click", function (e) {
    const dropdown = document.getElementById("dropdownMenu");
    const btn = document.getElementById("userBtn");
    if (dropdown && btn && !dropdown.contains(e.target) && !btn.contains(e.target)) {
      dropdown.classList.add("hidden");
    }
  });
</script>


@endsection