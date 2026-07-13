        <div class="w-screen mb-10 bg-slate-50 dark:bg-slate-600">

            <div class="grid grid-flow-row grid-cols-12">
                <div class="laptopsm:col-span-2 tablet:col-span-2 phone:col-span-0"></div>
                <div
                    class="flex items-center mt-4 laptopsm:col-span-9 tablet:col-span-9 phone:col-span-12 laptopsm:justify-between tablet:justify-between phone:flex">
                    <div
                        class="laptopsm:ms-4 tablet:ms-3 phone:ms-1 flex justify-center laptopsm:flex tablet:flex laptopsm:justify-between tablet:justify-between phone:justify-between me-2">
                        <select wire:model="category"
                            class="bg-gray-50 border dark:text-blue-400 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block laptopsm:w-[300px] tablet:w-[250px] phone:w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Choose category</option>
                            @forelse ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @empty
                                <option>Choose category</option>
                            @endforelse
                        </select>

                    </div>
                    <div class="flex justify-center ">
                        <div class="me-4">
                            <form class="col-span-2">
                                <label for="default-search"
                                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                                <div class="relative">
                                    <input type="search" id="default-search" wire:model.debounce.300ms="search"
                                        class="block laptopsm:w-80 tablet:w-80 laptosm:p-3 tablet:p-3 phone:p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Search..." required>
                                    <button type="submit"
                                        class="text-black dark:text-slate-300 absolute right-2.5 bottom-2.5 hover:text-orange-500 dark:hover:text-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-3   dark:focus:ring-blue-800 phone:top-2 laptopsm:top-[7px] tablet:top-[7px]">
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="me-10  text-sm ">
                            <select wire:model="sorting" id=""
                                class="phone:py-1 tablet:py-2 dark:bg-gray-700 dark:text-blue-400 laptopsm:py-2 phone:w-24 laptopsm:w-44 phone:px-1 rounded">
                                <option value="asc">Low to High</option>
                                <option value="desc">Hight to Low</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-flow-row grid-cols-12 mt-12">
                <div class="col-span-12 mt-8">
                    <div
                        class="grid laptopsm:grid-cols-5 tablet:grid-cols-4 phone:grid-cols-2 grid-flow-row laptopsm:gap-y-4 tablet:gap-y-2 phone:gap-y-2">
                        @forelse ($menus as $menu)
                            <div
                                class="relative laptopsm:h-64 laptopsm:w-52 tablet:h-60 tablet:w-52 phone:h-52 phone:w-40 ms-5 rounded-md overflow-hidden border bottom-1 drop-shadow-2xl pb-0 dark:shadow-none bg-white dark:bg-blue-100">
                                <div
                                    class="absolute bg-white dark:bg-blue-100 z-50 right-0 flex items-center px-2 py-1 rounded-md">
                                    <i class="fa-solid fa-eye pe-2 text-orange-500 drop-shadow-md"></i>
                                    <p class="font-bold drop-shadow-md">{{ $menu->count }}</p>
                                </div>
                                <img src="{{ asset('storage/' . $menu->menuImages[0]->image) }}" alt="no image"
                                    class="laptopsm:w-full laptopsm:h-32 tablet:w-fuull tablet:h-32 phone:w-full phone:h-28 border-b-1  block p-2 rounded-2xl drop-shadow-lg">
                                <div
                                    class="laptopsm:w-full laptopsm:h-32 tablet:w-full tablet:h-32 phone:w-full phone:h-32 bg-white dark:bg-slate-400 text-blue-600 dark:text-black font-semibold text-center laptopsm:pt-4 tablet:pt-3 phone:pt-2  phone:text-[13px]">
                                    <h5 class="laptopsm:text-[15px] tablet:text-[15px] drop-shadow-lg">
                                        {{ $menu->name }}
                                    </h5>
                                    <div class="flex justify-center">
                                        <p
                                            class="laptopsm:text-[15px] tablet:text-[15px] pb-5 pe-2 drop-shadow-lg dark:text-black">
                                            {{ $menu->price }} Ks</p>
                                        {{-- <p
                                    class="laptopsm:text-[13px] tablet:text-[12px] pb-5 line-through text-black drop-shadow-lg">
                                    {{ $menu->price }} Ks</p> --}}
                                    </div>
                                    <div
                                        class="flex justify-between items-center text-orange-500 font-bold bg-white dark:bg-slate-400 border-t-slate-300 laptopsm:w-full laptopsm:h-8 tablet:w-full tablet:h-8 phone:w-full phone:h-4 laptopsm:text-[12px] tablet:text-[12px] ">
                                        <div
                                            class="hover:bg-orange-500 outline outline-1 outline-orange-500 dark:outline-none text-orange-500 hover:text-white laptopsm:text-base tablet:text-base  phone:text-[10px] laptopsm:px-2 tablet:px-2 phone:px-1 mx-1 phone:py-1 rounded-lg drop-shadow-lg dark:bg-slate-700">
                                            <a href="{{ url('menus/' . $menu->id) }}"
                                                class="drop-shadow-lg dark:text-blue-400">Add To Cart</a>
                                        </div>
                                        <div class="">
                                            <span
                                                class=" text-orange-500 outline outline-1 p-2 hover:bg-orange-500 hover:text-white outline-orange-500 dark:outline-none me-2 rounded drop-shadow-lg">{{ $menu->likeCount }}
                                                Likes</span>
                                            {{-- <span
                                                class=" text-orange-500 outline outline-1 outline-orange-500 dark:outline-none me-2 rounded drop-shadow-lg">
                                                <i
                                                    class="fa-regular fa-heart laptopsm:px-2 tablet:px-2 phone:px-1 laptopsm:py-2 tablet:py-2 phone:py-1 text-[15px] drop-shadow-lg dark:text-blue-400 dark:bg-slate-700"></i>
                                            </span> --}}
                                            {{-- {{ $menu->like->status->count() }} --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-red-800">
                                There is no data
                            </div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
