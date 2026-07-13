@extends('layouts.purchaser')
@section('title')
    Purchaser Dashboard
@endsection
@section('content')
    <div class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700 h-screen drop-shadow-md">
        <div class="flex justify-between mb-8 ms-6">
            <p class=" font-bold " style="color:blue"> Today order</p>
            <div class="flex items-center">
                <span style="color:blue" class="pe-4">You can print the order list </span>
                <form action="{{ url('purchaser/today-order/print') }}" method="get">
                    @csrf
                    <button>
                        <p class="text-white font-bold rounded px-2 py-1" style="background-color:red">Print</p>
                    </button>
                </form>
            </div>
        </div>
        <div class=" mx-4">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Product_name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Quantity
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Order By
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $order->product_name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $order->quantity }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->user->name }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">
                                    <h3 class="text-2xl text-red-700 text-center mt-3">
                                        Nothing to buy for this moment!
                                    </h3>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
