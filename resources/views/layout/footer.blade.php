         <!-- footer section -->
         <section
             class="bg-slate-900 laptopsm:h-auto laptopxsm:h-auto tablet:h-auto phone:h-auto phonesm:h-auto xsm:h-auto pb-6">
             <div
                 class="grid grid-flow-row laptopsm:grid-cols-4 tablet:grid-cols-4 phone:grid-cols-2 laptopsm:gap-5 tablet:gap-3 phone:gap-4 laptopsm:ps-24 laptopsm:py-14 laptopsm:pe-6 tablet:ps-14 tablet:py-8 tablet:pe-4 phone:ps-10 phone:py-4 phone:pe-2 ">
                 <div class="laptopsm:pe-28 tablet:pe-16 phone:12">
                     <h1
                         class="laptopsm:text-2xl tablet:text-xl phone:text-lg text-white border-l-4 ps-2 border-orange-500 dark:border-blue-400">
                         Restaurantly</h1>
                     <ul
                         class="ps-1 pt-3 space-y-2 text-slate-300 opacity-75 laptopsm:text-base tablet:text-base phone:text-sm">
                         <li>{{ $setting->address }}</li>
                         {{-- <li class="laptopsm:pb-5 tablet:pb-5 phone:pb-1">NO 2924848</li> --}}
                         <li>Phone : {{ $setting->phone }}</li>
                         <li>Email : {{ $setting->email }}</li>
                     </ul>
                 </div>
                 <div class="laptopsm:pe-36">
                     <h1
                         class="laptopsm:text-2xl tablet:text-xl phone:text-lg text-white  border-l-4 ps-2 border-orange-500 dark:border-blue-400">
                         Useful Links</h1>
                     <ul
                         class="ps-1 pt-3 text-slate-300 opacity-75 laptopsm:text-base tablet:text-base phone:text-[10px]">

                         <a href="/menus" class="block laptopsm:pb-2 tablet:pb-2 phone:pb-1">
                             <li><span class="text-orange-500 dark:text-blue-400 text-lg font-bold pb-6">></span> Menu
                             </li>
                         </a>
                         <a href="/#aboutus" class="block laptopsm:pb-2">
                             <li><span class="text-orange-500 dark:text-blue-400 text-lg font-bold">></span> Table</li>
                         </a>
                         <a href="/#contact" class="block laptopsm:pb-2 tablet:pb-2 phone:pb-1">
                             <li><span class="text-orange-500 dark:text-blue-400 text-lg font-bold">></span> Chefs</li>
                         </a>
                         <a href="/#menu" class="block laptopsm:pb-2 tablet:pb-2 phone:pb-1">
                             <li><span class="text-orange-500 dark:text-blue-400 text-lg font-bold">></span> Today
                                 Special</li>
                         </a>

                     </ul>
                 </div>
                 <div class="laptopsm:pe-36">
                     <h1
                         class="laptopsm:text-2xl tablet:text-xl phone:text-lg text-white  border-l-4 ps-2 border-orange-500 dark:border-blue-400">
                         Quick Links</h1>
                     <ul
                         class="ps-1 pt-3 text-slate-300 opacity-75 laptopsm:text-base tablet:text-base phone:text-[10px]">
                         <a href="/#home" class="block laptopsm:pb-2 tablet:pb-2 phone:pb-1">
                             <li><span class="text-orange-500 dark:text-blue-400 text-lg font-bold pb-6">></span> Home
                             </li>
                         </a>
                         <a href="/#aboutus" class="block laptopsm:pb-2">
                             <li><span class="text-orange-500 dark:text-blue-400 text-lg font-bold">></span> About us
                             </li>
                         </a>
                         <a href="/#contact" class="block laptopsm:pb-2 tablet:pb-2 phone:pb-1">
                             <li><span class="text-orange-500 dark:text-blue-400 text-lg font-bold">></span> Contact us
                             </li>
                         </a>
                         @guest
                             <a href="\register" class="block laptopsm:pb-2 tablet:pb-2 phone:pb-1">
                                 <li><span class="text-orange-500 dark:text-blue-400 text-lg font-bold">></span>
                                     Register
                                 </li>
                             </a>
                         @endguest

                     </ul>
                 </div>
                 <div class="lg:w-80">
                     <h1
                         class="laptopsm:text-2xl tablet:text-xl phone:text-lg  text-white  border-l-4 ps-2 border-orange-500 dark:border-blue-400">
                         {{ $setting->name }}</h1>
                     <p class="laptopsm:text-base tablet:text-base phone:text-sm text-slate-300 opacity-90 indent-5">In
                         our online shopping website, you can go a shop the items you want. Our website is a secure open
                         type and everyone can visit to our website.
                     </p>
                     <div class="flex justify-around">
                         <a href="{{ $setting->facebook_link ?? 'https://www.facebook.com' }}" target="_blank">
                             <svg class=" " width="67px" height="67px" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                 <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                 <g id="SVGRepo_iconCarrier">
                                     <path
                                         d="M20 12.05C19.9813 10.5255 19.5273 9.03809 18.6915 7.76295C17.8557 6.48781 16.673 5.47804 15.2826 4.85257C13.8921 4.2271 12.3519 4.01198 10.8433 4.23253C9.33473 4.45309 7.92057 5.10013 6.7674 6.09748C5.61422 7.09482 4.77005 8.40092 4.3343 9.86195C3.89856 11.323 3.88938 12.8781 4.30786 14.3442C4.72634 15.8103 5.55504 17.1262 6.69637 18.1371C7.83769 19.148 9.24412 19.8117 10.75 20.05V14.38H8.75001V12.05H10.75V10.28C10.7037 9.86846 10.7483 9.45175 10.8807 9.05931C11.0131 8.66687 11.23 8.30827 11.5161 8.00882C11.8022 7.70936 12.1505 7.47635 12.5365 7.32624C12.9225 7.17612 13.3368 7.11255 13.75 7.14003C14.3498 7.14824 14.9482 7.20173 15.54 7.30003V9.30003H14.54C14.3676 9.27828 14.1924 9.29556 14.0276 9.35059C13.8627 9.40562 13.7123 9.49699 13.5875 9.61795C13.4627 9.73891 13.3667 9.88637 13.3066 10.0494C13.2464 10.2125 13.2237 10.387 13.24 10.56V12.07H15.46L15.1 14.4H13.25V20C15.1399 19.7011 16.8601 18.7347 18.0985 17.2761C19.3369 15.8175 20.0115 13.9634 20 12.05Z"
                                         fill="#1916d4"></path>
                                 </g>
                             </svg>
                         </a>
                         <a href="{{ $setting->instagram_link ?? 'https://www.instagram.com' }}" target="_blank">
                             <svg class="text-base w-12 width="64px" height="64px" viewBox="0 0 32 32" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                 <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                 <g id="SVGRepo_iconCarrier">
                                     <rect x="2" y="2" width="28" height="28" rx="6"
                                         fill="url(#paint0_radial_87_7153)"></rect>
                                     <rect x="2" y="2" width="28" height="28" rx="6"
                                         fill="url(#paint1_radial_87_7153)"></rect>
                                     <rect x="2" y="2" width="28" height="28" rx="6"
                                         fill="url(#paint2_radial_87_7153)"></rect>
                                     <path
                                         d="M23 10.5C23 11.3284 22.3284 12 21.5 12C20.6716 12 20 11.3284 20 10.5C20 9.67157 20.6716 9 21.5 9C22.3284 9 23 9.67157 23 10.5Z"
                                         fill="white"></path>
                                     <path fill-rule="evenodd" clip-rule="evenodd"
                                         d="M16 21C18.7614 21 21 18.7614 21 16C21 13.2386 18.7614 11 16 11C13.2386 11 11 13.2386 11 16C11 18.7614 13.2386 21 16 21ZM16 19C17.6569 19 19 17.6569 19 16C19 14.3431 17.6569 13 16 13C14.3431 13 13 14.3431 13 16C13 17.6569 14.3431 19 16 19Z"
                                         fill="white"></path>
                                     <path fill-rule="evenodd" clip-rule="evenodd"
                                         d="M6 15.6C6 12.2397 6 10.5595 6.65396 9.27606C7.2292 8.14708 8.14708 7.2292 9.27606 6.65396C10.5595 6 12.2397 6 15.6 6H16.4C19.7603 6 21.4405 6 22.7239 6.65396C23.8529 7.2292 24.7708 8.14708 25.346 9.27606C26 10.5595 26 12.2397 26 15.6V16.4C26 19.7603 26 21.4405 25.346 22.7239C24.7708 23.8529 23.8529 24.7708 22.7239 25.346C21.4405 26 19.7603 26 16.4 26H15.6C12.2397 26 10.5595 26 9.27606 25.346C8.14708 24.7708 7.2292 23.8529 6.65396 22.7239C6 21.4405 6 19.7603 6 16.4V15.6ZM15.6 8H16.4C18.1132 8 19.2777 8.00156 20.1779 8.0751C21.0548 8.14674 21.5032 8.27659 21.816 8.43597C22.5686 8.81947 23.1805 9.43139 23.564 10.184C23.7234 10.4968 23.8533 10.9452 23.9249 11.8221C23.9984 12.7223 24 13.8868 24 15.6V16.4C24 18.1132 23.9984 19.2777 23.9249 20.1779C23.8533 21.0548 23.7234 21.5032 23.564 21.816C23.1805 22.5686 22.5686 23.1805 21.816 23.564C21.5032 23.7234 21.0548 23.8533 20.1779 23.9249C19.2777 23.9984 18.1132 24 16.4 24H15.6C13.8868 24 12.7223 23.9984 11.8221 23.9249C10.9452 23.8533 10.4968 23.7234 10.184 23.564C9.43139 23.1805 8.81947 22.5686 8.43597 21.816C8.27659 21.5032 8.14674 21.0548 8.0751 20.1779C8.00156 19.2777 8 18.1132 8 16.4V15.6C8 13.8868 8.00156 12.7223 8.0751 11.8221C8.14674 10.9452 8.27659 10.4968 8.43597 10.184C8.81947 9.43139 9.43139 8.81947 10.184 8.43597C10.4968 8.27659 10.9452 8.14674 11.8221 8.0751C12.7223 8.00156 13.8868 8 15.6 8Z"
                                         fill="white"></path>
                                     <defs>
                                         <radialGradient id="paint0_radial_87_7153" cx="0" cy="0"
                                             r="1" gradientUnits="userSpaceOnUse"
                                             gradientTransform="translate(12 23) rotate(-55.3758) scale(25.5196)">
                                             <stop stop-color="#B13589"></stop>
                                             <stop offset="0.79309" stop-color="#C62F94"></stop>
                                             <stop offset="1" stop-color="#8A3AC8"></stop>
                                         </radialGradient>
                                         <radialGradient id="paint1_radial_87_7153" cx="0" cy="0"
                                             r="1" gradientUnits="userSpaceOnUse"
                                             gradientTransform="translate(11 31) rotate(-65.1363) scale(22.5942)">
                                             <stop stop-color="#E0E8B7"></stop>
                                             <stop offset="0.444662" stop-color="#FB8A2E"></stop>
                                             <stop offset="0.71474" stop-color="#E2425C"></stop>
                                             <stop offset="1" stop-color="#E2425C" stop-opacity="0"></stop>
                                         </radialGradient>
                                         <radialGradient id="paint2_radial_87_7153" cx="0" cy="0"
                                             r="1" gradientUnits="userSpaceOnUse"
                                             gradientTransform="translate(0.500002 3) rotate(-8.1301) scale(38.8909 8.31836)">
                                             <stop offset="0.156701" stop-color="#406ADC"></stop>
                                             <stop offset="0.467799" stop-color="#6A45BE"></stop>
                                             <stop offset="1" stop-color="#6A45BE" stop-opacity="0"></stop>
                                         </radialGradient>
                                     </defs>
                                 </g>
                             </svg>
                         </a>
                         <a href="{{ $setting->telegram_link ?? 'https://telegram.org' }}" target="_blank">
                             <svg class="text-base w-12" width="67px" height="67px" viewBox="0 0 32 32"
                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                 <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                 <g id="SVGRepo_iconCarrier">
                                     <circle cx="16" cy="16" r="14"
                                         fill="url(#paint0_linear_87_7225)"></circle>
                                     <path
                                         d="M22.9866 10.2088C23.1112 9.40332 22.3454 8.76755 21.6292 9.082L7.36482 15.3448C6.85123 15.5703 6.8888 16.3483 7.42147 16.5179L10.3631 17.4547C10.9246 17.6335 11.5325 17.541 12.0228 17.2023L18.655 12.6203C18.855 12.4821 19.073 12.7665 18.9021 12.9426L14.1281 17.8646C13.665 18.3421 13.7569 19.1512 14.314 19.5005L19.659 22.8523C20.2585 23.2282 21.0297 22.8506 21.1418 22.1261L22.9866 10.2088Z"
                                         fill="white"></path>
                                     <defs>
                                         <linearGradient id="paint0_linear_87_7225" x1="16" y1="2"
                                             x2="16" y2="30" gradientUnits="userSpaceOnUse">
                                             <stop stop-color="#37BBFE"></stop>
                                             <stop offset="1" stop-color="#007DBB"></stop>
                                         </linearGradient>
                                     </defs>
                                 </g>
                             </svg>
                         </a>
                     </div>
                 </div>
             </div>
             <div class="text-white text-center dark:text-white py-4 p border-t-2 border-slate-700 ">
                 <p class=" drop-shadow-lg"><span class="text-blue-500 font-bold text-lg ">&copy; </span> Copyright
                     <span class="font-bold"> Hungry Haven </span>. All Rights Reserved
                 </p>
                 <p class="pt-2 drop-shadow-lg">Designed By <span class="text-orange-500">TailwindMade</span></p>
             </div>
         </section>
         <div
             class="-mb-5 fixed z-50 w-full h-16 max-w-lg -translate-x-1/2 bg-slate-300 border border-gray-200 rounded-full bottom-4 left-1/2 dark:bg-gray-700 dark:border-gray-600 lg:hidden md:hidden sm:block">
             <div class="grid h-full max-w-lg grid-cols-5 mx-auto">
                 <button data-tooltip-target="tooltip-home" type="button"
                     class="inline-flex flex-col items-center justify-center px-5 rounded-l-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                     <a href="/#home">
                         <svg class="w-5 h-5 mb-1 text-blue-700 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                             aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                             viewBox="0 0 20 20">
                             <path
                                 d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                         </svg>
                     </a>
                     <span class="sr-only">Home</span>
                 </button>
                 <div id="tooltip-home" role="tooltip"
                     class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                     Home
                     <div class="tooltip-arrow" data-popper-arrow></div>
                 </div>
                 <button data-tooltip-target="tooltip-wallet" type="button"
                     class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                     <a href="/#tableside">
                         <i
                             class="fa-solid fa-t w-5 h-5 mb-1 text-blue-700 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"></i>
                     </a>
                     <span class="sr-only">Table</span>
                 </button>
                 <div id="tooltip-wallet" role="tooltip"
                     class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                     Table
                     <div class="tooltip-arrow" data-popper-arrow></div>
                 </div>
                 <div class="flex items-center justify-center">
                     <button data-tooltip-target="tooltip-new" type="button"
                         class="inline-flex items-center justify-center w-10 h-10 font-medium bg-blue-600 rounded-full hover:bg-blue-700 group focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
                         <a href="/#menu">
                             <i
                                 class="fa-solid fa-bars w-5 h-5 mb-1 text-orange-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"></i>
                         </a>
                         <span class="sr-only">Menu</span>
                     </button>
                 </div>
                 <div id="tooltip-new" role="tooltip"
                     class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                     Menu
                     <div class="tooltip-arrow" data-popper-arrow></div>
                 </div>
                 <button data-tooltip-target="tooltip-settings" type="button"
                     class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                     <div class="/#chef">
                         <i
                             class="fa-solid fa-kitchen-set w-5 h-5 mb-1 text-blue-700 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"></i>
                     </div>
                     <span class="sr-only">Chef</span>
                 </button>
                 <div id="tooltip-settings" role="tooltip"
                     class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                     Chef
                     <div class="tooltip-arrow" data-popper-arrow></div>
                 </div>
                 <button type="button"
                     class="inline-flex flex-col items-center justify-center px-5 rounded-r-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                     <a href="/#contact">
                         <i
                             class="fa-regular fa-address-book w-5 h-5 mb-1 text-blue-700 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"></i>
                     </a>
                     <span class="sr-only">Contact</span>
                 </button>
                 <div id="tooltip-profile" role="tooltip"
                     class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                     Contact
                     <div class="tooltip-arrow" data-popper-arrow></div>
                 </div>
             </div>
         </div>
