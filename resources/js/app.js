import './bootstrap';

// 1. Import Splide JS dan CSS-nya
import Splide from '@splidejs/splide';
import '@splidejs/splide/css'; 
// Anda bisa ganti 'splide/css' dengan 'splide/css/sea-green' atau 'splide/css/core' jika mau tema lain

// 2. Tunggu hingga halaman selesai dimuat
document.addEventListener('DOMContentLoaded', () => {

    // 3. Cari elemen slider kita (yang akan kita buat di Blade)
    // Kita beri ID '#banner-slider' agar spesifik
    const mainSlider = document.getElementById('banner-slider');

    if (mainSlider) {
        // 4. Inisialisasi Splide
        new Splide(mainSlider, {
            type       : 'loop', // Tipe 'loop' (berputar) atau 'slide' (berhenti di akhir)
            perPage    : 1,      // Tampilkan 1 slide per halaman
            autoplay   : true,   // Putar otomatis
            interval   : 5000,   // Jeda 5 detik
            arrows     : true,   // Tampilkan panah navigasi
            pagination : true,   // Tampilkan titik-titik di bawah
            pauseOnHover: true,  // Jeda saat mouse di atasnya
            lazyLoad   : 'nearby', // Optimasi load gambar
        }).mount();
    }

    // Anda bisa tambahkan inisialisasi slider lain di sini jika perlu
});