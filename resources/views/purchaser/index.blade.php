@extends('layouts.purchaser')
@section('title')
    Purchaser Dashboard
@endsection
@section('content')
    <div class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700">
        <div class="grid grid-cols-4 gap-4 mb-4">
            <div class="flex items-center shadow-lg justify-center h-24 rounded bg-orange-300 dark:bg-gray-800">
                <div class="flex">
                    <div class="">
                        <i class="fas fa-people-group  bg-gray-100 p-4 mx-4 rounded-full" aria-hidden="true"></i>
                    </div>
                    <div class="dark:text-white flex-row text-center">
                        <h1>
                            Total Chef
                        </h1>
                        <h1>
                            {{ $chef }}
                        </h1>
                    </div>
                </div>

            </div>

            <div class="flex items-center shadow-lg justify-center h-24 rounded bg-orange-300 dark:bg-gray-800">
                <div class="flex">
                    <div class="">
                        <i class="fas fa-utensils bg-gray-100 p-4 mx-4 rounded-full" aria-hidden="true"></i>
                    </div>
                    <div class="dark:text-white flex-row text-center">
                        <h1>
                            Total Menus
                        </h1>
                        <h1>
                            {{ $totalMenu }}
                        </h1>
                    </div>
                </div>

            </div>
            <div class="flex items-center shadow-lg justify-center h-24 rounded bg-orange-300 dark:bg-gray-800">
                <div class="flex">
                    <div class="">
                        {{-- <i class="fa-regular fa-bell"></i> --}}

                        <i class="fa-regular fa-bell bg-gray-100 p-4 mx-4 rounded-full" aria-hidden="true"></i>
                    </div>
                    <div class="dark:text-white flex-row text-center">
                        <h1>
                            Today Order
                        </h1>
                        <h1>
                            {{ $todayOrder }}
                        </h1>
                    </div>
                </div>

            </div>
            <div class="flex items-center shadow-lg justify-center h-24 rounded bg-orange-300 dark:bg-gray-800">
                <div class="flex">
                    <div class="">
                        <i class="fa-solid fa-table bg-gray-100 p-4 mx-4 rounded-full" aria-hidden="true"></i>
                    </div>
                    <div class="dark:text-white flex-row text-center">
                        <h1>
                            Available Table
                        </h1>
                        <h1>
                            {{ $availableTable }}
                        </h1>
                    </div>
                </div>

            </div>
        </div>
        <div class="grid grid-cols-2 mb-5 ">
            <div class="border border-1  p-5 h-full shadow-2xl">
                @livewire('chef.chart.menu-sale')
                <div class="text-center text-xl text-orange-500 p-3">
                    Sales of Menus per Month
                </div>
            </div>
            <div class="border border-1  shadow-2xl mx-auto  p-5">
                @livewire('admin.chart.menu')
                <div class="text-center text-xl text-orange-500 p-3">
                    Menus
                </div>
            </div>
        </div>
    </div>
@endsection
