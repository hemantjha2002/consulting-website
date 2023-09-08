const swiper = new Swiper(".swiper", {
    slidesPerView: 5,
    spaceBetween: 40,
    loop: true, // Enable loop
    grabCursor: true,
    centeredSlides: true,
    slideActiveClass: "active",
    pagination: {
        el: ".pagination",
        clickable: true
    },
    autoplay: {
        enabled: true,
        delay: 3000
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
        },
        480: {
            slidesPerView: 3,
            spaceBetween: 10,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        992: {
            slidesPerView: 4,
        },
        1000: {
            slidesPerView: 4,
        },
        1100: {
            slidesPerView: 4,
        },
        1200: {
            slidesPerView: 5,
        },
        1400: {
            slidesPerView: 5,
            spaceBetween: 30,
        },
    }
});
