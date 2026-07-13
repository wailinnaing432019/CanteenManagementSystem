<div class="row">
    <!-- Menu Create -->
    <div wire:ignore.self style="margin-top:90px;" id="addMenu" tabindex="-1" aria-hidden="true"
        class="fixed mt-9 top-4 left-0 right-0 z-50 hidden w-11/12 p-4  overflow-x-hidden  md:inset-0  ">
        <div class="relative max-w-screen-sm max-w-screen-md max-w-screen-lg max-w-screen-xl max-w-screen-2xl    max-h-full"
            style="width:1100px; left:50px">
            <!-- Modal content -->
            <div class="relative bg-gray-300  rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Create Menu
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="addMenu">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <div class="row">
                        <div class="p-4  rounded-lg h-full  bg-slate">
                            <form wire:submit.prevent="add" enctype="multipart/form-data">
                                <div class="grid space-y-10 mx-auto shadow-lg lg:mt-10 md:mt-10 sm:mt-3"
                                    style="padding:60px;padding-top: 40px;">

                                    @if ($image)
                                        <p>
                                            Preview Image
                                        </p>
                                        <div class="columns-3">
                                            @foreach ($image as $item)
                                                <img class="w-full aspect-video" src="{{ $item->temporaryUrl() }}"
                                                    alt="Preview Image" style="max-width: 200px;">
                                            @endforeach
                                        </div>
                                    @endif

                                    <div class="relative z-0 w-full mb-2 group">
                                        <input type="file" wire:model.prevent.debounce.200ms="image" multiple
                                            id="image"
                                            class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('name') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " />
                                        <label for="image"
                                            class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Full
                                            Choose Image</label>
                                        @error('image')
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="relative z-0 w-full mb-6 group">
                                        <select type="text" wire:model="category_id" id="category_id"
                                            class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('category_id') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" ">
                                            <option value="">Choose Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="role_as"
                                            class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Select
                                            Category</label>
                                        @error('category_id')
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="grid gap-4 grid-cols-2 w-full">
                                        <div class="basis-1/2">
                                            <div class="relative z-0 w-full mb-2 group">
                                                <input type="text" wire:model="name" id="name"
                                                    class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('name') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                    placeholder=" " />
                                                <label for="name"
                                                    class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Menu
                                                    Name</label>
                                                @error('name')
                                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="basis-1/2">
                                            <div class="relative z-0 w-full mb-6 group">
                                                <input type="text" wire:model="price" id="price"
                                                    class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('price') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                    placeholder=" " />
                                                <label for="price"
                                                    class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Price
                                                </label>
                                                @error('price')
                                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid gap-4 grid-cols-2 w-full">
                                        <div class="relative z-0 w-full mb-2 group">
                                            <input type="text" wire:model="waiting_time" id="waiting_time"
                                                class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('waiting_time') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " />
                                            <label for="waiting_time"
                                                class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                                Waiting_time</label>
                                            @error('waiting_time')
                                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="tel" wire:model="description" id="description"
                                                class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('description') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " />
                                            <label for="description"
                                                class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description
                                            </label>
                                            @error('description')
                                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>


                                </div>
                                <div class="flex justify-end py-2">
                                    <div
                                        class="mx-4 relative bg-orange-500 py-3 px-5 text-sm font-medium text-center rounded-lg sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300  animate__animated animate__bounce headline">
                                        <button type="submit" data-modal-hide="addMenu" class="">
                                            Create
                                        </button>

                                    </div>
                                    <div
                                        class=" relative bg-orange-500 py-3 px-5 text-sm font-medium text-center rounded-lg sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300  animate__animated animate__bounce headline">
                                        <button type="button" data-modal-hide="addMenu" class="">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
    @if (Session::has('success'))
        <p>{{ Session::get('success') }}</p>
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
    <div class="">



        {{-- Searching Data --}}
        <div class="">
            <div class="flex justify-between items-center w-full pl-14 ">
                <div class="">
                    <h1 class="text-2xl pb-5 pt-3 text-orange-600">All Menus</h1>
                </div>
                <div class="w-56">
                    <input type="text" wire:model.debounce.200ms="search"
                        class="block rounded-lg py-2 px-0 w-full text-sm text-gray-900 bg-transparent  border-2 border-gray-500 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-orange-500 peer"
                        placeholder="Search you want">
                </div>

            </div>
        </div>
        {{-- <div
            class="text-sm mx-auto font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px">
                <li class="mr-2">
                    <a href="#my"
                        class="myclick inline-block active p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">My
                        Menu</a>
                </li>
                <li class="mr-2">
                    <a href="#other"
                        class="otherclick inline-block p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500"
                        aria-current="page">Other</a>
                </li>

            </ul>
        </div> --}}
    </div>
    <div class=" relative grid grid-flow-row laptopsm:grid-cols-5 tablet:grid-cols-5 phone:grid-cols-4 mt-4">

        <div id="my" class=" overflow-x-auto shadow-md sm:rounded-lg absolute w-full  dark:bg-gray-700">

            <form wire:submit.prevent="deleteSelectedItems">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <i class="fas fa-sort fs-3" wire:click="sortBy('name')"></i>
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <i class="fas fa-sort fs-3" wire:click="sortBy('status')"></i>
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <i class="fas fa-sort fs-3" wire:click="sortBy('price')"></i>
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <i class="fas fa-sort fs-3" wire:click="sortBy('employee_id')"></i>
                                Created By
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <i class="fas fa-sort fs-3" wire:click="sortBy('waiting_time')"></i>
                                Waiting Time
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <i class="fas fa-sort fs-3" wire:click="sortBy('description')"></i>
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($menus as $menu)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $menu->name }}
                                </th>
                                <td class="px-6 py-4">
                                    @if ($menu->menuImages()->count() > 0)
                                        <img src="{{ asset('storage/' . $menu->menuImages[0]->image) }}"
                                            style="width:150px; height:50px" alt="">
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{ $menu->category->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $menu->price }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $menu->MenuCreateUser->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $menu->waiting_time }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $menu->description }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($menu->status == '0')
                                        Pending
                                    @elseif ($menu->status == '1')
                                        Available
                                    @else
                                        Unavailable
                                    @endif
                                </td>
                                @php
                                    $pop = '';
                                    if (
                                        !$menu->employee_id ==
                                        auth()
                                            ->guard('staff')
                                            ->user()->id
                                    ) {
                                        $pop = 'popup-modal-' . $category->id;
                                        // $editing = 'edit-' . $category->id;
                                    }
                                    
                                @endphp

                            </tr>
                        @empty
                        @endforelse
                        <tr>
                            <td colspan="3">
                                @if (count($selectedItems) > 0)
                                    <button type="submit"><i class="fa fa-trash fs-4  text-red-500"
                                            aria-hidden="true"></i>
                                        {{ count($selectedItems) }} selected
                                    </button>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                {{ $menus->links() }}

            </form>
        </div>

    </div>
</div>
