@extends('layout.admin')

@section('title')
    Employee Detail
@endsection

@section('content')
    <div class="row h-screen">

        <div class="p-4 border-2 border-gray-200 rounded-lg h-full  bg-slate">
            <a href="javascript:history.back()"
                class="rounded-lg p-3 border border-orange-700 hover:bg-orange-600 bg-orange-500"><i class="fa fa-reply px-6"
                    aria-hidden="true"></i></a>
            <div class="grid grid-cols-12 bg-white shadow-2xl mt-10 ">
                <div
                    class="col-span-5 ps-20 p-5 border-1 border-slate-100 drop-shadow-xl bg-violet-100 me-1 h-[560px] space-y-3">
                    <img src="{{ asset('storage/' . $employee->image) }}" alt="" class="mb-5"
                        style=" width:250px;height:250px;border-radius:100px; ">
                    <div class="col-span-4 pt-5 flex items-center pb-5">
                        <h1 class="font-bold text-orange-500">Name -
                        </h1>
                        <p class="ps-4  font-bold text-lg capitalize">{{ $employee->name }}</p>
                    </div>
                    <div class="col-span-4 flex items-center ">
                        <h1 class="font-bold text-orange-500">Position -</h1>
                        <p class="ps-4 capitalize font-bold">{{ $employee->role_as }}</p>
                    </div>
                </div>
                <div class="col-span-7  pt-8 pb-8  space-y-7 ps-8">
                    <div class="grid grid-flow-row grid-cols-10 items-center">
                        <div class="col-span-5">
                            <h1 class="font-bold text-orange-500"><i class="text-black me-1 fa-solid fa-clock"></i>Work Time
                            </h1>
                            <p class="ps-4 pt-1">
                                {{ date('h:i A', strtotime($employee->start_time)) }} -
                                {{ date('h:i A', strtotime($employee->end_time)) }}</p>
                        </div>
                        <div class="col-span-5">
                            <h1 class="font-bold text-orange-500">
                                <i class="text-black me-1 fa-solid fa-envelope"></i>
                                Email
                            </h1>
                            <p class="ps-4 pt-1">{{ $employee->email }}</p>
                        </div>
                    </div>
                    <div class="grid grid-flow-row grid-cols-10 items-center">
                        <div class="col-span-5">
                            <h1 class="font-bold text-orange-500"><i class="text-black me-1 fa-solid fa-phone"></i>Phone
                            </h1>
                            <p class="ps-4 pt-1">{{ $employee->phone }} </p>
                        </div>
                        <div class="col-span-5 pt-3">
                            <h1 class="font-bold text-orange-500"><i
                                    class="text-black me-1 fa-solid fa-user-pen"></i>Address
                            </h1>
                            <p class="ps-4 pt-1">{{ $employee->address }}</p>
                        </div>
                    </div>
                    <div class="grid grid-flow-row grid-cols-10">
                        <div class="col-span-10 pt-3 ">
                            <h1 class="font-bold text-orange-500"><i
                                    class="text-black me-1 fa-solid fa-file-signature"></i></i>Description</h1>
                            <p class="ps-4 pt-1"></p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
