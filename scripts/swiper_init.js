$(document).ready(function (){
    //Initialize Swiper

//large-banner swiper init
    var swiper1 = new Swiper(".large-banner-swiper", {
        loop:true,
        grabCursor:true,
        pagination: {
            el: ".swiper-pagination",
            dynamicBullets: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },


    });

    //this week swiper init
    var this_week_swiper = new Swiper(".best-phones-swiper", {
        loop:true,
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        pagination: {
            el: ".swiper-pagination",
        },


    });

    //Best Pricing swiper init
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        grid: {
            rows: 2,
        },
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        grabCursor:true,
    });
})