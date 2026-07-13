@extends('layouts.purchaser')
@section('title')
    Purchaser Dashboard
@endsection
@section('content')
    <div class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700 h-screen drop-shadow-md">
        <div class="flex justify-between mb-8 ms-6">
            <p class=" font-bold " style="color:blue">Purchased List</p>
        </div>
        <div class="w-full h-full">
            <div class="">
                @foreach ($errors->all() as $error)
                    <div class="error">{{ $error }}</div>
                @endforeach
                <form action="{{ url('purchaser/purchased') }}" method="post">
                    @csrf
                    <div class="grid grid-flow-row grid-cols-12 gap-5 mb-2 font-bold">
                        <div class="col-span-1"></div>
                        <p class="col-span-3 mb-2 text-sm  text-gray-900 dark:text-gray-300">Product_name</p>
                        <p class="col-span-3 mb-2 text-sm  text-gray-900 dark:text-gray-300">Quantity</p>
                        <p class="col-span-3 mb-2 text-sm  text-gray-900 dark:text-gray-300">Price</p>
                    </div>
                    @forelse ($orders as $order)
                        <div class="grid grid-flow-row grid-cols-12 gap-5">
                            <div class="col-span-1"></div>
                            <div class="col-span-3 mb-3">
                                <input type="text" id="name" name="product.{{ $order->id }}"
                                    value="{{ $order->product_name }}"
                                    class="shadow-sm outline outline-1 outline-orange-500 bg-gray-50 border-none text-gray-900 text-sm rounded-md focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light headline laptopsm:py-3 tablet:py-3 phone:py-1"
                                    placeholder="">
                            </div>
                            <div class="col-span-3 mb-3">
                                <input type="number" id="qty" value="{{ $order->quantity }}"
                                    name="quantity.{{ $order->id }}"
                                    class="shadow-sm outline outline-1 outline-orange-500 bg-gray-50 border-none text-gray-900 text-sm rounded-md focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light headline laptopsm:py-3 tablet:py-3 phone:py-1"
                                    placeholder="">
                                @error('quantity')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Oops!</span>
                                        {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-3 mb-3">
                                <input type="number" id="price" value="" name="price.{{ $order->id }}"
                                    class="shadow-sm outline outline-1 outline-orange-500 bg-gray-50 border-none text-gray-900 text-sm rounded-md focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light headline laptopsm:py-3 tablet:py-3 phone:py-1"
                                    placeholder="">
                                @error('price.{{ $order->id }}')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Oops!</span>
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    @empty
                        <h5 class="text-xl text-red-700 text-center mt-3">
                            If the purchase order doesn't exist, you don't need to add purchased list !
                        </h5>
                    @endforelse
                    <div class=" mt-7 lg:me-20 md:me-20 sm:me-10  flex items-center float-right ">
                        <p class="text-slate-400 text-sm me-2">If you sure,send me</p>
                        <button type="submit"
                            class="laptopsm:py-3 laptopsm:px-5 tablet:py-3 tablet:px-5 phone:py-1 phone:px-2 text-sm font-medium text-center text-orange-500 rounded-md border border-gray-600 bg-gray-200 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 headline ">purchsed
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
