import './bootstrap';

// --- IMPORTS ---
// 1. Import Splide JS (Slider) dan CSS-nya
import Splide from '@splidejs/splide';
import '@splidejs/splide/css';
// Expose Splide to window as fallback for any inline scripts or third-party code
window.Splide = Splide;

// 2. Import GLightbox (Popup Galeri) dan CSS-nya
import GLightbox from 'glightbox';
import 'glightbox/dist/css/glightbox.min.css';


// --- INITIALIZATION ---
// Tunggu hingga halaman selesai dimuat (CUKUP SATU KALI)
document.addEventListener('DOMContentLoaded', () => {

    // A. Inisialisasi Splide untuk semua elemen dengan class .splide
    const splideElements = document.querySelectorAll('.splide');
    if (splideElements.length) {
        splideElements.forEach(function (el) {
            // Coba baca opsi dari atribut data-splide (JSON)
            let options = {};
            const data = el.getAttribute('data-splide');
            if (data) {
                try {
                    options = JSON.parse(data);
                } catch (e) {
                    console.warn('data-splide JSON invalid pada elemen', el, e);
                }
            }

            // Jika tidak ada data-splide, berikan opsi default berdasarkan konteks
            if (!data || Object.keys(options).length === 0) {
                if (el.id === 'banner-slider') {
                    options = {
                        type: 'loop',
                        perPage: 1,
                        autoplay: true,
                        interval: 5000,
                        arrows: false,
                        pagination: true,
                        pauseOnHover: false,
                        pauseOnFocus: false,
                        lazyLoad: 'nearby'
                    };
                } else if (el.classList.contains('splide-tenaga')) {
                    options = {
                        type: 'loop',
                        perPage: 4,
                        perMove: 1,
                        gap: '1rem',
                        autoplay: true,
                        interval: 3000,
                        pauseOnHover: true,
                        pauseOnFocus: true,
                        arrows: true,
                        pagination: false,
                        breakpoints: {
                            1024: { perPage: 3 },
                            768: { perPage: 2 },
                            480: { perPage: 1 }
                        }
                    };
                } else {
                    options = { type: 'loop', perPage: 1 };
                }
            }

            try {
                new Splide(el, options).mount();
            } catch (e) {
                console.error('Gagal menginisialisasi Splide pada elemen', el, e);
            }
        });
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
