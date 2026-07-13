<!-- nav start section -->
<nav
    class="nav_control bg-slate-100 dark:bg-slate-700  border-2 border-gray-200 dark:border-2 dark:border-slate-600 animate__animated z-50">
    <div class="max-w-full flex-wrap flex justify-between drop-shadow-md ">
        <div href=""
            class="flex items-start logo laptopsm:text-base tablet:text-sm phone:text-sm tablet:top-auto tabletsm:top-auto tabletssm:top-auto laptopsm:top-auto laptopxsm:top-auto laptopssm:top-auto phone:top-auto">
            <img src="{{ asset('storage/' . $setting->logo_image) }}" alt=""
                class="laptopsm:w-[200px] laptopsm:h-[70px] laptopxsm:w-[180px] laptopxsm:h-[70px] laptopssm:w-[120px] laptopssm:h-[70px] tablet:w-[100px] tablet:h-[70px] tabletsm:w-[150px] tabletsm:h-[70px] phone:w-[150px] phone:h-[70px]">
        </div>

        <div class="w-screen phone:w-auto md:w-auto z-50 tablet:ms-5 ">
            <ul
                class="font-medium flex  p-4 md:p-0 phone:p-0 mt-4 md:flex-row phone:flex-row phone:mt-0 md:mt-0 md:border-0 laptopsm:space-x-8 laptopxsm:space-x-4 laptopssm:space-x-1  tabletssm:space-x-1 tablet:space-x-1 tabletsm:space-x-1 phone:space-x-0">
                <li class="z-50 p-4 lg:inline-block md:inline-block phone:hidden ">
                    <a href="/#home"
                        class="block py-2 pl-3 pr-4 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-blue-400 md:dark:hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent active-link"
                        aria-current="page">Home</a>
                </li>
                <li class="z-50 p-4 lg:inline-block md:inline-block phone:hidden">
                    <a href="/menus"
                        class="block py-2 pl-3 pr-4 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-blue-400 md:dark:hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Menu</a>
                </li>
                <li class="z-50 p-4 lg:inline-block md:inline-block phone:hidden ">
                    <a href="/#tableside"
                        class="block  py-2 pl-3 pr-4 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-blue-400 md:dark:hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Table</a>
                </li>

                <li class="z-50 p-4 lg:inline-block md:inline-block phone:hidden">
                    <a href="/#chef"
                        class="block py-2 pl-3 pr-4 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-blue-400 md:dark:hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Chefs</a>
                </li>
                @guest
                    <li class=" z-40 p-4 lg:inline-block md:inline-block phone:hidden tabletlg:hidden ">
                        <a href="/cart"
                            class="block py-2 pl-3 pr-4 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-blue-400 md:dark:hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Cart</a>
                    </li>
                @endguest
                <li class="z-50 p-4 lg:inline-block md:inline-block phone:hidden">
                    <a href="/#contact"
                        class="block py-2 pl-3 pr-4 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-blue-400 md:dark:hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                </li>

                @guest
                    <li class="z-50 p-4 lg:inline-block md:inline-block ">
                        <a href="{{ route('login') }}"
                            class="block py-2 pl-2 pr-4 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-blue-400 md:dark:hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent ">
                            Login
                        </a>
                    </li>
                    <li class="z-50 p-4 lg:inline-block md:inline-block ">
                        <a href="{{ route('register') }}"
                            class="block py-2 pl-2 pr-4 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-blue-400 md:dark:hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent ">
                            Sign Up
                        </a>
                    </li>
                @else
                    <li
                        class="laptopsm:ps-30 laptopxsm:ps-10 laptopssm:ps-5 tablet:ps-0 z-50 laptopsm:py-3 tablet:py-3 tablet:px-2 phone:py-1 lg:block md:block phone:inline-block">
                        <a href="{{ url('/cart') }}"
                            class="block py-2 pl-6 pr-4 text-blue-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 dark:text-blue-400 md:dark:hover:text-blue-700 dark:hover:bg-gray-500 dark:hover:text-white md:dark:hover:bg-transparent "><i
                                class="fa-solid fa-cart-shopping laptopsm:text-xl tablet:text-xl phone:text-base bg-gray-300 dark:bg-slate-800 p-2 rounded-md dark:text-blue-400"></i></a>
                    </li>
                    <li
                        class="z-50 laptopsm:pe-5 laptopxsm:pe-2 tablet:pe-2 tabletsm:pe-2 tabletssm:pe-2 pt-1 pb-2 lg:block md:block phone:inline-block">
                        <a href="#"
                            class="mt-0 dark:text-blue-400 md:dark:hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:laptopsm:text tablet:py-3 phone:py-2-white md:dark:hover:bg-transparent text-blue-700">
                            <div id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider"
                                class="flex justify-center items-center pt-1">
                                <div
                                    class=" bg-slate-300 overflow-hidden me-1 phone:w-[35px] phone:h-[35px] phone:rounded-[35px] tablet:w-[45px] tablet:h-[45px] tablet:rounded-[45px] laptopsm:w-[45px] laptopsm:h-[45px] laptopsm:rounded-[45px]">
                                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&color=FA8072&background=EBF4FF"
                                        alt="profile" />
                                </div>
                                <span class="phone:hidden laptopsm:inline tablet:inline">{{ auth()->user()->name }}</span>
                            </div>

                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<!-- Dropdown menu -->
<div id="dropdownDivider"
    class="z-10 hidden bg-slate-200  divide-y divide-gray-100 rounded-lg shadow w-48 dark:bg-gray-700 dark:divide-gray-600 p-5">
    <ul class="py-2 text-sm text-blue-700 dark:text-gray-200 font-bold " aria-labelledby="dropdownDividerButton">
        <li>
            <button class="px-4 py-2 flex justify-between">
                <div onclick="toggleTheme()" id="dark-switch-icon" class="">
                    <p class="lh hidden">Change Light <i class=" fas fa-sun"></i></p>
                    <p class="dk">Change Dark <i class=" fas fa-moon"></i>
                    </p>
                </div>
            </button>
        </li>
        <li>
            <a href="#" data-modal-show="profileedit" data-modal-toggle="profileedit"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
        </li>
        <hr>
        <li>
            <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out"></i>{{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
        <hr>
        <hr>
    </ul>
    <div data-modal-show="changePassword" data-modal-toggle="changePassword" class="py-2">
        <a href="#"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Change
            Password
        </a>
    </div>
</div>
@auth
    @livewire('customer.change-password')
    @livewire('customer.change-profile')
@endauth
