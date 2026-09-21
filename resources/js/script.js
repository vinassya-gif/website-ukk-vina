document.addEventListener('DOMContentLoaded', function () {

    // 1. Animasi counter angka (jumlah guru & siswa)
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        const target = +counter.getAttribute('data-target');
        let current = 0;
        const increment = Math.max(target / 60, 1);

        const updateCounter = () => {
            current += increment;
            if (current < target) {
                counter.innerText = Math.ceil(current);
                requestAnimationFrame(updateCounter);
            } else {
                counter.innerText = target;
            }
        };
        updateCounter();
    });

    // 2. Lightbox galeri sederhana
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const galeriImgs = document.querySelectorAll('.galeri-item img');

    galeriImgs.forEach(img => {
        img.addEventListener('click', () => {
            if (lightbox && lightboxImg) {
                lightboxImg.src = img.src;
                lightbox.classList.add('show');
            }
        });
    });

    if (lightbox) {
        lightbox.addEventListener('click', () => {
            lightbox.classList.remove('show');
        });
    }

    // 3. Navbar shadow saat discroll
    const nav = document.querySelector('.navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            nav.classList.add('shadow');
        } else {
            nav.classList.remove('shadow');
        }
    });
    
});