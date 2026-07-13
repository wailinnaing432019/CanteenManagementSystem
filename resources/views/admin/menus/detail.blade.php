@extends('layout.admin')

@section('title')
    Menu Detail
@endsection

@section('content')
    <div class="row h-screen">

        <div class="p-4 border-2 border-gray-200 rounded-lg h-full  bg-slate">
            <a href="javascript:history.back()"
                class="rounded-lg p-3 border border-orange-700 hover:bg-orange-600 bg-orange-500"><i class="fa fa-reply px-6"
                    aria-hidden="true"></i></a>
            <div class="grid grid-cols-12 bg-white shadow-2xl mt-10 ">
                <div
                    class="col-span-5 flex items-center justify-center p-5 border-1 border-slate-100 drop-shadow-xl bg-violet-100 me-1 pb-20">
                    <img src="{{ asset('storage/' . $menu->menuImages[0]->image) }}" alt=""
                        class="w-[250px] h-[250px] rounded-md outline outline-1 outline-slate-100 shadow-lg shadow-violet-300">
                </div>
                <div class="col-span-7  pt-8 pb-8 ps-0 space-y-5">
                    <div class=" space-x-3 grid grid-flow-row grid-cols-12 space-y-8 items-center">
                        <div class="col-span-4 pt-5">
                            <h1 class="font-bold text-orange-500"><i
                                    class="text-black me-1 fa-solid fa-house-tsunami"></i>Name</h1>
                            <p class="ps-4 pt-1">{{ $menu->name }}</p>
                        </div>
                        <div class="col-span-4">
                            <h1 class="font-bold text-orange-500"><i
                                    class="text-black me-1 fa-solid fa-bars-staggered"></i>Category
                            </h1>
                            <p class="ps-4 pt-1">{{ $menu->category->name }}</p>
                        </div>
                        <div class="col-span-4">
                            <h1 class="font-bold text-orange-500"><i
                                    class="text-black me-1 fa-solid fa-money-bill-wave"></i>Price</h1>
                            <p class="ps-4 pt-1">{{ $menu->price }} Ks</p>
                        </div>
                    </div>
                    <div class="grid grid-flow-row grid-cols-12 space-x-3  space-y-3 items-center">
                        <div class="col-span-4 pt-3">
                            <h1 class="font-bold text-orange-500"><i
                                    class="text-black me-1 fa-solid fa-user-pen"></i>Created By</h1>
                            <p class="ps-4 pt-1">{{ $menu->MenuCreateUser->name }}</p>
                        </div>
                        <div class="col-span-4">
                            <h1 class="font-bold text-orange-500"><i class="text-black me-1 fa-solid fa-clock"></i>Waiting
                                Time</h1>
                            <p class="ps-4 pt-1">{{ $menu->waiting_time }} min</p>
                        </div>
                        <div class="col-span-4">
                            <h1 class="font-bold text-orange-500"><i
                                    class="text-black me-1 fa-brands fa-staylinked"></i>Status</h1>
                            <p class="ps-4 pt-1">
                                {{ $menu->status == 0 ? 'panding' : ($menu->status == 1 ? 'approved' : ($menu->status == 2 ? 'available' : 'unavailable')) }}
                            </p>
                        </div>

                    </div>
                    <div class="grid grid-flow-row grid-cols-12 space-x-3  space-y-3">
                        <div class="col-span-9 pt-3">
                            <h1 class="font-bold text-orange-500"><i
                                    class="text-black me-1 fa-solid fa-file-signature"></i></i>Description</h1>
                            <p class="ps-4 pt-1">{{ $menu->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
