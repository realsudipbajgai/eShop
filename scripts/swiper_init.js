//Initialize Swiper

var swiper = new Swiper(".mySwiper", {
    loop:true,
    pagination: {
      el: ".swiper-pagination",
      dynamicBullets: true,
    },
    breakpoins:{
      '600':{
        slidesPerView:1
      }
    }
  
  });
