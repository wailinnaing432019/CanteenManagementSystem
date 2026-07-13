@extends('layout.admin')

@section('title', 'Customer Order Detail')

@section('content')
    <div
        class="w-full h-full block ms-3  p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
        <div class="flex justify-between pe-8">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white drop-shadow-2xl">Order ID:
                {{ 1000 + $order->id }}
            </h5>
            <div class="">
                <button
                    class="mx-10  animate__animated animate__heartBeat animate__infinite bg-gray-100 border border-gray-200 rounded-lg shadow hover:bg-white dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 py-1 px-2 font text-black drop-shadow-xl">
                    <a href="{{ url('admin/customers/orders/invoice/' . $order->id) }}">
                        <i class="fa-solid fa-eye text-black pe-2 "></i>Preview Invoice</a></button>
                {{-- <button
                    class="animate__animated animate__heartBeat animate__infinite bg-gray-100 border border-gray-200 rounded-lg shadow hover:bg-white dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 py-1 px-2 font text-black drop-shadow-xl"><i
                        class="fa-solid fa-file-invoice-dollar text-black pe-2 "></i>Invoice</button> --}}
            </div>
        </div>
        <div class="mt-4 mb-4">
            <p class=" pr-4 inline-block font-normal text-gray-700 dark:text-gray-400   border-slate-400 drop-shadow-2xl">
                Customer Name :
                <span class="text-black drop-shadow-2xl font-bold">{{ $order->user->name }}</span>
            </p>

        </div>
        <div class="mt-4 mb-12">

            <p
                class=" pr-4 inline-block font-normal text-gray-700 dark:text-gray-400  border-r-2 border-slate-400 drop-shadow-2xl">
                Order
                Time :
                <span class="text-black drop-shadow-2xl font-bold">{{ $order->created_at->format('d-m-Y H:i:s A') }}</span>
            </p>
            <p class="ps-3 font-bold inline-block text-gray-700 dark:text-gray-400   drop-shadow-2xl">TableNo -
                {{ $order->table_no }}
            </p>
        </div>
        <hr>
        <div class="py-6 space-y-3 px-6">
            @forelse ($order_details as $item)
                <div class="flex justify-between items-center columns-3">

                    <div class="flex items-center space-x-4">
                        <div
                            class="block max-w-sm px-4 py-3 bg-gray-100 border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <img src="{{ asset('storage/' . $item->menu->menuImages[0]->image) }}" alt=""
                                class="w-[80px] h-[85px]">
                        </div>

                        <div class="space-y-2">
                            <p class="font-bold drop-shadow-2xl">{{ $item->menu->name }}</p>
                            <p class="drop-shadow-2xl">Price - {{ $item->price }} Ks</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        @livewire('admin.order-change-status', ['order_detail_id' => $item->id, 'status' => $item->status, 'order_id' => $order->id])

                    </div>
                    <div class="space-y-2">
                        <p class="font-bold drop-shadow-2xl text-lg"> {{ $item->total_price }} Ks</p>
                        <p class=" text-right drop-shadow-2xl">Qty: {{ $item->quantity }}</p>
                    </div>
                </div>
            @empty
            @endforelse

        </div>
        <hr>
        @if ($order->leave_note != null)
            <div class="p-4">
                <span class="block  text-lg ">Customer' Note</span>
                <div class="border-b-red-500 border-b-2 w-20"></div>
                <br>
                <span class="text-base p-7">
                    {{ $order->leave_note }}
                </span>
            </div>
        @endif
        <hr>
        <div class="mt-8 flex justify-between items-center px-6">
            <div class="">
                @livewire('admin.change-status-for-final', ['order' => $order])

            </div>
            <form action="{{ url('admin/customers/orders/' . $order->id . '/send-mail') }}" method="GET">
                <div class="flex items-center">
                    <h1 class="font-bold  drop-shadow-2xl"><i class="text-black me-1 fa-solid fa-clock"></i>Waiting
                        Time - </h1>
                    <input name="waiting_time"
                        class="ms-2 ps-4 drop-shadow-2xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                        type="text" value="{{ $orderWaitingTime }}">
                    <p class="ps-4 drop-shadow-2xl"> </p>
                </div>
        </div>
        <div class="mt-6 float-right px-6">
            <button type="submit"
                class="bg-gray-300 border hover:bg-orange-500 border-orange-500 rounded-lg shadow hover:bg-white dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 py-2 px-3 font-extrabold  drop-shadow-2xl">Send
                Mail</button>
        </div>
        </form>
    </div>
@endsection
