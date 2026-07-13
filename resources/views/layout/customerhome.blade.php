<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('layout.need-style-link')
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

        .home {
            z-index: 0;
            position: relative;
        }

        /* .home::before {
            content: "";
            width: 100%;
            height: 100%;
            background-color: lightgray;
            position: absolute;
            opacity: 0.5;
            z-index: -1;
        } */

        .res_obj {
            backdrop-filter: blur(5px);
            z-index: 2;
        }
    </style>
    @livewireStyles()
</head>

<body>
    @if (Session::has('success'))
        <script>
            swal("Message", "{{ Session::get('success') }}", 'success', {
                button: true,
                button: "OK",
            });
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            swal("Message", "{{ Session::get('error') }}", 'error', {
                button: true,
                button: "OK",
            });
        </script>
    @endif
    {{-- navbar --}}
    @include('layout.nav-bar')


    <!-- nav end -->
    <div
        class=" bg-blue-300 dark:bg-slate-700 laptopsm:h-screen laptopxsm:h-[800px] tablet:h-[500px] phone:h-[400px] phonesm:h-[350px] xsm:h-[300px] relative m-0 drop-shadow-md">

        {{-- home page --}}
        <section id="home">
            <div class=" shadow-2xl ">
                <div class="grid grid-flow-row grid-cols-12 z-20 home laptopsm:h-screen laptopxsm:h-[650px] laptomxsm:h-[550px] tablet:h-[450px]  phone:h-[350px]"
                    style="background-image:url('{{ asset('img/home.jpg') }}'); background-size: cover;">
                    <div class="col-span-12 z-30  mx-auto r">
                        <div
                            class=" top-20 shadow-inner  z-10 laptopsm:me-1  tablet:me-6 phone:me-4 laptopsm:w-[1000px] tablet:w-[800px] phone:w-[350px] res_obj laptosm:p-5 tablet:p-5 phone:p-2 text-slate-50 laptopsm:mt-24 tablet:mt-20 phone:mt-12 laptopsm:h-[400px] tablet:h-[300px] phone:h-[210px] laptopsm:text-lg tablet:text-base phone:text-[10px] drop-shadow-md flex justify-between">
                            <div
                                class=" laptopsm:ms-48 logo_name laptopsm:text-[50px] tablet:text-[35px] phone:text-[22px] text-orange-500 font-extrabold  laptopsm:mt-5 tablet:mt-4 phone:mt-2  tablet:ms-32 phone:ms-20 me-8 drop-shadow-md dark:text-slate-600">
                                HUNGRY HAVEN
                                <p
                                    class="laptopsm:pt-20 tablet:pt-16 phone:pt-5 italic laptopsm:text-3xl tablet:text-2xl phone:text-base text-white font-bold laptopsm:-ms-2 tablet:-ms-2 phone:-ms-2 drop-shadow-md">
                                    The
                                    Best Tasting Experience!</p>
                                <p
                                    class="text-white laptopsm:text-sm tablet:text-sm phone:text-[10px] font-normal pt-3 drop-shadow-md laptopsm:-ms-10 tablet:-ms-6 phone:-ms-6">
                                    You can order everything you
                                    want that our chef can make for you</p>
                                <div
                                    class="flex space-x-5 but laptopsm:left-[30%] tablet:left-[20%] phone:left-[2%] laptopsm:top-[80%] tablet:top-[75%]   phone:top-[75%] absolute laptopsm:-me-32 tablet:-me-28 phone:-me-20">
                                    <a href="/menus"
                                        class="laptopsm:py-4 laptopsm:px-8 tablet:py-3 tablet:px-7 xsm:px-2 xsm:py-2 text-sm font-medium text-center text-white rounded-lg bg-orange-500 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800  animate__animated animate__bounce  laptopsm:text-[17px] tablet:text-[17px]  phone:text-[14px] drop-shadow-md dark:bg-slate-800 dark:text-blue-400">Get
                                        All Menu
                                    </a>
                                    <a href="#tableside"
                                        class="laptopsm:py-4 laptopsm:px-8 tablet:py-3 tablet:px-7 xsm:px-2 xsm:py-2 text-sm font-medium text-center text-white rounded-lg bg-orange-500 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800  animate__animated animate__bounce  laptopsm:text-[17px] tablet:text-[17px]  phone:text-[14px] drop-shadow-md dark:bg-slate-800 dark:text-blue-400">Book
                                        Table
                                    </a>
                                </div>
                            </div>
                            {{-- <p
                                class="laptopsm:w-[400px] tablet:w-[400px] phone:w-[200px] pe-0 laptopsm:text-[19px] tablet:text-[17px] phone:text-[10px] pp laptopsm:flex tablet:flex phone:hidden">
                                Our mission is to make your journey from booking a table to savouring your favourite
                                dishes
                                as effortless as can be...<br>
                                No more waiting on hold or standing in line-it's all at your fingertips...
                                <br>
                                Say bye to long waiting time...
                            </p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- end home page --}}

    </div>

    <!-- End nav section -->
    <div class="  bg-slate-100 dark:bg-slate-600 z-10">
        <!-- About us section -->
        <section
            class=" bg-slate-100 dark:bg-slate-600 pt-10 rounded-lg laptopsm:h-auto laptopxsm:h-auto tablet:h-auto  phone:h-auto phonesm:h-auto phone:mt-0 laptopsm:mt-0 tablet:mt-0 text-center relative pb-32"
            id="aboutus">
            <div style="height: 150px; overflow: hidden;" class="absolute top-0 w-full "><svg viewBox="0 0 500 150"
                    preserveAspectRatio="none" style="height: 100%; width: 100%;">
                    <path d="M-29.79,197.32 C129.34,-98.91 413.77,4.44 501.80,146.15 L500.00,-0.00 L-0.00,-0.00 Z"
                        style="stroke: none; fill:#c9ced2;" id="wave-svg2"></path>
                </svg></div>
            <h1
                class=" font-bold text-orange-500 dark:text-blue-400 mb-3 ms-5 headline laptopsm:text-3xl tablet:text-2xl xsm:text-[18px] phone:text-[18px] phonesm:text-[18px] drop-shadow-lg">
                Facilities Our System Provides
            </h1>
            <div class="laptopsm:pt-12 laptopsm:px-8 laptopsm:w-[700px] laptopsm:mx-auto  tablet:w-[700px] tablet:mx-auto  phone:w-[400px] phonesm:w-[350px] phone:mx-auto  phonesm:ps-10 phone:ps-10 laptopsm:text-[18px] tablet:text-[15px] xsm:text-[12px] phone:text-[12px] phonesm:text-[12px] pt-4 headline dark:text-blue-300"
                style="text-indent:20px;">
                <p class=" drop-shadow-2xl font-bold" style="text-align: center">{{ $setting->about_us }}
                </p>
            </div>
            <div
                class="grid grid-flow-row laptopsm:grid-cols-3 tablet:grid-cols-2 phone:grid-cols-2 laptopsm:gap-12 tablet:gap-12 phone:gap-4 laptopsm:pt-20 tablet:pt-10 phone:pt-8 phonesm:ps-10 phone:ps-3 laptopsm:w-[1100px] laptopsm:mx-auto tablet:w-[800px] tablet:mx-auto phone:w-full">
                <div
                    class="laptopsm:h-44 tablet:h-44 phone:h-32  bg-gray-100 dark:bg-slate-400 rounded-lg shadow-2xl shadow-blue-200 dark:shadow-none flex items-center font-bold text-black headline pt-0 ps-1">
                    <div class="flex items-center w-full outline outline-1 outline-slate-100 drop-shadow-lg ">
                        <img src="{{ asset('storage/' . $setting->image_one) }}" alt=""
                            class=" laptopsm:h-44 tablet:h-44 phone:h-32  rounded-md w-[100%] drop-shadow-lg">
                    </div>
                </div>
                <div
                    class="laptopsm:h-44 tablet:h-44 phone:h-32  bg-gray-100 dark:bg-slate-400 rounded-lg shadow-2xl shadow-blue-200 dark:shadow-none flex items-center font-bold text-black headline pt-0 ps-1">
                    <div class="flex items-center w-full outline outline-1 outline-slate-100 drop-shadow-lg ">
                        <img src="{{ asset('storage/' . $setting->image_two) }}" alt=""
                            class=" laptopsm:h-44 tablet:h-44 phone:h-32  rounded-md w-[100%] drop-shadow-lg ">
                    </div>
                </div>
                <div
                    class="laptopsm:h-44 tablet:h-44 phone:h-32  bg-gray-100 dark:bg-slate-400 rounded-lg shadow-2xl shadow-blue-200 dark:shadow-none flex items-center font-bold text-black headline pt-0 ps-1  phone:hidden laptopsm:flex tablet:hidden">
                    <div class="flex items-center w-full outline outline-1 outline-slate-100 drop-shadow-lg ">
                        <img src="{{ asset('storage/' . $setting->image_three) }}" alt=""
                            class=" laptopsm:h-44 tablet:h-44 phone:h-32  rounded-md w-[100%] drop-shadow-lg ">
                    </div>
                </div>
            </div>
        </section>

        <!-- slide section -->

        <section class="p-5">
            <div
                class="swiper sample-slider relative bg-blue-300 dark:bg-slate-700 laptopsm:h-[650px] laptopxsm:h-[650px] tablet:h-[450px]  phone:h-[300px] phonesm:h-[250px] z-10">
                <div class="swiper-wrapper">
                    @forelse($slides as $slide)
                        <div
                            class="swiper-slide bg-blue-300 dark:bg-slate-600 laptopsm:h-[650px] tablet:h-[450px]  phone:h-[300px] dark:border-2 dark:border-slate-500">
                            <div style=" overflow: hidden;">
                                <svg viewBox="0 0 500 150" preserveAspectRatio="none" style=" width: 100%;"
                                    class=" laptopsm:h-[650px] tablet:h-[450px]  phone:h-[300px]">
                                    <path
                                        d="M213.19,-0.00 C152.70,69.88 270.04,69.88 202.98,149.60 L500.00,149.60 L500.00,-0.00 Z"
                                        style="stroke: none; fill: #f1f5f9;" id="wave"></path>
                                </svg>
                            </div>
                            <div
                                class="img2 laptop:left-[8%] laptopsm:left-[15%] tablet:left-[15%] phone:left-[15%] laptop:top-[50%] laptopsm:top-[20%] tablet:top-[20%] phone:top-[28%] ">
                                <img src="{{ asset('storage/' . $slide->image) }}" alt=""
                                    class="laptop:h-[300px] laptopsm:h-[300px] tablet:h-[200px] phone:h-[100px] phonesm:h-[50px] laptopsm:w-[350px] tablet:w-[300px] phone:w-[150px] phonesm:w-[100px] xsm:w-[80px] rounded-2xl">
                            </div>
                            <div
                                class="img4 laptopsm:left-[34%] tablet:left-[30%] phone:left-[30%] laptop:top-[8%] laptopsm:top-[17%] tablet:top-[15%] phone:top-[15%] laptopsm:w-[130px] laptopsm:h-[130px] laptopsm:rounded-[130px] tablet:w-[120px] tablet:h-[120px] tablet:rounded-[120px] phone:w-[70px] phone:h-[70px] phone:rounded-[70px] bg-orange-500  dark:bg-blue-400 items-center justify-center flex laptopsm:text-3xl tablet:text-3xl phone:text-xl drop-shadow-md">
                                {{ $slide->discount }}% <br> Off
                            </div>
                            <div class="para laptopsm:w-[600px] tablet:w-[400px] phone:w-[200px] phonesm:w-[200px] ">
                                <div
                                    class="laptopsm:top-[20%] tablet:top-[7%] phone:-top-[5%] phonesm:top-[0%] xsm:top-[0%] absolute dark:text-slate-300  laptopsm:text-[17px] tablet:text-[17px]  phone:text-[14px]">
                                    <div
                                        class="ps-5 tablet:ps-8 pb-5 font-bold text-orange-500 laptopsm:text-3xl tablet:text-2xl phone:text-xl drop-shadow-md dark:text-blue-400">
                                        {{ $slide->menu->name }}</div>
                                    <div
                                        class="laptopsm:text-[20px] tablet:text-[17px]  phone:text-[11px] ps-9 tablet:ps-10 space-y-6 font-bold drop-shadow-md text-justify dark:text-blue-300">
                                        {{ $slide->description }}</div>
                                </div>
                            </div>

                            <div
                                class="flex space-x-5 but laptopsm:left-[0%] tablet:left-[20%] xsm:left-[10%] laptopsm:top-[60%] tablet:top-[60%] phone:top-[70%]">
                                <a href="{{ url('menus/' . $slide->menu_id) }}"
                                    class="laptopsm:py-4 laptopsm:px-8 tablet:py-3 tablet:px-7 xsm:px-2 xsm:py-2 text-sm font-medium text-center text-white dark:text-blue-400 rounded-lg dark:bg-slate-600 bg-orange-500 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800  animate__animated animate__bounce  laptopsm:text-[17px] tablet:text-[17px]  phone:text-[14px] drop-shadow-md">Buy
                                    Now
                                </a>
                            </div>
                        </div>
                    @empty
                        <h3>There is no data foud</h3>
                    @endforelse

                    {{-- <div class="swiper-slide bg-blue-300 laptopsm:h-[650px] tablet:h-[450px]  phone:h-[300px]">
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
                                    Frice Rice</div>
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
                                    Frice Rice</div>
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
                    </div> --}}
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </section>
        <!-- slide section end -->
        <!-- Menu section -->
        <section
            class="bg-slate-100 dark:bg-slate-600 laptopsm:h-auto laptopxsm:h-auto tablet:h-auto phone:h-auto phonesm:h-auto xsm:h-auto phone:mt-5 laptopsm:mt-10 laptopxsm:mt-5 tablet:mt-5 mb-7"
            id="menu">
            <div class="flex mb-1 pt-10 ms-5 items-center">
                <h4 class="text-orange-500 font-medium text-2xl headline drop-shadow-md dark:text-blue-400">Menu</h4>
                <div class="ms-3 mt-2 w-40  bg-slate-600 dark:bg-slate-800 headline" style="height:2px;">

                </div>
            </div>
            <div class=" flex items-center mb-9 mt-7">
                <h1
                    class=" font-bold text-orange-500 mb-3 ms-5 headline laptopsm:text-3xl    tablet:text-2xl xsm:text-[18px] phone:text-[18px] phonesm:text-[18px] me-6 drop-shadow-md dark:text-blue-400">
                    Today Special
                </h1>

            </div>
            <div
                class="grid laptopsm:grid-cols-5 tablet:grid-cols-4 phone:grid-cols-2 grid-flow-row laptopsm:ps-32 tablet:ps-8 phone:ps-8 laptopsm:gap-y-4 tablet:gap-y-2 phone:gap-y-2 mb-20">
                @forelse ($menus as $menu)
                    <div
                        class="relative laptopsm:h-64 laptopsm:w-52 tablet:h-60 tablet:w-52 phone:h-52 phone:w-40 ms-5 rounded-md overflow-hidden border bottom-1 drop-shadow-2xl pb-0 dark:shadow-none bg-white dark:bg-blue-100">
                        <div
                            class="absolute bg-white dark:bg-blue-100 z-50 right-0 flex items-center px-2 py-1 rounded-md">
                            <i class="fa-solid fa-eye pe-2 text-orange-500 drop-shadow-md"></i>
                            <p class="font-bold drop-shadow-md">{{ $menu->count }}</p>
                        </div>
                        <img src="{{ asset('storage/' . $menu->menuImages[0]->image) }}" alt="no image"
                            class="laptopsm:w-full laptopsm:h-32 tablet:w-fuull tablet:h-32 phone:w-full phone:h-28 border-b-1  block p-2 rounded-2xl drop-shadow-lg">
                        <div
                            class="laptopsm:w-full laptopsm:h-32 tablet:w-full tablet:h-32 phone:w-full phone:h-32 bg-white dark:bg-slate-400 text-blue-600 dark:text-black font-semibold text-center laptopsm:pt-4 tablet:pt-3 phone:pt-2  phone:text-[13px]">
                            <h5 class="laptopsm:text-[15px] tablet:text-[15px] drop-shadow-lg">{{ $menu->name }}
                            </h5>
                            <div class="flex justify-center">
                                <p
                                    class="laptopsm:text-[15px] tablet:text-[15px] pb-5 pe-2 drop-shadow-lg dark:text-black">
                                    {{ $menu->price }} Ks</p>
                                {{-- <p
                                    class="laptopsm:text-[13px] tablet:text-[12px] pb-5 line-through text-black drop-shadow-lg">
                                    {{ $menu->price }} Ks</p> --}}
                            </div>
                            <div
                                class="flex justify-between items-center text-orange-500 font-bold bg-white dark:bg-slate-400 border-t-slate-300 laptopsm:w-full laptopsm:h-8 tablet:w-full tablet:h-8 phone:w-full phone:h-4 laptopsm:text-[12px] tablet:text-[12px] ">
                                <div
                                    class="bg-orange-500 text-white laptopsm:text-base tablet:text-base  phone:text-[10px] laptopsm:px-2 tablet:px-2 phone:px-1 mx-1 phone:py-1 rounded-lg drop-shadow-lg dark:bg-slate-700">
                                    <a href="{{ url('menus/' . $menu->id) }}"
                                        class="drop-shadow-lg dark:text-blue-400">Add To Cart</a>
                                </div>
                                <div class="">
                                    <span
                                        class=" text-orange-500 outline outline-1 p-2 hover:bg-orange-500 hover:text-white outline-orange-500 dark:text-slate-500 dark:outline-slate-300 dark:hover:bg-slate-700 dark:hover:text-white me-2 rounded drop-shadow-lg">
                                        <a href="{{ url('menus/' . $menu->id) }}">{{ $menu->likeCount }} Likes</a>
                                    </span>
                                    {{-- <span
                                        class=" text-orange-500 outline outline-1 outline-orange-500 dark:outline-none me-2 rounded drop-shadow-lg"><i
                                            class="fa-regular fa-thumbs-up laptopsm:px-2 tablet:px-2 phone:px-1 laptopsm:py-2 tablet:py-2 phone:py-1 text-[15px] drop-shadow-lg dark:text-blue-400 dark:bg-slate-700"></i></span>
                                    <span
                                        class=" text-orange-500 outline outline-1 outline-orange-500 dark:outline-none me-2 rounded drop-shadow-lg">
                                        <i
                                            class="fa-regular fa-heart laptopsm:px-2 tablet:px-2 phone:px-1 laptopsm:py-2 tablet:py-2 phone:py-1 text-[15px] drop-shadow-lg dark:text-blue-400 dark:bg-slate-700"></i>
                                    </span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h1>No Menu yet</h1>
                @endforelse
            </div>
        </section>
        @livewire('customer.table-view', ['tables' => $tables])

        <!-- Chefs section -->
        <section
            class="h-screen bg-slate-100 dark:bg-slate-600 laptopsm:h-auto laptopxsm:h-auto tablet:h-auto phone:h-auto phonesm:h-auto xsm:h-auto phone:mt-10 laptopsm:mt-10 laptopxsm:mt-10 tablet:mt-10"
            id="chef">
            <div class="flex mb-1 pt-10 ms-5 items-center">
                <h4 class="text-orange-500 font-medium text-2xl headline drop-shadow-md dark:text-blue-400">Chefs</h4>
                <div class="ms-3 mt-2 w-40  bg-slate-600 dark:bg-slate-800 headline" style="height:2px;">

                </div>
            </div>
            <h1
                class=" font-bold text-orange-500 mb-3 ms-5 headline laptopsm:text-3xl    tablet:text-2xl xsm:text-[18px] phone:text-[18px] phonesm:text-[18px] drop-shadow-md dark:text-blue-400">
                Our Professional Chefs</h1>
            <div
                class="grid grid-flow-row laptopsm:grid-cols-3 tablet:grid-cols-2 phone:grid-cols-2 laptopsm:gap-y-5 tablet:gap-y-4 phone:gap-y-1 laptopsm:ps-32 laptopsm:pe-10 tablet:ps-20 tablet:pe-6 phone:ps-5 phone:pe-3  laptopsm:pt-16 tablet:pt-10 phone:pt-7 laptopsm:gap-x-6 tablet:gap-x-14 phone:gap-x-2">
                @php
                    $count = 2;
                @endphp
                @forelse ($chefs as $chef)
                    <div
                        class="laptopsm:h-72 tablet:h-52 phone:h-40 bg-white dark:bg-slate-500 rounded-lg shadow-2xl flex items-center px-3 laptopsm:w-[400px] tablet:w-[300px] phone:w-[200px] font-bold text-black    headline relative">
                        <div class="laptopsm:w-[200px]">
                            <p
                                class="laptopsm:text-2xl tablet:text-xl phone:text-base mb-3 phone:mb-2 font-bold text-blue-500 dark:text-slate-800 drop-shadow-lg">
                                {{ $chef->name }}
                            </p>
                            <p class="lg:text-base md:text-sm sm:text-[10px] phone:text-[10px] drop-shadow-lg">
                                {{ $chef->description }}
                            </p>
                        </div>
                        <img src="{{ asset('storage/' . $chef->image) }}" alt=""
                            class="laptopsm:w-[200px] laptopsm:h-[200px] tablet:w-[150px] tablet:h-[150px] phone:w-[110px] phone:h-[110px] laptopsm:rounded-[200px]
                        tablet:rounded-[150px]
                        phone:rounded-[110px] z-40 ms-3 drop-shadow-lg ">
                        <div class="">
                            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"
                                class="absolute
                    laptopsm:-top-4 laptopsm:-right-16 tablet:-top-4 tablet:-right-28 phone:-top-2 phone:-right-20 z-10 laptopsm:w-[330px] laptopsm:h-[330px] tablet:w-[400px] tablet:h-[240px] phone:w-[270px] phone:h-[180px]  drop-shadow-lg"
                                style="opacity: 0.8">
                                <path fill="#94a3b8"
                                    d="M46.2,-69.1C56.7,-56,59.6,-38.2,61.4,-22.4C63.1,-6.6,63.7,7.1,62.4,23.1C61.2,39.1,58,57.4,47.3,69.5C36.6,81.5,18.3,87.4,2.8,83.5C-12.6,79.6,-25.3,65.9,-40,55.1C-54.6,44.3,-71.3,36.5,-77,23.8C-82.8,11.2,-77.6,-6.2,-69.9,-20.4C-62.1,-34.6,-51.6,-45.7,-39.6,-58.2C-27.5,-70.7,-13.7,-84.6,2.1,-87.5C17.9,-90.3,35.8,-82.1,46.2,-69.1Z"
                                    transform="translate(100 100)" class="wave2" />
                            </svg>
                        </div>
                    </div>
                    @php
                        $count++;
                    @endphp
                @empty
                @endforelse

            </div>
        </section>
        <!-- Contact section -->
        <section
            class=" h-screen bg-slate-100 dark:bg-slate-600 laptopsmauto laptopxsm:h-auto tablet:h-auto phone:h-auto phonesm:h-auto xsm:h-auto"
            id="contact">
            <div class="flex mb-1 pt-10 ms-5 items-center">
                <h4 class="text-orange-500 font-medium text-2xl headline dark:text-blue-400">Contact</h4>
                <div class="ms-3 mt-2 w-40  bg-slate-600 dark:bg-slate-800 headline" style="height:2px;">

                </div>
            </div>
            <h1
                class="laptopsm:text-4xl    tablet:text-2xl xsm:text-[18px] phone:text-[18px] phonesm:text-[18px] font-bold text-orange-700 mb-3 ms-5 headline dark:text-blue-400">
                You can contact</h1>
            <div class=" flex laptopsm:py-16 laptopsm:px-40 tablet:py-10 tablet:px-28 phone:py-6 phone:px-16">
                <div
                    class="laptopsm:space-y-10 laptopsm:pt-5 phone:hidden tabletsm:hidden tablet:block laptopssm:block tablet:space-y-6 tablet:pt-4 phone:space-y-3 phone:pt-2 dark:text-slate-400">
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
                    <form action="{{ url('send-email') }}" method="POST" class="laptopsm:space-y-8">
                        @csrf
                        <div
                            class="grid grid-flow-row laptopsm:grid-cols-2 tablet:grid-cols-2 tabletsm:grid-cols-1 phone:grid-cols-1 gap-3">
                            <div class="w-full">
                                <label for="username"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 headline">Your
                                    Name</label>
                                <input type="text" id="username" name="name"
                                    class="shadow-sm bg-gray-200 border border-orange-600  text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light headline laptopsm:py-3 tablet:py-3 phone:py-1"
                                    placeholder="Mg Mg">
                                @error('name')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="useremail"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 headline">Your
                                    email</label>
                                <input type="email" id="useremail" name="email"
                                    class="shadow-sm bg-gray-200 border border-orange-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-none block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light headline laptopsm:py-3 tablet:py-3 phone:py-1"
                                    placeholder="youremail@gmail.com">
                                @error('email')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="subject"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 headline">Subject</label>
                            <input type="text" id="subject" name="title"
                                class="block p-3 w-full text-sm text-gray-900 bg-gray-200 border border-orange-600 rounded-lg shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light headline laptopsm:py-3 tablet:py-3 phone:py-1"
                                placeholder="About Title">
                            @error('title')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="message"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400 headline">Your
                                message</label>
                            <textarea id="message" rows="6" name="message"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 border border-orange-600  rounded-lg shadow-sm  focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 headline phone:py-0 phone:h-16 laptopsm:h-auto tablet:h-auto"
                                placeholder="Your opnion/ feedback"></textarea>
                            @error('message')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                            class="laptopsm:py-3 laptopsm:px-5 tablet:py-3 tablet:px-5 phone:py-1 phone:px-3 text-sm font-medium text-center text-white rounded-lg bg-orange-500 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800  animate__animated animate__bounce headline laptopsm:mt-auto tablet:mt-5 phone:mt-2 dark:bg-slate-800 dark:text-blue-400">Send
                            message
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" crossorigin="anonymous"
            referrerpolicy="no-referrer"></script>
        @if (Session::has('success'))
            <script>
                swal("Message", "{{ Session::get('success') }}", 'success', {
                    button: true,
                    button: "OK",
                });
            </script>
        @endif

        @if (Session::has('error'))
            <script>
                swal("Message", "{{ Session::get('error') }}", 'error', {
                    button: true,
                    button: "OK",
                });
            </script>
        @endif
        {{-- @livewire('customer.change-password') --}}

        {{-- footer menu --}}
        @include('layout.footer')
    </div>
    @livewireScripts()
    @include('layout.need-js-link')
</body>


</html>
