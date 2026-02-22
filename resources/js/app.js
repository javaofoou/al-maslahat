import './bootstrap';
import Alpine from 'alpinejs';
import Swiper, { Navigation, Pagination, Autoplay } from 'swiper';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {

    // HERO SLIDER
    const heroSwiperEl = document.querySelector('.swiper-container');
    if (heroSwiperEl) {
        new Swiper('.swiper-container', {
            modules: [Navigation, Pagination, Autoplay],
            loop: true,
            autoplay: { delay: 5000 },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: { el: '.swiper-pagination', clickable: true },
        });
    }

    // POSTS SWIPER
    const postsSwiperEl = document.querySelector('.swiper-posts');
    if (postsSwiperEl) {
        new Swiper('.swiper-posts', {
            modules: [Navigation],
            slidesPerView: 1,
            spaceBetween: 20,
            loop: false,
            breakpoints: {
                640: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            },
            navigation: {
                nextEl: '.swiper-posts .swiper-button-next',
                prevEl: '.swiper-posts .swiper-button-prev',
            },
        });
    }

    // BLOGS SWIPER
    const blogsSwiperEl = document.querySelector('.swiper-blogs');
    if (blogsSwiperEl) {
        new Swiper('.swiper-blogs', {
            modules: [Navigation],
            slidesPerView: 1,
            spaceBetween: 20,
            loop: false,
            breakpoints: {
                640: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            },
            navigation: {
                nextEl: '.swiper-blogs .swiper-button-next',
                prevEl: '.swiper-blogs .swiper-button-prev',
            },
        });
    }

});