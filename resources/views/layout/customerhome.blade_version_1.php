<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/customer.css') }}">

    <style>
        .icontent {
            width: 50px;
            height: 70px;
            top: 35%;
            left: 40%;
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            opacity: 0;
            transition: 0.4s;

        }

        .icontent:hover {
            opacity: 1;
        }

        .icontent>* {
            transform: translateY(25px);
            transition: transform 0.4s;
        }

        .icontent:hover>* {
            transform: translateY(0px);
        }
    </style>
    @livewireStyles()
</head>

<body>
    <div
        class=" bg-blue-300 dark:bg-slate-700 laptopsm:h-screen laptopxsm:h-[800px] tablet:h-[500px] phone:h-[400px] phonesm:h-[350px] xsm:h-[300px] relative m-0 drop-shadow-md">
        <!-- nav start section -->
        <nav class="bg-slate-100 overflow-hidden dark:bg-slate-700 border-gray-200 navside animate_animated z-40">
            <div class="max-w-full flex-wrap flex justify-between drop-shadow-md">
                <div href=""
                    class="flex items-start logo laptopsm:text-base tablet:text-sm phone:text-sm tablet:top-auto tabletsm:top-auto tabletssm:top-auto laptopsm:top-auto laptopxsm:top-auto laptopssm:top-auto phone:top-auto">
                    <img src="{{ asset('storage/' . $setting->logo_image) }}" alt=""
                        class="laptopsm:w-[200px] laptopsm:h-[70px] laptopxsm:w-[180px] laptopxsm:h-[70px] laptopssm:w-[120px] laptopssm:h-[70px] tablet:w-[100px] tablet:h-[70px] tabletsm:w-[150px] tabletsm:h-[70px] phone:w-[150px] phone:h-[70px]">
                </div>
                <button data-collapse-toggle="navbar-default" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 z-50 -translate-x-full">
                </button>
                <div class="w-screen phone:w-auto md:w-auto z-50 tablet:ms-5 ">
                    <ul
                        class="font-medium flex  p-4 md:p-0 phone:p-0 mt-4 md:flex-row phone:flex-row phone:mt-0 md:mt-0 md:border-0 laptopsm:space-x-8 laptopxsm:space-x-4 laptopssm:space-x-1  tabletssm:space-x-1 tablet:space-x-1 tabletsm:space-x-1 phone:space-x-0">
                        <li class="z-50 p-4 lg:inline-block md:inline-block phone:hidden">
                            <a href="#home"
                                class="block py-2 pl-3 pr-4 text-orange-500 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-orange-500 md:dark:hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                                aria-current="page">Home</a>
                        </li>
                        <li class=" z-40 p-4 lg:inline-block md:inline-block phone:hidden">
                            <a href="#aboutus"
                                class="block py-2 pl-3 pr-4 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-orange-500 md:dark:hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                        </li>
                        <li class="z-50 p-4 lg:inline-block md:inline-block phone:hidden">
                            <a href="#tableside"
                                class="block py-2 pl-3 pr-4 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-orange-500 md:dark:hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Table</a>
                        </li>
                        <li class="z-50 p-4 lg:inline-block md:inline-block phone:hidden">
                            <a href="#menu"
                                class="block py-2 pl-3 pr-4 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-orange-500 md:dark:hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Menu</a>
                        </li>
                        <li class="z-50 p-4 lg:inline-block md:inline-block phone:hidden">
                            <a href="#chef"
                                class="block py-2 pl-3 pr-4 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-orange-500 md:dark:hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Chefs</a>
                        </li>
                        <li class="z-50 p-4 lg:inline-block md:inline-block phone:hidden">
                            <a href="#contact"
                                class="block py-2 pl-3 pr-4 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-orange-500 md:dark:hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                        </li>

                        @guest
                            <li class="z-50 p-4 lg:inline-block md:inline-block ">
                                <a href="{{ route('login') }}"
                                    class="block py-2 pl-2 pr-4 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-orange-500 md:dark:hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent ">
                                    Login
                                </a>
                            </li>
                            <li class="z-50 p-4 lg:inline-block md:inline-block ">
                                <a href="{{ route('register') }}"
                                    class="block py-2 pl-2 pr-4 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-orange-500 md:dark:hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent ">
                                    Sign Up
                                </a>
                            </li>
                        @else
                            {{-- <li
                                class="laptopsm:ps-30 laptopxsm:ps-10 laptopssm:ps-5 tablet:ps-0 z-50 laptopsm:py-3 tablet:py-3 tablet:px-2 phone:py-1 lg:block md:block phone:inline-block">
                                <a href="{{ url('/menus/cart') }}"
                                    class="block py-2 pl-6 pr-4 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-orange-500 md:dark:hover:text-blue-700 dark:hover:bg-gray-500 dark:hover:text-white md:dark:hover:bg-transparent "><i
                                        class="fa-solid fa-cart-shopping laptopsm:text-xl tablet:text-xl phone:text-base bg-gray-300 dark:bg-slate-800 p-2 rounded-md"></i></a>
                            </li> --}}
                            <li
                                class="z-50 laptopsm:py-3 tablet:py-3 tablet:px-2 phone:py-1 lg:block md:block phone:inline-block ">
                                <a href="customerFavourite.html"
                                    class="block py-2 pl-2 pr-4 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-orange-500 md:dark:hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent "><i
                                        class="fa-solid fa-heart laptopsm:text-xl tablet:text-xl phone:text-base text-blue-700 bg-gray-300 dark:bg-slate-800 p-2 rounded-md"></i>
                                </a>
                            </li>

                            <li
                                class="z-50 laptopsm:py-3 tablet:py-3 tablet:px-2 phone:py-1 lg:block md:block phone:inline-block">
                                <a href="#"
                                    class="block py-2 pl-2 pr-4 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-orange-500 md:dark:hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent "><i
                                        class="fa-solid fa-bell laptopsm:text-xl tablet:text-xl phone:text-base bg-gray-300 dark:bg-slate-800 p-2 rounded-md"></i></a>
                            </li>
                            <li
                                class="z-50 laptopsm:pe-5 laptopxsm:pe-2 tablet:pe-2 tabletsm:pe-2 tabletssm:pe-2 pt-1 pb-2 lg:block md:block phone:inline-block">
                                <a href="#"
                                    class="mt-0 dark:text-orange-500 md:dark:hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:laptopsm:text tablet:py-3 phone:py-2-white md:dark:hover:bg-transparent text-blue-700">
                                    <div id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider"
                                        class="flex justify-center items-center pt-1">
                                        <div
                                            class=" bg-slate-300 overflow-hidden me-1 phone:w-[35px] phone:h-[35px] phone:rounded-[35px] tablet:w-[45px] tablet:h-[45px] tablet:rounded-[45px] laptopsm:w-[45px] laptopsm:h-[45px] laptopsm:rounded-[45px] phone:mt-1 laptopsm:mt-0 tablet:mt-0">
                                            <img src="./img/download (10).jpeg" alt="">
                                        </div>Pig
                                    </div>
                                </a>

                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!-- nav end -->

        <!-- slide section -->

        <div
            class="swiper sample-slider z-10 relative bg-blue-300 dark:bg-slate-700 laptopsm:h-[650px] laptopxsm:h-[650px] tablet:h-[450px]  phone:h-[300px] phonesm:h-[250px] ">
            <div class="swiper-wrapper">
                <div class="swiper-slide bg-blue-300 laptopsm:h-[650px] tablet:h-[450px]  phone:h-[300px]">
                    <div style=" ">
                        <svg viewBox="0 0 500 150" preserveAspectRatio="none" style=" width: 100%;"
                            class="z-10 laptopsm:h-[650px] tablet:h-[450px]  phone:h-[300px] ">
                            <path
                                d="M213.19,-0.00 C152.70,69.88 270.04,69.88 202.98,149.60 L500.00,149.60 L500.00,-0.00 Z"
                                style="stroke: none; fill: #f1f5f9;"></path>
                        </svg>
                    </div>
                    <div
                        class="img2 laptop:left-[8%] laptopsm:left-[15%] tablet:left-[15%] phone:left-[15%] laptop:top-[50%] laptopsm:top-[20%] tablet:top-[20%] phone:top-[28%] ">
                        <img src="{{ asset('img/food10.png') }}" alt=""
                            class="laptop:h-[300px] laptopsm:h-[300px] tablet:h-[200px] phone:h-[100px] phonesm:h-[50px] laptopsm:w-[350px] tablet:w-[300px] phone:w-[150px] phonesm:w-[100px] xsm:w-[80px] ">
                    </div>
                    <div
                        class="img4 laptopsm:left-[34%] tablet:left-[30%] phone:left-[30%] laptop:top-[8%] laptopsm:top-[17%] tablet:top-[15%] phone:top-[15%] laptopsm:w-[130px] laptopsm:h-[130px] laptopsm:rounded-[130px] tablet:w-[120px] tablet:h-[120px] tablet:rounded-[120px] phone:w-[70px] phone:h-[70px] phone:rounded-[70px] bg-orange-500 items-center justify-center flex laptopsm:text-3xl tablet:text-3xl phone:text-xl drop-shadow-md">
                        55% <br> Off
                    </div>
                    <div class="para laptopsm:w-[600px] tablet:w-[400px] phone:w-[200px] phonesm:w-[200px] ">
                        <div
                            class="laptopsm:top-[20%] tablet:top-[7%] phone:-top-[5%] phonesm:top-[0%] xsm:top-[0%] absolute dark:text-slate-300  laptopsm:text-[17px] tablet:text-[17px]  phone:text-[14px]">
                            <div
                                class="ps-5 tablet:ps-8 pb-5 font-bold text-orange-500 laptopsm:text-3xl tablet:text-2xl phone:text-xl drop-shadow-md">
                                Kwae Tayo</div>
                            <div
                                class="laptopsm:text-[20px] tablet:text-[17px]  phone:text-[11px] ps-9 tablet:ps-10 space-y-6 font-bold drop-shadow-md">
                                Lorem, ipsum
                                dolor
                                sit amet consectetur adipisicing elit. Assumenda a accusamus,
                                voluptate saepe illum molestiae maiores eos officia eius harum! Lorem ipsum dolor
                                sit,</div>
                        </div>
                    </div>

                    <div
                        class="flex space-x-5 but laptopsm:left-[0%] tablet:left-[20%] xsm:left-[10%] laptopsm:top-[60%] tablet:top-[60%] phone:top-[70%]">
                        <button type="submit"
                            class="laptopsm:py-4 laptopsm:px-8 tablet:py-3 tablet:px-7 xsm:px-2 xsm:py-2 text-sm font-medium text-center text-white rounded-lg bg-orange-500 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800  animate__animated animate__bounce  laptopsm:text-[17px] tablet:text-[17px]  phone:text-[14px] drop-shadow-md">Buy
                            Now
                        </button>
                    </div>
                </div>
                <div class="swiper-slide bg-blue-300 laptopsm:h-[650px] tablet:h-[450px]  phone:h-[300px]">
                    <div style=" overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
                            style=" width: 100%;" class="laptopsm:h-[650px] tablet:h-[450px]  phone:h-[300px] ">
                            <path
                                d="M213.19,-0.00 C152.70,69.88 270.04,69.88 202.98,149.60 L500.00,149.60 L500.00,-0.00 Z"
                                style="stroke: none; fill: #f1f5f9;"></path>
                        </svg></div>
                    <div
                        class="img2 laptop:left-[8%] laptopsm:left-[15%] tablet:left-[15%] phone:left-[15%] laptop:top-[50%] laptopsm:top-[20%] tablet:top-[20%] phone:top-[28%] ">
                        <img src="{{ asset('img/food10.png') }}" alt=""
                            class="laptop:h-[300px] laptopsm:h-[300px] tablet:h-[200px] phone:h-[100px] phonesm:h-[50px] laptopsm:w-[350px] tablet:w-[300px] phone:w-[150px] phonesm:w-[100px] xsm:w-[80px] ">
                    </div>
                    <div
                        class="img4 laptopsm:left-[34%] tablet:left-[30%] phone:left-[30%] laptop:top-[8%] laptopsm:top-[17%] tablet:top-[15%] phone:top-[15%] laptopsm:w-[130px] laptopsm:h-[130px] laptopsm:rounded-[130px] tablet:w-[120px] tablet:h-[120px] tablet:rounded-[120px] phone:w-[70px] phone:h-[70px] phone:rounded-[70px] bg-orange-500 items-center justify-center flex laptopsm:text-3xl tablet:text-3xl phone:text-xl drop-shadow-md">
                        55% <br> Off
                    </div>
                    <div class="para laptopsm:w-[600px] tablet:w-[400px] phone:w-[200px] phonesm:w-[200px] ">
                        <div
                            class="laptopsm:top-[20%] tablet:top-[7%] phone:-top-[5%] phonesm:top-[0%] xsm:top-[0%] absolute dark:text-slate-300  laptopsm:text-[17px] tablet:text-[17px]  phone:text-[14px]">
                            <div
                                class="ps-5 tablet:ps-8 pb-5 font-bold text-orange-500 laptopsm:text-3xl tablet:text-2xl phone:text-xl drop-shadow-md">
                                Kwae Tayo</div>
                            <div
                                class="laptopsm:text-[20px] tablet:text-[17px]  phone:text-[11px] ps-9 tablet:ps-10 space-y-6 font-bold drop-shadow-md">
                                Lorem, ipsum
                                dolor
                                sit amet consectetur adipisicing elit. Assumenda a accusamus,
                                voluptate saepe illum molestiae maiores eos officia eius harum! Lorem ipsum dolor
                                sit,</div>
                        </div>
                    </div>

                    <div
                        class="flex space-x-5 but laptopsm:left-[0%] tablet:left-[20%] xsm:left-[10%] laptopsm:top-[60%] tablet:top-[60%] phone:top-[70%]">
                        <button type="submit"
                            class="laptopsm:py-4 laptopsm:px-8 tablet:py-3 tablet:px-7 xsm:px-2 xsm:py-2 text-sm font-medium text-center text-white rounded-lg bg-orange-500 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800  animate__animated animate__bounce  laptopsm:text-[17px] tablet:text-[17px]  phone:text-[14px] drop-shadow-md">Buy
                            Now
                        </button>
                    </div>
                </div>
                <div class="swiper-slide bg-blue-300 laptopsm:h-[650px] tablet:h-[450px]  phone:h-[300px]">
                    <div style=" overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
                            style=" width: 100%;" class="laptopsm:h-[650px] tablet:h-[450px]  phone:h-[300px] ">
                            <path
                                d="M213.19,-0.00 C152.70,69.88 270.04,69.88 202.98,149.60 L500.00,149.60 L500.00,-0.00 Z"
                                style="stroke: none; fill: #f1f5f9;"></path>
                        </svg></div>
                    <div
                        class="img2 laptop:left-[8%] laptopsm:left-[15%] tablet:left-[15%] phone:left-[15%] laptop:top-[50%] laptopsm:top-[20%] tablet:top-[20%] phone:top-[28%] ">
                        <img src="{{ asset('img/food10.png') }}" alt=""
                            class="laptop:h-[300px] laptopsm:h-[300px] tablet:h-[200px] phone:h-[100px] phonesm:h-[50px] laptopsm:w-[350px] tablet:w-[300px] phone:w-[150px] phonesm:w-[100px] xsm:w-[80px] ">
                    </div>
                    <div
                        class="img4 laptopsm:left-[34%] tablet:left-[30%] phone:left-[30%] laptop:top-[8%] laptopsm:top-[17%] tablet:top-[15%] phone:top-[15%] laptopsm:w-[130px] laptopsm:h-[130px] laptopsm:rounded-[130px] tablet:w-[120px] tablet:h-[120px] tablet:rounded-[120px] phone:w-[70px] phone:h-[70px] phone:rounded-[70px] bg-orange-500 items-center justify-center flex laptopsm:text-3xl tablet:text-3xl phone:text-xl drop-shadow-md">
                        55% <br> Off
                    </div>
                    <div class="para laptopsm:w-[600px] tablet:w-[400px] phone:w-[200px] phonesm:w-[200px] ">
                        <div
                            class="laptopsm:top-[20%] tablet:top-[7%] phone:-top-[5%] phonesm:top-[0%] xsm:top-[0%] absolute dark:text-slate-300  laptopsm:text-[17px] tablet:text-[17px]  phone:text-[14px]">
                            <div
                                class="ps-5 tablet:ps-8 pb-5 font-bold text-orange-500 laptopsm:text-3xl tablet:text-2xl phone:text-xl drop-shadow-md">
                                Kwae Tayo</div>
                            <div
                                class="laptopsm:text-[20px] tablet:text-[17px]  phone:text-[11px] ps-9 tablet:ps-10 space-y-6 font-bold drop-shadow-md">
                                Lorem, ipsum
                                dolor
                                sit amet consectetur adipisicing elit. Assumenda a accusamus,
                                voluptate saepe illum molestiae maiores eos officia eius harum! Lorem ipsum dolor
                                sit,</div>
                        </div>
                    </div>

                    <div
                        class="flex space-x-5 but laptopsm:left-[0%] tablet:left-[20%] xsm:left-[10%] laptopsm:top-[60%] tablet:top-[60%] phone:top-[70%]">
                        <button type="submit"
                            class="laptopsm:py-4 laptopsm:px-8 tablet:py-3 tablet:px-7 xsm:px-2 xsm:py-2 text-sm font-medium text-center text-white rounded-lg bg-orange-500 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800  animate__animated animate__bounce  laptopsm:text-[17px] tablet:text-[17px]  phone:text-[14px] drop-shadow-md">Buy
                            Now
                        </button>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <!-- slide section end -->
    </div>

    <!-- End nav section -->
    <div class="  bg-slate-100 dark:bg-slate-500 ">
        <!-- About us section -->
        <!-- Dropdown menu -->
        <div id="dropdownDivider" style="z-index: 9999;"
            class="  hidden bg-slate-200 absolute top-0 right-0 divide-y divide-gray-100 rounded-lg shadow w-48 dark:bg-gray-700 dark:divide-gray-600 p-5">
            <ul class="py-2 text-sm text-blue-700 dark:text-gray-200 font-bold"
                aria-labelledby="dropdownDividerButton">
                <li>
                    <button class="px-4 py-2 flex justify-between">
                        <div onclick="toggleTheme()" id="dark-switch-icon" class="">
                            <p class="lh hidden">Change Light <i class=" fas fa-sun"></i></p>
                            <p class="dk">Change Dark <i class=" fas fa-moon"></i>
                            </p>
                        </div>
                    </button>
                </li>
                <li data-modal-target="profileedit" data-modal-toggle="profileedit">
                    <a href="#"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                </li>
                <hr>
                <li>
                    <a href="customerOrderlist.html"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Order
                        History</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logout</a>
                </li>
                <hr>
                <li>
                    <a href="cutomerActivitylog.html"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">ActivityLog</a>
                </li>
                <hr>
            </ul>
            <div class="py-2" data-modal-target="changepassword" data-modal-toggle="changepassword">
                <a href="#"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Change
                    Password
                </a>
            </div>
        </div>
        <section
            class=" bg-slate-100 dark:bg-slate-500 pt-10 rounded-lg laptopsm:h-auto laptopxsm:h-auto tablet:h-auto  phone:h-auto phonesm:h-auto phone:mt-0 laptopsm:mt-0 tablet:mt-0 text-center relative "
            id="aboutus">
            <div style="height: 150px; overflow: hidden;" class="absolute top-0 w-full "><svg viewBox="0 0 500 150"
                    preserveAspectRatio="none" style="height: 100%; width: 100%;">
                    <path d="M-29.79,197.32 C129.34,-98.91 413.77,4.44 501.80,146.15 L500.00,-0.00 L-0.00,-0.00 Z"
                        style="stroke: none; fill: #a4cafe;" id="wave-svg2"></path>
                </svg></div>
            <h1
                class=" font-bold text-orange-500 dark:text-orange-600 mb-3 ms-5 headline laptopsm:text-3xl    tablet:text-2xl xsm:text-[18px] phone:text-[18px] phonesm:text-[18px] drop-shadow-lg">
                Why Choose Our Restaurant
            </h1>
            <div class="laptopsm:pt-16 laptopsm:px-8 laptopsm:w-[800px] laptopsm:mx-auto  tablet:w-[700px] tablet:mx-auto  phone:w-[400px] phonesm:w-[350px] phone:mx-auto  phonesm:ps-10 phone:ps-10 laptopsm:text-[18px] tablet:text-[15px] xsm:text-[12px] phone:text-[12px] phonesm:text-[12px] pt-4 headline dark:text-slate-300 drop-shadow-lg"
                style="text-indent: 30px;">
                <p>{{ $setting->about_us }}
                </p>
            </div>
            <div
                class="grid grid-flow-row laptopsm:grid-cols-3 tablet:grid-cols-2 phone:grid-cols-2 laptopsm:gap-12 tablet:gap-12 phone:gap-4 laptopsm:pt-20 tablet:pt-10 phone:pt-8 phonesm:ps-10 phone:ps-3 laptopsm:w-[1300px] laptopsm:mx-auto tablet:w-[950px] tablet:mx-auto phone:w-full">
                <div
                    class="laptopsm:h-44 tablet:h-44 phone:h-32  bg-gray-100 dark:bg-slate-400 rounded-lg shadow-2xl flex items-center font-bold text-black headline pt-0 ps-1">
                    <div class="flex items-center">
                        <img src="{{ asset('storage/' . $setting->image_one) }}" alt=""
                            class="laptopsm:w-[200px] tablet:w-[200px] phone:w-[110px] laptopsm:h-40 tablet:h-40 phone:h-28  rounded-md ">
                        <div class="">
                            <div
                                class="flex items-center lg:text-xl md:text-lg sm:text-base text-orange-500 drop-shadow-lg">
                                <i class="fa-brands fa-servicestack"></i>
                                <p class=" text-left">Convenience</p>
                            </div>
                            <p
                                class="text-left ps-4 lg:text-base md:text-sm sm:text-[10px] phone:text-[10px] font-normal drop-shadow-lg">
                                {{ $setting->service_one }}
                            </p>
                        </div>
                    </div>
                </div>
                <div
                    class="laptopsm:h-44 tablet:h-44 phone:h-32  bg-gray-100 dark:bg-slate-400 rounded-lg shadow-2xl flex items-center font-bold text-black headline pt-0 ps-1">
                    <div class="flex items-center">
                        <img src="{{ asset('storage/' . $setting->image_two) }}" alt=""
                            class="laptopsm:w-[200px] tablet:w-[200px] phone:w-[110px]  laptopsm:h-40 tablet:h-40 phone:h-28  rounded-md ">
                        <div class="">
                            <div
                                class="flex items-center lg:text-xl md:text-lg sm:text-base text-orange-500 drop-shadow-lg">
                                <i class="fa-brands fa-servicestack"></i>
                                <p class=" text-left">Customization</p>
                            </div>
                            <p
                                class="text-left ps-4 lg:text-base md:text-sm sm:text-[10px] phone:text-[10px] font-normal drop-shadow-lg">
                                {{ $setting->service_two }}
                            </p>
                        </div>
                    </div>
                </div>
                <div
                    class="laptopsm:h-44 tablet:h-44 phone:h-32  bg-gray-100 dark:bg-slate-400 rounded-lg shadow-2xl flex items-center font-bold text-black headline pt-0 ps-1">
                    <div class="flex items-center">
                        <img src="{{ asset('storage/' . $setting->image_three) }}" alt=""
                            class="laptopsm:w-[200px] tablet:w-[200px] phone:w-[110px] laptopsm:h-40 tablet:h-40 phone:h-28  rounded-md ">
                        <div class="">
                            <div
                                class="flex items-center lg:text-xl md:text-lg sm:text-base text-orange-500 drop-shadow-lg">
                                <i class="fa-brands fa-servicestack"></i>
                                <p class=" text-left">Promotion</p>
                            </div>
                            <p
                                class="text-left ps-4 lg:text-base md:text-sm sm:text-[10px] phone:text-[10px] font-normal drop-shadow-lg">
                                {{ $setting->service_three }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Menu section -->
        <section
            class="bg-slate-100 dark:bg-slate-800 laptopsm:h-auto laptopxsm:h-auto tablet:h-auto phone:h-auto phonesm:h-auto xsm:h-auto phone:mt-5 laptopsm:mt-10 laptopxsm:mt-5 tablet:mt-5 mb-7"
            id="menu">
            <div class="flex mb-1 pt-10 ms-5 items-center">
                <h4 class="text-orange-500 font-medium text-2xl headline drop-shadow-md">Menu</h4>
                <div class="ms-3 mt-2 w-40  bg-slate-600 headline" style="height:2px;">

                </div>
            </div>
            <div class=" flex items-center mb-9 mt-7">
                <h1
                    class=" font-bold text-orange-500 mb-3 ms-5 headline laptopsm:text-3xl    tablet:text-2xl xsm:text-[18px] phone:text-[18px] phonesm:text-[18px] me-6 drop-shadow-md">
                    Today Special
                </h1>
                <a href="" class="text-blue-600 font-bold text-lg drop-shadow-md"
                    style="text-decoration:underline">view all
                    Menu
                </a>
            </div>
            <div
                class="grid laptopsm:grid-cols-5 tablet:grid-cols-4 phone:grid-cols-2 grid-flow-row laptopsm:ps-32 tablet:ps-8 phone:ps-8 laptopsm:gap-y-4 tablet:gap-y-2 phone:gap-y-2 mb-20">
                @forelse ($menus as $menu)
                    <div
                        class="relative laptopsm:h-64 laptopsm:w-52 tablet:h-60 tablet:w-52 phone:h-52 phone:w-40 ms-5 rounded-md overflow-hidden border bottom-1 drop-shadow-2xl pb-0 dark:shadow-none bg-white">
                        {{-- <div class="icontent">
                            <a href="{{ url('menus/' . $menu->id) }}"
                                style="width:30px;height: 30px;border-radius:30px;"
                                class="bg-slate-500 px-3 py-1 mt-1  text-white font-bold ">
                                <p>i</p>
                            </a>
                        </div> --}}
                        <img src="{{ asset('storage/' . $menu->menuImages[0]->image) }}" alt="no image"
                            class="laptopsm:w-full laptopsm:h-32 tablet:w-fuull tablet:h-32 phone:w-full phone:h-28 border-b-1  block p-2 rounded-2xl drop-shadow-lg">
                        <div
                            class="laptopsm:w-full laptopsm:h-32 tablet:w-full tablet:h-32 phone:w-full phone:h-32 bg-white dark:bg-slate-400 text-blue-600 font-semibold text-center laptopsm:pt-4 tablet:pt-3 phone:pt-2  phone:text-[13px]">
                            <h5 class="laptopsm:text-[15px] tablet:text-[15px] drop-shadow-lg">{{ $menu->name }}
                            </h5>
                            <div class="flex justify-center">
                                <p class="laptopsm:text-[15px] tablet:text-[15px] pb-5 pe-2 drop-shadow-lg">
                                    {{ $menu->price }} Ks</p>
                                {{-- <p
                                    class="laptopsm:text-[13px] tablet:text-[12px] pb-5 line-through text-black drop-shadow-lg">
                                    {{ $menu->price }} Ks</p> --}}
                            </div>
                            <div
                                class="flex justify-between items-center text-orange-500 font-bold bg-white dark:bg-slate-400 border-t-slate-300 laptopsm:w-full laptopsm:h-8 tablet:w-full tablet:h-8 phone:w-full phone:h-4 laptopsm:text-[12px] tablet:text-[12px] ">
                                <div
                                    class="bg-orange-500 text-white laptopsm:text-base tablet:text-base  phone:text-[10px] laptopsm:px-2 tablet:px-2 phone:px-1 mx-1 phone:py-1 rounded-lg drop-shadow-lg">
                                    <a href="{{ url('menus/' . $menu->id) }}" class="drop-shadow-lg">Add To Cart</a>
                                </div>
                                <div class="">
                                    <a href="{{ url('menus/' . $menu->id) }}"
                                        class=" text-orange-500 outline outline-1 outline-orange-500 me-2 rounded drop-shadow-lg"><i
                                            class="fa-regular fa-thumbs-up laptopsm:px-2 tablet:px-2 phone:px-1 laptopsm:py-2 tablet:py-2 phone:py-1 text-[15px] drop-shadow-lg"></i></a>
                                    {{-- <span
                                        class=" text-orange-500 outline outline-1 outline-orange-500 me-2 rounded drop-shadow-lg">
                                        <i
                                            class="fa-regular fa-heart laptopsm:px-2 tablet:px-2 phone:px-1 laptopsm:py-2 tablet:py-2 phone:py-1 text-[15px] drop-shadow-lg"></i>
                                    </span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </section>
        @livewire('customer.table-view', ['tables' => $tables])

        <!-- Chefs section -->
        <section
            class="h-screen bg-slate-100 dark:bg-slate-800 laptopsm:h-auto laptopxsm:h-auto tablet:h-auto phone:h-auto phonesm:h-auto xsm:h-auto phone:mt-10 laptopsm:mt-10 laptopxsm:mt-10 tablet:mt-10"
            id="chef">
            <div class="flex mb-1 pt-10 ms-5 items-center">
                <h4 class="text-orange-500 font-medium text-2xl headline drop-shadow-md">Chefs</h4>
                <div class="ms-3 mt-2 w-40  bg-slate-600 headline" style="height:2px;">

                </div>
            </div>
            <h1
                class=" font-bold text-orange-500 mb-3 ms-5 headline laptopsm:text-3xl    tablet:text-2xl xsm:text-[18px] phone:text-[18px] phonesm:text-[18px] drop-shadow-md">
                Our Professional Chefs</h1>
            <div
                class="grid grid-flow-row laptopsm:grid-cols-3 space-x-2 tablet:grid-cols-2 phone:grid-cols-2 laptopsm:gap-y-5 tablet:gap-y-4 phone:gap-y-1 laptopsm:ps-32 laptopsm:pe-10 tablet:ps-20 tablet:pe-6 phone:ps-5 phone:pe-3  laptopsm:pt-16 tablet:pt-10 phone:pt-7 laptopsm:gap-x-6 tablet:gap-x-14 phone:gap-x-2">
                @forelse ($chefs as $chef)
                    <div
                        class="laptopsm:h-72 tablet:h-52 phone:h-40 bg-white dark:bg-slate-500 rounded-lg shadow-2xl flex items-center px-3 w-[400px] font-bold text-black    headline relative">
                        <div class="laptopsm:w-[200px]">
                            <p
                                class="laptopsm:text-2xl tablet:text-xl phone:text-base mb-3 phone:mb-2 font-bold text-blue-500 drop-shadow-lg">
                                {{ $chef->name }}
                            </p>
                            <p class="lg:text-base md:text-sm sm:text-[10px] phone:text-[10px] drop-shadow-lg">
                                {{ $chef->description }}
                            </p>
                        </div>
                        <img src="{{ asset('storage/' . $chef->image) }}" alt=""
                            class="laptopsm:w-[200px] laptopsm:h-[200px] tablet:w-[150px] tablet:h-[150px] phone:w-[110px] phone:h-[110px] laptopsm:rounded-[200px]
                        tablet:rounded-[150px]
                        phone:rounded-[110px] z-40 ms-3 drop-shadow-lg">
                        <div class="">
                            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"
                                class="absolute
                    laptopsm:-top-4 laptopsm:-right-16 tablet:-top-4 tablet:-right-28 phone:-top-2 phone:-right-20 z-10 laptopsm:w-[330px] laptopsm:h-[330px] tablet:w-[400px] tablet:h-[240px] phone:w-[270px] phone:h-[180px]  drop-shadow-lg"
                                style="opacity: 0.8">
                                <path fill="#ff5a1f"
                                    d="M46.2,-69.1C56.7,-56,59.6,-38.2,61.4,-22.4C63.1,-6.6,63.7,7.1,62.4,23.1C61.2,39.1,58,57.4,47.3,69.5C36.6,81.5,18.3,87.4,2.8,83.5C-12.6,79.6,-25.3,65.9,-40,55.1C-54.6,44.3,-71.3,36.5,-77,23.8C-82.8,11.2,-77.6,-6.2,-69.9,-20.4C-62.1,-34.6,-51.6,-45.7,-39.6,-58.2C-27.5,-70.7,-13.7,-84.6,2.1,-87.5C17.9,-90.3,35.8,-82.1,46.2,-69.1Z"
                                    transform="translate(100 100)" />
                            </svg>
                        </div>
                    </div>
                @empty
                @endforelse

            </div>
        </section>
        <!-- Contact section -->
        <section
            class=" h-screen bg-slate-100 dark:bg-slate-800 laptopsmauto laptopxsm:h-auto tablet:h-auto phone:h-auto phonesm:h-auto xsm:h-auto"
            id="contact">
            <div class="flex mb-1 pt-10 ms-5 items-center">
                <h4 class="text-orange-500 font-medium text-2xl headline">Contact</h4>
                <div class="ms-3 mt-2 w-40  bg-slate-600 headline" style="height:2px;">

                </div>
            </div>
            <h1
                class="laptopsm:text-4xl    tablet:text-2xl xsm:text-[18px] phone:text-[18px] phonesm:text-[18px] font-bold text-orange-700 mb-3 ms-5 headline">
                You can contact</h1>
            <div class=" flex laptopsm:py-16 laptopsm:px-40 tablet:py-10 tablet:px-28 phone:py-6 phone:px-16">
                <div
                    class="laptopsm:space-y-10 laptopsm:pt-5 tablet:space-y-6 tablet:pt-4 phone:space-y-3 phone:pt-2 dark:text-slate-400">
                    <div class="laptopsm:space-y-3 tablet:space-y-2 phone:space-y-1">
                        <h3 class="laptopsm:text-3xl tablet:text-2xl phone:text-lg font-bold headline">Location:</h3>
                        <p class="headline laptopsm:text-base tablet:text-[15px] phone:text-[12px]">
                            {{ $setting->address }}</p>
                    </div>
                    <div class="laptopsm:space-y-3 tablet:space-y-2 phone:space-y-1">
                        <h3 class="laptopsm:text-3xl tablet:text-2xl phone:text-lg font-bold headline">Email:</h3>
                        <p class="headline laptopsm:text-base tablet:base phone:text-[12px]">{{ $setting->email }}</p>
                    </div>
                    <div class="laptopsm:space-y-3 tablet:space-y-2 phone:space-y-1">
                        <h3 class="laptopsm:text-3xl tablet:text-2xl phone:text-lg font-bold headline">Call:</h3>
                        <p class="headline laptopsm:text-base tablet:base phone:text-[12px]">{{ $setting->phone }}</p>
                    </div>
                </div>
                <div
                    class="laptopsm:me-20 laptopsm:ms-40 laptopsm:w-full tablet:me-10  tablet:ms-24 tablet:w-[600px] tabletsm:w-[500px] phone:me-5  phone:ms-12 phone:w-[300px]">
                    <form action="#" class="laptopsm:space-y-8">
                        <div
                            class="grid grid-flow-row laptopsm:grid-cols-2 tablet:grid-cols-2 tabletsm:grid-cols-1 phone:grid-cols-1 gap-3">
                            <div class="w-full">
                                <label for="username"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 headline">Your
                                    Name</label>
                                <input type="text" id="username" name="username"
                                    class="shadow-sm bg-gray-200 border border-orange-600  text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light headline laptopsm:py-3 tablet:py-3 phone:py-1"
                                    placeholder="Mg Mg" required>
                            </div>
                            <div class="w-full">
                                <label for="useremail"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 headline">Your
                                    email</label>
                                <input type="email" id="useremail" name="useremail"
                                    class="shadow-sm bg-gray-200 border border-orange-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-none block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light headline laptopsm:py-3 tablet:py-3 phone:py-1"
                                    placeholder="your@gmail.com" required>
                            </div>
                        </div>
                        <div>
                            <label for="subject"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 headline">Subject</label>
                            <input type="text" id="subject"
                                class="block p-3 w-full text-sm text-gray-900 bg-gray-200 border border-orange-600 rounded-lg shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light headline laptopsm:py-3 tablet:py-3 phone:py-1"
                                placeholder="About Title" required>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="message"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400 headline">Your
                                message</label>
                            <textarea id="message" rows="6"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 border border-orange-600  rounded-lg shadow-sm  focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 headline phone:py-0 phone:h-16 laptopsm:h-auto tablet:h-auto"
                                placeholder="comment"></textarea>
                        </div>

                        <button type="submit"
                            class="laptopsm:py-3 laptopsm:px-5 tablet:py-3 tablet:px-5 phone:py-1 phone:px-3 text-sm font-medium text-center text-white rounded-lg bg-orange-500 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800  animate__animated animate__bounce headline laptopsm:mt-auto tablet:mt-5 phone:mt-2">Send
                            message
                        </button>
                    </form>
                </div>
            </div>
        </section>
        <!-- footer section -->
        <section
            class="bg-slate-900 laptopsm:h-auto laptopxsm:h-auto tablet:h-auto phone:h-auto phonesm:h-auto xsm:h-auto pb-6">
            <div
                class="grid grid-flow-row laptopsm:grid-cols-3 tablet:grid-cols-3 phone:grid-cols-2 laptopsm:gap-5 tablet:gap-3 phone:gap-4 laptopsm:ps-24 laptopsm:py-14 laptopsm:pe-6 tablet:ps-14 tablet:py-8 tablet:pe-4 phone:ps-10 phone:py-4 phone:pe-2 ">
                <div class="laptopsm:pe-28 tablet:pe-16 phone:12">
                    <h1 class="laptopsm:text-2xl tablet:text-xl phone:text-lg text-white">Restaurantly</h1>
                    <ul
                        class="ps-1 pt-3 space-y-2 text-slate-300 opacity-75 laptopsm:text-base tablet:text-base phone:text-sm">
                        <li>{{ $setting->address }}</li>
                        {{-- <li class="laptopsm:pb-5 tablet:pb-5 phone:pb-1">NO 2924848</li> --}}
                        <li>Phone : {{ $setting->phone }}</li>
                        <li>Email : {{ $setting->email }}</li>
                    </ul>
                </div>
                <div class="laptopsm:pe-36">
                    <h1 class="laptopsm:text-2xl tablet:text-xl phone:text-lg text-white">Useful Links</h1>
                    <ul
                        class="ps-1 pt-3 text-slate-300 opacity-75 laptopsm:text-base tablet:text-base phone:text-[10px]">
                        <a href="" class="block laptopsm:pb-2 tablet:pb-2 phone:pb-1">
                            <li><span class="text-orange-500 text-lg font-bold pb-6">></span> Home</li>
                        </a>
                        <a href="" class="block laptopsm:pb-2">
                            <li><span class="text-orange-500 text-lg font-bold">></span> About us</li>
                        </a>
                        <a href="" class="block laptopsm:pb-2 tablet:pb-2 phone:pb-1">
                            <li><span class="text-orange-500 text-lg font-bold">></span> Contact us</li>
                        </a>
                        <a href="" class="block laptopsm:pb-2 tablet:pb-2 phone:pb-1">
                            <li><span class="text-orange-500 text-lg font-bold">></span> Blogs</li>
                        </a>

                    </ul>
                </div>
                <div class="lg:w-96">
                    <h1 class="laptopsm:text-2xl tablet:text-xl phone:text-lg  text-white">{{ $setting->name }}</h1>
                    <p class="laptopsm:text-base tablet:text-base phone:text-sm text-slate-300 opacity-90 indent-5">In
                        our online shopping website, you can go a shop the items you want. Our website is a secure open
                        type and everyone can visit to our website.
                    </p>
                </div>
            </div>
        </section>


        {{-- footer menu --}}
        <div
            class="mt-14 fixed z-50 w-full h-16 max-w-lg -translate-x-1/2 bg-white border border-gray-200 rounded-full bottom-4 left-1/2 dark:bg-gray-700 dark:border-gray-600 lg:hidden md:hidden sm:block">
            <div class="grid h-full max-w-lg grid-cols-5 mx-auto">
                <button data-tooltip-target="tooltip-home" type="button"
                    class="inline-flex flex-col items-center justify-center px-5 rounded-l-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <a href="#home">
                        <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
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
                    <a href="#tableside">
                        <i
                            class="fa-solid fa-t w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"></i>
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
                        <a href="#menu">
                            <i
                                class="fa-solid fa-bars w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"></i>
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
                    <div class="#chef">
                        <i
                            class="fa-solid fa-kitchen-set w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"></i>
                    </div>
                    <span class="sr-only">Chef</span>
                </button>
                <div id="tooltip-settings" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Chef
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button data-tooltip-target="tooltip-profile" type="button"
                    class="inline-flex flex-col items-center justify-center px-5 rounded-r-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <a href="#contact">
                        <i
                            class="fa-regular fa-address-book w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"></i>
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
    </div>
    @livewireScripts()
</body>
<script>
    const swiper = new Swiper('.sample-slider', {
        loop: true, //loop
        autoplay: { //autoplay
            delay: 2000,
        },
        pagination: { //pagination(dots)
            el: '.swiper-pagination',
        },
        navigation: { //navigation(arrow)
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    })
</script>

<!-- Initialize Swiper -->
<script>
    let all = document.querySelector(".allclick");
    let bf = document.querySelector(".breakfastclick");
    let lunch = document.querySelector(".lunchclick");
    let dinner = document.querySelector(".dinnerclick");
    let a = document.querySelector("#all");
    let b = document.querySelector("#breakfast");
    let l = document.querySelector("#lunch");
    let d = document.querySelector("#dinner");

    all.addEventListener('click', function() {
        b.style.display = "none";
        l.style.display = "none";
        d.style.display = "none";
        a.style.display = "grid";
    })
    bf.addEventListener('click', function() {
        a.style.display = "none";
        l.style.display = "none";
        d.style.display = "none";
        b.style.display = "grid";
    })
    lunch.addEventListener('click', function() {
        b.style.display = "none";
        l.style.display = "none";
        a.style.display = "none";
        l.style.display = "grid";
    })
    dinner.addEventListener('click', function() {
        a.style.display = "none";
        l.style.display = "none";
        a.style.display = "none";
        d.style.display = "grid";
    })
</script>
<script src="{{ asset('js/customer/customerdarkmode.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/noframework.waypoints.min.js"
    integrity="sha512-fHXRw0CXruAoINU11+hgqYvY/PcsOWzmj0QmcSOtjlJcqITbPyypc8cYpidjPurWpCnlB8VKfRwx6PIpASCUkQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/scrollreveal"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
<script src="{{ asset('js/customer/main.js') }}"></script>
<script src="{{ asset('js/customer/slide.js') }}"></script>


</html>
