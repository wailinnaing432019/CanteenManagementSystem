 //scrollreveal
 ScrollReveal().reveal('.headline', {
     delay: 500,
     origin: "bottom",
     distance: "50px",
     interval: 300,
     scale: 0.85,
     reset: true,
 });


 //waypoint

 const navbar = document.querySelector('.navbar');
 var waypoint = new Waypoint({
     element: document.getElementById('chat'),
     handler: function(direction) {
         if (direction === "down") {
             navbar.classList.add("fixed", "w-full", "animate__fadeInDown", "shadow-lg")
         } else {
             navbar.classList.remove("fixed", "w-full", "animate__fadeInDown", "shadow-lg")
         }
     },
     offset: '70%'
 })

 //mobile menu

 const mobilemenu = document.querySelector('.mobile-menu');
 const mobile = document.querySelector('.mobile');
 const closemenu = document.querySelector('.closemenu');

 closemenu.addEventListener('click', () => {
     mobile.style.left = '-100%'
 })
 mobilemenu.addEventListener('click', () => {
     mobile.style.left = '0px';

 })


 //mobile close
 const closemenu2 = document.querySelectorAll('.mobile-close')

 for (let i = 0; i < closemenu2.length; i++) {
     mobilemenu[i].addEventListener('click', () => {
         mobile.style.left = '-100%'
     })
 }


 /*=============== SCROLL SECTIONS ACTIVE LINK ===============*/
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