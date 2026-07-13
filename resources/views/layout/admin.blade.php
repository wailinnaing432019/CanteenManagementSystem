<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/build.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    @livewireStyles
    <style>
        .active-link {
            color: green;
        }

        #sidebar-multi-level-sidebar::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        #sidebar-multi-level-sidebar::-webkit-scrollbar-track {
            background: #c4b5fd;
        }

        /* Handle */
        #sidebar-multi-level-sidebar::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 5px;
        }

        /* Handle on hover */
        #sidebar-multi-level-sidebar::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .logo {
            position: relative;
        }

        .logo h3 {
            position: absolute;
            font-size: 2em;
        }

        .logo h3:nth-child(1) {
            color: transparent;
            -webkit-text-stroke: 3px rgb(244, 102, 26);
        }

        .logo h3:nth-child(2) {
            color: yellow;
            animation: animate 8s ease-in-out infinite;
        }

        @keyframes animate {

            0%,
            100% {
                clip-path: polygon(0 63%, 16% 42%, 30% 47%, 39% 51%, 52% 54%, 64% 54%, 75% 54%, 100% 63%, 100% 100%, 0% 98%, 99% 98%, 99% 98%, 100% 98%, 0 100%);
            }

            50% {
                clip-path: polygon(0 71%, 8% 67%, 17% 64%, 36% 57%, 52% 54%, 63% 50%, 79% 45%, 100% 42%, 100% 100%, 0% 98%, 99% 98%, 99% 98%, 100% 98%, 0 100%);
            }
        }

        .loader {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: inline-block;
            position: relative;
            background: linear-gradient(0deg, rgba(255, 61, 0, 0.2) 33%, #ff3d00 100%);
            box-sizing: border-box;
            animation: rotation 1s linear infinite;
        }

        .link_active {
            background-color: #c4b5fd;
            border-radius: 10px 10px;
        }

        .loader::after {
            content: '';
            box-sizing: border-box;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #263238;
        }

        @keyframes rotation {
            0% {
                transform: rotate(0deg)
            }

            100% {
                transform: rotate(360deg)
            }
        }

        * {
            font-family: 'Lobster', cursive;
            font-family: 'Quicksand', sans-serif;
        }

        input:checked~.dot {
            transform: translateX(100%);
            background-color: #ef8009;
        }

        .show-sidebar .sidebar {
            left: 0;
        }

        .logo {
            position: relative;
        }

        .logo h3 {
            position: absolute;
            font-size: 2em;
        }

        .logo h3:nth-child(1) {
            color: transparent;
            -webkit-text-stroke: 3px rgb(244, 102, 26);
        }

        .logo h3:nth-child(2) {
            color: yellow;
            animation: animate 8s ease-in-out infinite;
        }

        @keyframes animate {

            0%,
            100% {
                clip-path: polygon(0 63%, 16% 42%, 30% 47%, 39% 51%, 52% 54%, 64% 54%, 75% 54%, 100% 63%, 100% 100%, 0% 98%, 99% 98%, 99% 98%, 100% 98%, 0 100%);
            }

            50% {
                clip-path: polygon(0 71%, 8% 67%, 17% 64%, 36% 57%, 52% 54%, 63% 50%, 79% 45%, 100% 42%, 100% 100%, 0% 98%, 99% 98%, 99% 98%, 100% 98%, 0 100%);
            }
        }
    </style>

</head>


<body class="dark:bg-slate-600">
    <!-- loading -->
    <div class="loading w-full h-full fixed top-0 left-0 bg-white z-50 flex justify-center items-center">
        <span class="loader"></span>
    </div>

    <!-- navbar -->
    <section class="grid grid-flow-row">

        <div
            class=" no-print bg-violet-300 duration-200 animate__animated navbar dark:bg-slate-700 z-30  fixed w-full grid grid-cols-6 dark:text-slate-200 border-2 border-violet-300">

            <div
                class=" phone:hidden laptopsm:block tablet:block tablet:col-span-1 laptopsm:col-span-1 laptopxsm:col-span-1 tablet:text-sm laptopsm:text-md phone:col-span-0">
                <img src="{{ asset('storage/' . $setting->logo_image) }}" alt=""
                    class="laptopsm:w-[230px] laptopsm:h-[82px] laptopxsm:w-[180px] laptopxsm:h-[82px] laptopssm:w-[120px] laptopssm:h-[82px] tablet:w-[100px] tablet:h-[82px] tabletsm:w-[150px] tabletsm:h-[82px] phone:w-[150px] phone:h-[82px]">
            </div>
            <div
                class="col-span-5 flex justify-between container mx-auto md:px-5 lg:px-10 items-center dark:bg-slate-700">
                <div class="">
                    <h1 class="text-orange-500 dark:text-white text-2xl">Admin Dashboard</h1>
                    <span class="ml-5">
                        @if ($currentTime->hour >= 0 && $currentTime->hour < 12)
                            Good Morning
                        @elseif($currentTime->hour >= 12 && $currentTime->hour < 16)
                            Good Afternoon
                        @elseif($currentTime->hour >= 16 && $currentTime->hour < 19)
                            Good Evening
                        @else
                            Good Night
                        @endif
                        , {{ auth()->guard('staff')->user()->name }}
                    </span>
                </div>
                <div class="flex justify-center items-center scale-50 md:scale-100">
                    <div class="flex items-center justify-center w-full py-4">
                        <a href="#"
                            class="mt-0 dark:text-white md:dark:hover:text-orange-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent text-blue-700">
                            <div id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider"
                                class="flex justify-center items-center pt-0">
                                <div style="width:50px;height: 50px;border-radius: 50px;"
                                    class=" bg-slate-300 overflow-hidden me-1">
                                    <img src="{{ asset('storage/' .auth()->guard('staff')->user()->image) }}"
                                        alt="No Image" class="w-full h-full">
                                </div>
                                {{ auth()->guard('staff')->user()->name }}
                            </div>
                            <!-- Dropdown menu -->
                            <div id="dropdownDivider"
                                class="z-10 hidden bg-slate-200  divide-y divide-gray-100 rounded-lg shadow w-48 dark:bg-gray-700 dark:divide-gray-600 ">
                                <ul class="py-2 text-sm text-blue-700 dark:text-gray-200 font-bold"
                                    aria-labelledby="dropdownDividerButton">
                                    <li>
                                        <button class="px-4 py-2 flex justify-between">
                                            <div onclick="toggleTheme()" id="dark-switch-icon" class="">
                                                <p class="lh hidden bg-transparent">Change Light <i
                                                        class=" fas fa-sun"></i>
                                                </p>
                                                <p class="dk">Change Dark <i class=" fas fa-moon"></i>
                                                </p>
                                            </div>

                                        </button>
                                    </li>
                                    <li data-modal-show="profileedit" data-modal-toggle="profileedit">
                                        <a
                                            class="block w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>

                                    </li>
                                    <hr>
                                    <li>
                                        <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                            href="{{ route('staff.logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('staff.logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                    <hr>
                                </ul>
                                <div data-modal-show="changePassword" data-modal-toggle="changePassword" class="py-2">
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Change
                                        Password
                                    </a>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
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
    </section>

    <!-- body section -->
    <section class="">
        <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar"
            aria-controls="sidebar-multi-level-sidebar" type="button"
            class="no-print inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg   hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6 mt-20" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                </path>
            </svg>
        </button>

        <aside id="sidebar-multi-level-sidebar"
            class="no-print overflow-scroll  fixed mt-20 -left-80 z-50 w-60  h-screen transition-transform -translate-x-full  laptopsm:translate-x-0  sidebar "
            aria-label="Sidebar">
            <div class="h-[120%] px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-700">
                <ul class="space-y-2 font-medium">
                    <li class="{{ Request::is('admin/dashboard') ? 'link_active' : '' }}">
                        <a href="{{ url('admin/dashboard') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 22 21">
                                <path
                                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path
                                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                            <span class="ml-3 text-orange-500 dark:text-white font-bold">Dashboard</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/employees') ? 'link_active' : '' }}">
                        <button type="button"
                            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="employee" data-collapse-toggle="employee">

                            <i
                                class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white fa-solid fa-person-walking"></i>
                            <span
                                class="flex-1 ml-3 text-left whitespace-nowrap text-orange-500 dark:text-white font-bold">Employee</span>
                            <svg class="w-3 h-3 text-orange-500 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />

                            </svg>
                        </button>
                        <ul id="employee" class="hidden py-2 space-y-2">
                            <li>
                                <a href="{{ url('admin/employees/create') }}"
                                    class="flex items-center w-full p-2  transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 text-orange-500 ">Create</a>
                            </li>
                            <li>
                                <a href="{{ url('admin/employees') }}"
                                    class="flex items-center w-full p-2  transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 text-orange-500 ">List</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ Request::is('admin/categories') ? 'link_active' : '' }}">
                        <a href="{{ url('admin/categories') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            {{-- <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                            </svg> --}}
                            <i class="fa fa-bars" aria-hidden="true"></i>
                            <span
                                class="flex-1 ml-3 whitespace-nowrap text-orange-500 dark:text-white font-bold">Category
                                List</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/menus') ? 'link_active' : '' }}">
                        <button type="button"
                            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="product" data-collapse-toggle="product">
                            <i
                                class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white fa-solid fa-plate-wheat"></i>
                            <span
                                class="flex-1 ml-3 text-left whitespace-nowrap text-orange-500 dark:text-white font-bold">Menu</span>
                            <svg class="w-3 h-3 text-orange-500 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <ul id="product" class="hidden py-2 space-y-2">
                            <li>
                                <a href="{{ url('admin/menus/create') }}"
                                    class="flex items-center w-full p-2  transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 text-orange-500 ">Create</a>
                            </li>
                            <li>
                                <a href="{{ url('admin/menus') }}"
                                    class="flex items-center w-full p-2  transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 text-orange-500 ">List</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ Request::is('admin/customers/orders') ? 'link_active' : '' }}">
                        <a href="{{ url('admin/customers/orders') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span
                                class="flex-1 ml-3 whitespace-nowrap text-orange-500 dark:text-white font-bold">Customer
                                Order</span>
                            <span
                                class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-orange-500 dark:text-white bg-blue-100 rounded-full dark:bg-blue-900  ">
                                @livewire('admin.cusotomer-order-count')
                            </span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/likes') ? 'link_active' : '' }}">
                        <a href="{{ url('admin/likes') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M4.804 21.644A6.707 6.707 0 006 21.75a6.721 6.721 0 003.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 01-.814 1.686.75.75 0 00.44 1.223zM8.25 10.875a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25zM10.875 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875-1.125a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25z"
                                    clip-rule="evenodd" />
                            </svg>

                            <span class="flex-1 ml-3 whitespace-nowrap text-orange-500 dark:text-white font-bold">Like
                                & Comment</span>
                            {{-- <span
                                class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-orange-500 dark:text-white bg-blue-100 rounded-full dark:bg-blue-900  ">3</span> --}}
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/purchase/order') ? 'link_active' : '' }}">
                        <a href="{{ url('admin/purchase/order') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            {{-- <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                            </svg> --}}
                            <i class="fa fa-bell" aria-hidden="true"></i>
                            <span
                                class="flex-1 ml-3 whitespace-nowrap text-orange-500 dark:text-white font-bold">Purchase
                                Order</span>
                            <span
                                class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-orange-500  bg-blue-100 rounded-full dark:bg-blue-900  dark:text-white">
                                @livewire('admin.purchase-order-count')
                            </span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/tables/') ? 'link_active' : '' }}">
                        <a href="{{ url('admin/tables') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                viewBox="0 0 24 24" id="Layer_1" data-name="Layer 1"
                                xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <defs>
                                        <style>
                                            .cls-1 {
                                                fill: none;
                                                stroke: #020202;
                                                stroke-miterlimit: 10;
                                                stroke-width: 1.91px;
                                            }
                                        </style>
                                    </defs>
                                    <rect class="cls-1" x="1.5" y="6.32" width="21"
                                        height="3.82"></rect>
                                    <polygon class="cls-1"
                                        points="4.36 19.68 2.46 19.68 4.36 10.14 8.18 10.14 4.36 19.68"></polygon>
                                    <polygon class="cls-1"
                                        points="19.64 19.68 21.55 19.68 19.64 10.14 15.82 10.14 19.64 19.68"></polygon>
                                    <line class="cls-1" x1="6.27" y1="14.91" x2="17.73"
                                        y2="14.91"></line>
                                </g>
                            </svg>

                            <span class="flex-1 ml-3 whitespace-nowrap text-orange-500 dark:text-white font-bold">Table
                                List</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/setting') ? 'link_active' : '' }}">
                        <a href="{{ url('admin/setting') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 00-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 00-2.282.819l-.922 1.597a1.875 1.875 0 00.432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 000 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 00-.432 2.385l.922 1.597a1.875 1.875 0 002.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 002.28-.819l.923-1.597a1.875 1.875 0 00-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 000-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 00-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 00-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 00-1.85-1.567h-1.843zM12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z"
                                    clip-rule="evenodd" />
                            </svg>


                            <span
                                class="flex-1 ml-3 whitespace-nowrap text-orange-500 dark:text-white font-bold">Setting</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/slide/*') ? 'link_active' : '' }}">
                        <a href="{{ url('admin/slide') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 18">
                                <path fill="currentColor"
                                    d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z" />
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M18 1H2a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z" />
                            </svg>
                            <span
                                class="flex-1 ml-3 whitespace-nowrap text-orange-500 dark:text-white font-bold">Slides</span>
                        </a>
                    </li>
                    </li>
                    <li class="{{ Request::is('admin/reports/*') ? 'link_active' : '' }}">
                        <button type="button"
                            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="reports" data-collapse-toggle="reports">
                            <i class="fas fa-newspaper flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                aria-hidden="true"></i>

                            <span
                                class="flex-1 ml-3 text-left whitespace-nowrap text-orange-500 dark:text-white font-bold">Reports</span>


                        </button>
                        <ul id="reports" class="hidden py-2 space-y-2">
                            <li>
                                <a href="{{ url('admin/reports/income') }}"
                                    class="flex items-center w-full p-2  transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 text-orange-500 ">Income</a>
                            </li>
                            <li>
                                <a href="{{ url('admin/reports/expense') }}"
                                    class="flex items-center w-full p-2  transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 text-orange-500 ">Expense</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>
        <div
            class="largest:ml-56 lglaptop:ml-52 lglaptop:-mt-14 md:m-0  laptopxsm:w-full md:w-full  mt-4 lg:max-w-[83vw] dark:bg-slate-600">
            <div class="p-4  rounded-lg h-screen ">

                @yield('content')
            </div>
        </div>

        @livewire('profile.profile-edit')
        @livewire('profile.change-password')
    </section>
    <!-- script tags -->
    @livewireScripts

    @stack('scripts')
    @stack('liveScripts')
    @stack('forMenu')
    @stack('cu')
    <script>
        window.addEventListener('load', () => {
            document.querySelector(".loading").style.display = "none";
            document.body.classList.add('show-sidebar');
        })
    </script>

    <script src="{{ asset('js/admin/darkmode.js') }}"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/noframework.waypoints.min.js"
        integrity="sha512-fHXRw0CXruAoINU11+hgqYvY/PcsOWzmj0QmcSOtjlJcqITbPyypc8cYpidjPurWpCnlB8VKfRwx6PIpASCUkQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
</body>

</html>
