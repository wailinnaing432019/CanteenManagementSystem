<div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
    {{-- @if (Session::has('success'))
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
    @endif --}}
    <section
        class=" bg-slate-100 dark:bg-slate-600 laptopsm:h-auto laptopxsm:h-auto tablet:h-auto  phone:h-auto phonesm:h-auto phone:mt-5 laptopsm:mt-5 tablet:mt-5"
        id="tableside">
        <div class="flex mb-1 ms-5 items-center " wire:click="storeTable(2)">
            <h4 class="text-orange-500 dark:text-blue-400 font-medium text-2xl headline">Table</h4>
            <div class="ms-3 w-40  bg-slate-600 dark:bg-slate-500 headline" style="height:2px;">

            </div>
        </div>
        <h1
            class="dark:text-blue-400 font-bold text-orange-500 mb-3 ms-5 headline laptopsm:text-4xl    tablet:text-2xl xsm:text-[18px] phone:text-[18px] phonesm:text-[18px]">
            Choose Table</h1>
        <div
            class="grid laptopsm:grid-cols-5 tablet:grid-cols-4 phone:grid-cols-3 grid-flow-row laptopsm:ps-32 tablet:ps-10 phone:ps-10 pt-10">
            @forelse ($tables as $table)
                <div
                    class=" bg-slate-100  dark:bg-slate-600 rounded-lg headline relative box-border laptopsm:w-auto laptopsm:h-auto tablet:w-32 tablet:h-40 phone:w-24 phone:h-32 border-2 border-slate-100 dark:border-2 dark:border-slate-600">


                    @if ($table->status == 1)
                        <div wire:click="storeTable({{ $table->id }})" class=" absolute  top-[50%] left-11">
                            <p class="text-sm laptopsm:text-auto tablet:text-[10px] phone:text-[10px]">
                                <span class="text-white text-xl cursor-pointer">
                                    <button class="bg-orange-500 rounded-lg px-3">
                                        @if ($select == $table->id)
                                            Selected
                                        @else
                                            Select
                                        @endif
                                    </button>
                                </span>

                            </p>
                        </div>
                    @else
                        <span class="text-red-500">Unavailable</span>
                    @endif
                    <div class=" absolute top-5 right-[50%]   text-green-500 font-extrabold ">

                        <p class="m-0 p-0">{{ $table->table_no }}</p>
                    </div>
                    <div class="w-full">
                        <img wire:click="storeTable({{ $table->table_no }})"
                            src="{{ asset('storage/' . $table->image) }}" alt=""
                            class="lalaptopsm:w-48 laptopsm:h-52 tablet:w-32 tablet:h-40 phone:w-24 phone:h-32">
                    </div>
                </div>
            @empty
            @endforelse
            {{-- <div
                    class=" bg-gray-300 dark:bg-slate-800 rounded-lg headline relative box-border laptopsm:w-auto laptopsm:h-auto tablet:w-32 tablet:h-40 phone:w-24 phone:h-32 border-2 border-gray-300 dark:border-2 dark:border-slate-800">
                    <div class="absolute laptopsm:mt-3 tablet:mt-2 phone:mt-1 ms-4 me-1 bg-slate-700 dark:bg-slate-400  text-white dark:text-slate-600 font-extrabold flex justify-center items-center"
                        style="width:30px;height: 30px;border-radius:30px;">
                        <p>1</p>
                    </div>
                    <div
                        class="  absolute px-6 mt-1 me-1 bg-red-400 text-red-600 font-extrabold laptopsm:top-20 tablet:top-20 phone:top-12 -rotate-45 ">
                        <p class="laptopsm:text-auto tablet:text-auto phone:text-[10px]">Unavaliable</p>
                    </div>
                    <div class="w-full"><img src="{{ asset('img/rtable2.png') }}" alt=""
                            class="lalaptopsm:w-48 laptopsm:h-52 tablet:w-32 tablet:h-40 phone:w-24 phone:h-32"></div>
                </div>
                <div
                    class=" bg-gray-300 dark:bg-slate-800 rounded-lg headline relative box-border laptopsm:w-auto laptopsm:h-auto tablet:w-32 tablet:h-40 phone:w-24 phone:h-32 border-2 border-gray-300 dark:border-2 dark:border-slate-800">
                    <div class="absolute laptopsm:mt-3 tablet:mt-2 phone:mt-1 ms-4 me-1 bg-slate-700 dark:bg-slate-400 text-white dark:text-slate-600 font-extrabold flex justify-center items-center"
                        style="width:30px;height: 30px;border-radius:30px;">
                        <p>1</p>
                    </div>
                    <div
                        class=" absolute laptopsm:ms-10 tablet:ms-8 phone:ms-4 laptopsm:px-3 laptopsm:py-1 tablet:px-2 ablet:px-1 phone:px-2  tablet:py-0 laptopsm:mt-24 tablet:mt-16 phone:mt-14 bg-green-100 text-green-500 font-extrabold ">
                        <p class="text-sm laptopsm:text-auto tablet:text-[10px] phone:text-[10px]">Select</p>
                    </div>
                    <div class="w-full"><img src="{{ asset('img/rtable2.png') }}" alt=""
                            class="lalaptopsm:w-48 laptopsm:h-52 tablet:w-32 tablet:h-40 phone:w-24 phone:h-32"></div>
                </div>
                <div
                    class=" bg-gray-300 dark:bg-slate-800 rounded-lg headline relative box-border laptopsm:w-auto laptopsm:h-auto tablet:w-32 tablet:h-40 phone:w-24 phone:h-32 border-2 border-gray-300 dark:border-2 dark:border-slate-800">
                    <div class="absolute laptopsm:mt-3 tablet:mt-2 phone:mt-1 ms-4 me-1 bg-slate-700 dark:bg-slate-400 text-white dark:text-slate-600 font-extrabold flex justify-center items-center"
                        style="width:30px;height: 30px;border-radius:30px;">
                        <p>1</p>
                    </div>
                    <div
                        class=" absolute laptopsm:ms-10 tablet:ms-8 phone:ms-4 laptopsm:px-3 laptopsm:py-1 tablet:px-2 ablet:px-1 phone:px-2  tablet:py-0 laptopsm:mt-24 tablet:mt-16 phone:mt-14 bg-green-100 text-green-500 font-extrabold ">
                        <p class="text-sm laptopsm:text-auto tablet:text-[10px] phone:text-[10px]">Select</p>
                    </div>
                    <div class="w-full"><img src="{{ asset('img/rtable2.png') }}" alt=""
                            class="lalaptopsm:w-48 laptopsm:h-52 tablet:w-32 tablet:h-40 phone:w-24 phone:h-32"></div>
                </div>
                <div
                    class=" bg-gray-300 dark:bg-slate-800 rounded-lg headline relative box-border laptopsm:w-auto laptopsm:h-auto tablet:w-32 tablet:h-40 phone:w-24 phone:h-32 border-2 border-gray-300 dark:border-2 dark:border-slate-800">
                    <div class="absolute laptopsm:mt-3 tablet:mt-2 phone:mt-1 ms-4 me-1 bg-slate-700 dark:bg-slate-400 text-white dark:text-slate-600 font-extrabold flex justify-center items-center"
                        style="width:30px;height: 30px;border-radius:30px;">
                        <p>1</p>
                    </div>
                    <div
                        class=" absolute laptopsm:ms-10 tablet:ms-8 phone:ms-4 laptopsm:px-3 laptopsm:py-1 tablet:px-2 ablet:px-1 phone:px-2  tablet:py-0 laptopsm:mt-24 tablet:mt-16 phone:mt-14 bg-green-100 text-green-500 font-extrabold ">
                        <p class="text-sm laptopsm:text-auto tablet:text-[10px] phone:text-[10px]">Select</p>
                    </div>
                    <div class="w-full"><img src="{{ asset('img/rtable2.png') }}" alt=""
                            class="lalaptopsm:w-48 laptopsm:h-52 tablet:w-32 tablet:h-40 phone:w-24 phone:h-32"></div>
                </div>
                <div
                    class=" bg-gray-300 dark:bg-slate-800 rounded-lg headline relative box-border laptopsm:w-auto laptopsm:h-auto tablet:w-32 tablet:h-40 phone:w-24 phone:h-32 border-2 border-gray-300 dark:border-2 dark:border-slate-800">
                    <div class="absolute laptopsm:mt-3 tablet:mt-2 phone:mt-1 ms-4 me-1 bg-slate-700 dark:bg-slate-400 text-white dark:text-slate-600 font-extrabold flex justify-center items-center"
                        style="width:30px;height: 30px;border-radius:30px;">
                        <p>1</p>
                    </div>
                    <div
                        class=" absolute laptopsm:ms-10 tablet:ms-8 phone:ms-4 laptopsm:px-3 laptopsm:py-1 tablet:px-2 ablet:px-1 phone:px-2  tablet:py-0 laptopsm:mt-24 tablet:mt-16 phone:mt-14 bg-green-100 text-green-500 font-extrabold ">
                        <p class="text-sm laptopsm:text-auto tablet:text-[10px] phone:text-[10px]">Select</p>
                    </div>
                    <div class="w-full"><img src="{{ asset('img/rtable2.png') }}" alt=""
                            class="lalaptopsm:w-48 laptopsm:h-52 tablet:w-32 tablet:h-40 phone:w-24 phone:h-32">
                    </div>
                </div>
                <div
                    class=" bg-gray-300 dark:bg-slate-800 rounded-lg headline relative box-border laptopsm:w-auto laptopsm:h-auto tablet:w-32 tablet:h-40 phone:w-24 phone:h-32 border-2 border-gray-300 dark:border-2 dark:border-slate-800">
                    <div class="absolute laptopsm:mt-3 tablet:mt-2 phone:mt-1 ms-4 me-1 bg-slate-700 dark:bg-slate-400 text-white dark:text-slate-600 font-extrabold flex justify-center items-center"
                        style="width:30px;height: 30px;border-radius:30px;">
                        <p>1</p>
                    </div>
                    <div
                        class=" absolute laptopsm:ms-10 tablet:ms-8 phone:ms-4 laptopsm:px-3 laptopsm:py-1 tablet:px-2 ablet:px-1 phone:px-2  tablet:py-0 laptopsm:mt-24 tablet:mt-16 phone:mt-14 bg-green-100 text-green-500 font-extrabold ">
                        <p class="text-sm laptopsm:text-auto tablet:text-[10px] phone:text-[10px]">Select</p>
                    </div>
                    <div class="w-full"><img src="{{ asset('img/rtable2.png') }}" alt=""
                            class="lalaptopsm:w-48 laptopsm:h-52 tablet:w-32 tablet:h-40 phone:w-24 phone:h-32"></div>
                </div>
                <div
                    class=" bg-gray-300 dark:bg-slate-800 rounded-lg headline relative box-border laptopsm:w-auto laptopsm:h-auto tablet:w-32 tablet:h-40 phone:w-24 phone:h-32 border-2 border-gray-300 dark:border-2 dark:border-slate-800">
                    <div class="absolute laptopsm:mt-3 tablet:mt-2 phone:mt-1 ms-4 me-1 bg-slate-700 dark:bg-slate-400 text-white dark:text-slate-600 font-extrabold flex justify-center items-center"
                        style="width:30px;height: 30px;border-radius:30px;">
                        <p>1</p>
                    </div>
                    <div
                        class=" absolute laptopsm:ms-10 tablet:ms-8 phone:ms-4 laptopsm:px-3 laptopsm:py-1 tablet:px-2 ablet:px-1 phone:px-2  tablet:py-0 laptopsm:mt-24 tablet:mt-16 phone:mt-14 bg-green-100 text-green-500 font-extrabold ">
                        <p class="text-sm laptopsm:text-auto tablet:text-[10px] phone:text-[10px]">Select</p>
                    </div>
                    <div class="w-full"><img src="{{ asset('img/rtable2.png') }}" alt=""
                            class="lalaptopsm:w-48 laptopsm:h-52 tablet:w-32 tablet:h-40 phone:w-24 phone:h-32"></div>
                </div>
                <div
                    class=" bg-gray-300 dark:bg-slate-800 rounded-lg headline relative box-border laptopsm:w-auto laptopsm:h-auto tablet:w-32 tablet:h-40 phone:w-24 phone:h-32 border-2 border-gray-300 dark:border-2 dark:border-slate-800">
                    <div class="absolute laptopsm:mt-3 tablet:mt-2 phone:mt-1 ms-4 me-1 bg-slate-700 dark:bg-slate-400 text-white dark:text-slate-600 font-extrabold flex justify-center items-center"
                        style="width:30px;height: 30px;border-radius:30px;">
                        <p>1</p>
                    </div>
                    <div
                        class=" absolute laptopsm:ms-10 tablet:ms-8 phone:ms-4 laptopsm:px-3 laptopsm:py-1 tablet:px-2 ablet:px-1 phone:px-2  tablet:py-0 laptopsm:mt-24 tablet:mt-16 phone:mt-14 bg-green-100 text-green-500 font-extrabold ">
                        <p class="text-sm laptopsm:text-auto tablet:text-[10px] phone:text-[10px]">Select</p>
                    </div>
                    <div class="w-full"><img src="{{ asset('img/rtable2.png') }}" alt=""
                            class="lalaptopsm:w-48 laptopsm:h-52 tablet:w-32 tablet:h-40 phone:w-24 phone:h-32"></div>
                </div>
                <div
                    class=" bg-gray-300 dark:bg-slate-800 rounded-lg headline relative box-border laptopsm:w-auto laptopsm:h-auto tablet:w-32 tablet:h-40 phone:w-24 phone:h-32 border-2 border-gray-300 dark:border-2 dark:border-slate-800">
                    <div class="absolute laptopsm:mt-3 tablet:mt-2 phone:mt-1 ms-4 me-1 bg-slate-700 dark:bg-slate-400 text-white dark:text-slate-600 font-extrabold flex justify-center items-center"
                        style="width:30px;height: 30px;border-radius:30px;">
                        <p>1</p>
                    </div>
                    <div
                        class=" absolute laptopsm:ms-10 tablet:ms-8 phone:ms-4 laptopsm:px-3 laptopsm:py-1 tablet:px-2 ablet:px-1 phone:px-2  tablet:py-0 laptopsm:mt-24 tablet:mt-16 phone:mt-14 bg-green-100 text-green-500 font-extrabold ">
                        <p class="text-sm laptopsm:text-auto tablet:text-[10px] phone:text-[10px]">Select</p>
                    </div>
                    <div class="w-full"><img src="{{ asset('img/rtable2.png') }}" alt=""
                            class="lalaptopsm:w-48 laptopsm:h-52 tablet:w-32 tablet:h-40 phone:w-24 phone:h-32"></div>
                </div>
                <div
                    class=" bg-gray-300 dark:bg-slate-800 rounded-lg headline relative box-border laptopsm:w-auto laptopsm:h-auto tablet:w-32 tablet:h-40 phone:w-24 phone:h-32 border-2 border-gray-300 dark:border-2 dark:border-slate-800">
                    <div class="absolute laptopsm:mt-3 tablet:mt-2 phone:mt-1 ms-4 me-1 bg-slate-700 dark:bg-slate-400 text-white dark:text-slate-600 font-extrabold flex justify-center items-center"
                        style="width:30px;height: 30px;border-radius:30px;">
                        <p>1</p>
                    </div>
                    <div
                        class=" absolute laptopsm:ms-10 tablet:ms-8 phone:ms-4 laptopsm:px-3 laptopsm:py-1 tablet:px-2 ablet:px-1 phone:px-2  tablet:py-0 laptopsm:mt-24 tablet:mt-16 phone:mt-14 bg-green-100 text-green-500 font-extrabold ">
                        <p class="text-sm laptopsm:text-auto tablet:text-[10px] phone:text-[10px]">Select</p>
                    </div>
                    <div class="w-full"><img src="{{ asset('img/rtable2.png') }}" alt=""
                            class="lalaptopsm:w-48 laptopsm:h-52 tablet:w-32 tablet:h-40 phone:w-24 phone:h-32"></div>
                </div>
                <div
                    class=" bg-gray-300 dark:bg-slate-800 rounded-lg headline relative box-border laptopsm:w-auto laptopsm:h-auto tablet:w-32 tablet:h-40 phone:w-24 phone:h-32 border-2 border-gray-300 dark:border-2 dark:border-slate-800">
                    <div class="absolute laptopsm:mt-3 tablet:mt-2 phone:mt-1 ms-4 me-1 bg-slate-700 dark:bg-slate-400 text-white dark:text-slate-600 font-extrabold flex justify-center items-center"
                        style="width:30px;height: 30px;border-radius:30px;">
                        <p>1</p>
                    </div>
                    <div
                        class=" absolute laptopsm:ms-10 tablet:ms-8 phone:ms-4 laptopsm:px-3 laptopsm:py-1 tablet:px-2 ablet:px-1 phone:px-2  tablet:py-0 laptopsm:mt-24 tablet:mt-16 phone:mt-14 bg-green-100 text-green-500 font-extrabold ">
                        <p class="text-sm laptopsm:text-auto tablet:text-[10px] phone:text-[10px]">Select</p>
                    </div>
                    <div class="w-full"><img src="{{ asset('img/rtable2.png') }}" alt=""
                            class="lalaptopsm:w-48 laptopsm:h-52 tablet:w-32 tablet:h-40 phone:w-24 phone:h-32"></div>
                </div> --}}
        </div>
    </section>
</div>
