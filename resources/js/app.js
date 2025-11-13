import './bootstrap';

// --- IMPORTS ---
// 1. Import Splide JS (Slider) dan CSS-nya
import Splide from '@splidejs/splide';
import '@splidejs/splide/css'; 

// 2. Import GLightbox (Popup Galeri) dan CSS-nya
import GLightbox from 'glightbox';
import 'glightbox/dist/css/glightbox.min.css';


// --- INITIALIZATION ---
// Tunggu hingga halaman selesai dimuat (CUKUP SATU KALI)
document.addEventListener('DOMContentLoaded', () => {

    // A. Inisialisasi Splide (Slider)
    const mainSlider = document.getElementById('banner-slider');
    if (mainSlider) {
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

    // B. Inisialisasi GLightbox (Popup Galeri)
    const lightbox = GLightbox({
        selector: '.gallery-lightbox',
        touchNavigation: true,
        loop: true,
        zoomable: true
    });

    // Anda bisa tambahkan inisialisasi JS lain di sini
});