document.addEventListener("DOMContentLoaded", function () {
    var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 2,
        loop: true, // جعل السلايدر دائري يستمر في العرض
        coverflowEffect: {
            rotate: -30,
            stretch: -50,
            depth: 600,
            modifier: 1,
            slideShadows: false,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
});
