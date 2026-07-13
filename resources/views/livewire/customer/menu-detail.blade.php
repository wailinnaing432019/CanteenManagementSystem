<div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
    @if (Session::has('success'))
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
    @endif
    <div class="w-screen  bg-slate-50 dark:bg-slate-600 dark:text-blue-400">

        <div
            class=" laptopsm:space-x-12 laptopsm:pt-10 laptopsm:ps-32 tablet:space-x-12 tablet:pt-10 tablet:ps-14 phone:space-x-0 phone:pt-10 phone:ps-2 pe-3 grid grid-flow-row laptopsm:grid-cols-3 tablet:grid-cols-3 phone:grid-cols-2">
            <div class="rounded-lg overflow-hidden phone:mt-2 laptopsm:mt-2 tablet:mt-2">
                <img src="{{ asset('storage/' . $menu->menuImages[0]->image) }}" alt=""
                    class="shadow-md rounded-3 shadow-orange-200 overflow-hidden laptopsm:w-[380px] laptopsm:h-[260px] tablet:w-[330px] tablet:h-[230px] phone:w-[200px] phone:h-[180px] phonesm:w-[300px] phonesm:h-[80px]"
                    style="background: rgb(236,192,131);background: linear-gradient(-45deg, rgba(236,192,131,1) 0%, rgb(228, 137, 57) 100%);">

                <div
                    class="bg-slate-50 dark:bg-slate-600 dark:text-white flex w-full justify-between rounded items-center shadow-md shadow-slate-200 mt-3 laptopsm:w-[380px] tablet:w-[330px] phone:w-[200px] laptopsm:text-[15px] tablet:text-[15px] phone:text-[13px] px-4 py-1">
                    <span wire:click="like({{ $menu->id }})"
                        class="cursor-pointer font-bold hover:scale-110 dark:text-white text-blue-600">
                        <i class="dark:text-blue-400 fa-regular fa-thumbs-up "></i>
                        @if ($status)
                            Liked
                        @else
                            Like
                        @endif
                    </span>
                    <span class="font-bold "><i
                            class="dark:text-blue-400 fa-regular fa-thumbs-up "></i>{{ $likeCount }}</span>
                    <span class="font-bold cursor-pointer hover:scale-110 pointer flex items-center cmt"><i
                            class="dark:text-blue-400 fa-regular fa-message pt-1 pe-1 font-bold"></i> comment </span>

                </div>
                <!-- comment section-->
                <form wire:ignore wire:submit.prevent="comment({{ $menu->id }})">
                    <div class="mt-4 hidden relative items-center opcmt animate__animated animate__animated_fadeInUp">
                        <textarea type="text" id="first_name" wire:model="message"
                            class="bg-gray-50 border w-3/4 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-auto"
                            placeholder="message"></textarea>
                        <button
                            class="absolute laptopsm:right-32 tablet:right-20 phone:right-16 rounded-lg  hover:bg-blue-600 px-3 py-1"
                            type="submit">
                            <i class="dark:text-blue-400 fas fa-paper-plane text-lg text-black"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div
                class="laptopsm:space-y-2 dark:text-blue-400  tablet:space-y-2 phone:space-y-0 laptopsm:w-[500px] laptopsm:h-[400px] tablet:w-[320px] tablet:h-[300px] phone:w-[250px] phone:h-[250px]">
                <h1
                    class="laptopsm:text-2xl  dark:text-blue-400 tablet:text-xl phone:text-lg  text-slate-900 font-extrabold drop-shadow-md">
                    For {{ $menu->category->name }}</h1>
                <h4
                    class="text-slate-950 dark:text-blue-400 font-bold laptopsm:text-xl tablet:text-xl phone:text-md drop-shadow-md">
                    {{ $menu->name }} @if ($menu->discount != 0)
                        <sup class="text-red-500">discount {{ $menu->discount }} %</sup>
                    @endif
                </h4>
                <p
                    class="laptopsm:pt-7 max-w-[400px]  dark:text-slate-200 tablet:pt-4 phone:pt-1 text-slate-500 drop-shadow-md phone:text-[12px] laptopsm:text-base  tablet:text-sm">
                    {{ $menu->description }}
                </p>
                <div class="grid grid-cols-2 w-full h-9 pt-2">
                    <p class="space-x-1">
                        <span
                            class="laptopsm:text-xl tablet:text-xl phone:text-md font-bold drop-shadow-md">{{ $menu->price }}
                            Ks</span>
                        {{-- <span class="px-2 text-sm font-bold bg-orange-200 text-orange-700 drop-shadow-md">50%</span> --}}
                    </p>
                </div>
                {{-- <p
                    class="line-through text-slate-400 laptopsm:pt-2 laptopsm:pb-4 tablet:pt-2 tablet:pb-4 phone:pt-1 phone:pb-2 drop-shadow-md">
                    $250.00</p> --}}
                <div class="grid grid-cols-2">
                    <p class="laptopsm:pb-8 tablet:pb-3 phone:pb-2 drop-shadow-md">Waiting Time - <span
                            class="text-orange-500 dark:text-white">{{ $menu->waiting_time }} min</span>
                    </p>
                    {{-- <div
                        class="bg-slate-500 rounded-lg flex justify-center items-center shadow-md shadow-orange-200 laptopsm:w-[200px] laptopsm:h-10 tablet:h-10 phone:h-8 tablet:w-[150px] phone:w-[45px]">
                        <p><span class="laptopsm:inline tablet:inline phone:hidden">Add to - </span><i
                                class="fa-regular fa-heart pe-1 text-orange-400"></i><span
                                class="laptopsm:inline tablet:inline phone:hidden">Wishlist</span></p>
                    </div> --}}
                </div>
                <!-- add to cart Section -->
                <div class="grid grid-cols-2  h-9 pt-2 dark:text-blue-400">
                    <div
                        class="bg-slate-300 dark:bg-slate-700 flex w-3/4 pb-1 justify-around rounded-lg items-center shadow-md shadow-slate-200">
                        <button wire:click="decrement"
                            class="font-bold dark:text-blue-400 hover:bg-slate-800 flex items-center justify-center text-orange-600 w-8 rounded-lg text-2xl h-3/4"><span>-</span></button>
                        <p class="w-1/3 ps-3 dark:text-white"> {{ $quantity }}</p>
                        <button wire:click="increment"
                            class="font-bold dark:text-blue-400 hover:bg-slate-800 pb-1 flex items-center justify-center text-orange-600 w-8 rounded-lg text-2xl h-3/4"><span>+</span></button>
                    </div>
                    <div wire:click="addToCart({{ $menu->id }}, {{ $quantity }})"
                        class="bg-orange-500  dark:bg-slate-700 pointer laptopsm:w-4/5 tablet:w-4/5 phone:w-[50px] rounded-lg flex justify-center items-center shadow-md shadow-orange-200">
                        <p><span class="laptopsm:inline tablet:inline pointer phone:hidden">
                                @if ($added)
                                    Added
                                @else
                                    Add to cart
                                @endif
                            </span>
                            <span class="laptopsm:hidden  tablet:hidden phone:inline"><i
                                    class="fa-solid fa-cart-shopping "></i></span>
                        </p>

                    </div>

                </div>
            </div>
            <!-- comment Section -->
            <div
                class="dark:text-blue-400 laptopsm:h-[500px] tablet:h-[400px] phone:h-[300px]  laptopsm:w-[400px] tablet:w-[280px] phone:w-[480px] overflow-scroll phone:mt-20 laptopsm:mt-0 tablet:mt-0 ps-5">
                <h5 class="text-black dark:text-blue-400 text-xl pb-2"><span class="text-blue-400">
                        {{ $commentCount }} </span>Comments
                </h5>
                @forelse ($comments as $comment)
                    <div class="ps-5 space-y-3 mb-3 dark:text-blue-400">
                        <div class="flex">
                            <img src="https://ui-avatars.com/api/?name={{ $comment->user->name }}&color=FA8072&background=EBF4FF"
                                alt="" style="width:45px;height:45px;border-radius:45px;">
                            <div
                                class="bg-slate-200 ps-3 pt-1 pb-1 rounded-tl-sm rounded-xl rounded-br-sm laptopsm:text-base tablet:text-sm phone:text-[12px] inline-block max-w-[200px]">
                                <span class="font-bold"> {{ $comment->user->name }}</span>
                                <p class="text-slate-600 px-3">
                                    {{ $comment->message }}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
        <div
            class="dark:text-blue-400 px-4 laptopsm:text-3xl font-bold text-orange-500 tablet:text-2xl phone:text-xl mt-8 ms-2">
            Other Related
        </div>
        <div class="mt-9 ms-2 space-x-4 flex ">
            <div
                class="grid laptopsm:grid-cols-5 tablet:grid-cols-4 phone:grid-cols-2 grid-flow-row laptopsm:ps-32 tablet:ps-6 phone:ps-6 laptopsm:gap-y-4 tablet:gap-y-2 phone:gap-y-2 laptopsm:gap-x-4 tablet:gap-x-6 phone:gap-x-3 ">
                @forelse ($relatedMenus as $menu)
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
<script>
    const cmt = document.querySelector('.cmt');
    const opcmt = document.querySelector('.opcmt');
    cmt.addEventListener('click', () => {

        opcmt.style.display = "flex";
    });
</script>
