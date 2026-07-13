 ScrollReveal().reveal('.headline', {
     delay: 500,
     origin: "bottom",
     distance: "50px",
     interval: 50,
     scale: 0.85,
     reset: true,
 });

 const swiper = new Swiper('.swiper', {
     loop: true,
     autoplay: {
         delay: 5000,
     },
     pagination: {
         el: '.swiper-pagination',
     },
     navigation: {
         nextEl: '.swiper-button-next',
         prevEl: '.swiper-button-prev',
     },
     scrollbar: {
         el: '.swiper-scrollbar',
     },
 });
