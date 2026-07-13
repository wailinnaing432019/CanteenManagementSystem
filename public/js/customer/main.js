





 const navcontrol = document.querySelector('.nav_control');
 var waypoint = new Waypoint({
     element: document.getElementById('aboutus'),
     handler: function(direction) {
         if (direction == "down") {
             navcontrol.classList.add('fixed', 'w-full', 'shadow-md', 'animate_fadeInDown')
         } else {
             navcontrol.classList.remove('fixed', 'w-full', 'shadow-md', 'animate_fadeInDown')
         }

     },
     offset: '75%'
 })

 /*=============== SCROLL SECTIONS ACTIVE LINK ===============*/
 // Document ထဲမှာရှိသမျှ section အားလုံးကို select လုပ်ထားပါတယ်။
 const sec = document.querySelectorAll("section[id]");

 function scrollActive() {
     const scrollY = window.pageYOffset; // scroll height
     sec.forEach((current) => {
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
 window.addEventListener("scroll", scrollActive);
