@extends('layout.admin')
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
                            Total Employee
                        </h1>
                        <h1>
                            {{ $totalEmployee }}
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
        {{-- <div class="grid grid-cols-3 gap-4 mb-4">
            <div class="flex items-center shadow-lg justify-center h-24 rounded bg-orange-300 dark:bg-gray-800">
                <div class="flex">
                    <div class="">
                        <i class="fa fa-edit bg-gray-100 p-4 mx-4 rounded-full" aria-hidden="true"></i>
                    </div>
                    <div class="dark:text-white flex-row text-center">
                        <h1>
                            Today Orders
                        </h1>
                        <h1>
                            7
                        </h1>
                    </div>
                </div>

            </div>
            <div class="flex items-center shadow-lg justify-center h-24 rounded bg-orange-300 dark:bg-gray-800">
                <div class="flex">
                    <div class="">
                        <i class="fa fa-edit bg-gray-100 p-4 mx-4 rounded-full" aria-hidden="true"></i>
                    </div>
                    <div class="dark:text-white flex-row text-center">
                        <h1>
                            Today Orders
                        </h1>
                        <h1>
                            7
                        </h1>
                    </div>
                </div>

            </div>
            <div class="flex items-center shadow-lg justify-center h-24 rounded bg-orange-300 dark:bg-gray-800">
                <div class="flex">
                    <div class="">
                        <i class="fa fa-edit bg-gray-100 p-4 mx-4 rounded-full" aria-hidden="true"></i>
                    </div>
                    <div class="dark:text-white flex-row text-center">
                        <h1>
                            Today Orders
                        </h1>
                        <h1>
                            7
                        </h1>
                    </div>
                </div>

            </div>
        </div> --}}
        <div class="grid grid-cols-2 mb-5">
            <div class="border border-1  p-5 h-full shadow-2xl">
                @livewire('admin.chart.account')
                <div class="text-center text-xl text-orange-500 p-3">
                    Income , Expense , Profit
                </div>
            </div>

            <div class="border border-1  shadow-2xl mx-auto  p-5">
                @livewire('admin.chart.menu')
                <div class="text-center text-xl text-orange-500 p-3">
                    Menus
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 mb-5">
            <div class="border border-1  p-5 h-full shadow-2xl">
                @livewire('admin.chart.sale-menu')
                <div class="text-center text-xl text-orange-500 p-3">
                    Sales of Menus per Month
                </div>
            </div>

            <div class="border border-1 ms-2 p-5 h-full shadow-2xl">
                @livewire('admin.chart.customer')
                <div class="text-center text-xl text-orange-500 p-3">
                    Line Graph of Customers
                </div>
            </div>
        </div>
        {{-- <div class="grid grid-cols-2 gap-4 mb-4 h-[50vh]">
            <div class="flex items-center shadow-lg justify-center h-[200px] rounded">

            </div>

        </div>
        <div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
        </div>
        <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 1v16M1 9h16" />
                </svg>
            </p>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
        </div> --}}

    </div>
@endsection

@push('scripts')
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const menuBar = new Chart(barChart, {
            type: 'bar',
            barThickness: 4,
            maxBarThickness: 10,
            data: menu_data,
            options: {
                indexAxis: 'y',
            }
        })
    </script> --}}
@endpush
