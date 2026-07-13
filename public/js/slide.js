 const navside = document.querySelector('.navside');
 var waypoint = new Waypoint({
     element: document.getElementById('tableside'),
     handler: function(direction) {
         if (direction === "down") {
             navside.classList.add('fixed', 'w-full', 'shadow-sm', 'animate_fadeInDown')
         } else {
             navside.classList.remove('fixed', 'w-full', 'shadow-sm', 'animate_fadeInDown')

         }
     },
     offset: '75%'
 })


 ScrollReveal().reveal('.headline', {
     delay: 500,
     origin: "bottom",
     distance: "50px",
     interval: 50,
     scale: 0.85,
     reset: true,
 });


 const sections = document.querySelectorAll("section[id]");

 function scrollActive() {

     const scrollY = window.pageYOffset; // scroll height
     sections.forEach((current) => {
         const sectionHeight = current.offsetHeight, // get current height
             sectionTop = current.offsetTop - 58, // get current section of height
             sectionId = current.getAttribute("id"); // get current section id

         if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
             document
                 .querySelector("a[href*=" + sectionId + "]").classList.add("active-link");
         } else {
             document
                 .querySelector("a[href*=" + sectionId + "]").classList.remove("active-link");
         }
     });
 }

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