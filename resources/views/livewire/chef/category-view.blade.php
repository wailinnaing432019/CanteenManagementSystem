<div>
    {{-- @include('livewire.chef.chef-modal') --}}

    <!-- create Modal -->
    <div wire:ignore.self style="margin-top:90px;" id="addCategory" tabindex="-1" aria-hidden="true"
        class="fixed mt-9 top-4 left-0 right-0 z-50 hidden w-11/12 p-4 overflow-y-auto overflow-x-hidden  md:inset-0  ">
        <div class="relative max-w-screen-sm max-w-screen-md max-w-screen-lg max-w-screen-xl max-w-screen-2xl    max-h-full"
            style="width:500px; left:50px">
            <!-- Modal content -->
            <div class="relative bg-gray-300  rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Create Category
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="addCategory">
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
                                    <div class="grid gap-4 grid-cols- w-full">
                                        <div class="relative z-0 w-full mb-2 group">
                                            <input type="text" wire:model="name" id="name"
                                                class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('address') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " />
                                            <label for="name"
                                                class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Full
                                                Category Name</label>
                                            @error('name')
                                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="grid gap-4 grid-cols- w-full">
                                        <div class="relative z-0 w-full mb-2 group">
                                            <input type="text" wire:model="description" id="description"
                                                class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('address') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " />
                                            <label for="name"
                                                class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Full
                                                Description</label>
                                            @error('description')
                                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>

                                </div>
                                <div class="flex justify-end py-2">
                                    <div
                                        class="mx-4 relative bg-orange-500 py-3 px-5 text-sm font-medium text-center rounded-lg sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300  animate__animated animate__bounce headline">
                                        <button type="submit" class="">
                                            Create
                                        </button>

                                    </div>
                                    <div
                                        class=" relative bg-orange-500 py-3 px-5 text-sm font-medium text-center rounded-lg sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300  animate__animated animate__bounce headline">
                                        <button type="button" data-modal-hide="addCategory" class="">
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


    <!-- Edit Modal -->
    <div wire:ignore.self style="margin-top:90px;" id="edit" tabindex="-1"
        class="fixed mt-9 top-4 left-0 right-0 z-50 hidden w-11/12 p-4 overflow-y-auto overflow-x-hidden  md:inset-0  ">
        <div class="relative max-w-screen-sm max-w-screen-md max-w-screen-lg max-w-screen-xl max-w-screen-2xl    max-h-full"
            style="width:1100px; left:50px">
            <!-- Modal content -->
            <div class="relative bg-gray-300  rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Edit Employee
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="edit">
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
                            <form wire:submit.prevent="updateCategory" enctype="multipart/form-data">
                                <div class="grid space-y-10 mx-auto shadow-lg lg:mt-10 md:mt-10 sm:mt-3"
                                    style="padding:60px;padding-top: 40px;">
                                    <div class="grid gap-4 grid-cols-2 w-full">
                                        <div class="relative z-0 w-full mb-2 group">
                                            <input type="text" wire:model="name" id="name"
                                                class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('address') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " />
                                            <label for="name"
                                                class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Full
                                                Category Name</label>
                                            @error('name')
                                                <p class="text-red-500 text-sm">
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="grid gap-4 grid-cols-2 w-full">
                                        <div class="relative z-0 w-full mb-2 group">
                                            <input type="text" wire:model="description" id="description"
                                                class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('address') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " />
                                            <label for="name"
                                                class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Full
                                                Description</label>
                                            @error('description')
                                                <p class="text-red-500 text-sm">
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="grid gap-4 grid-cols-2 w-full">
                                        <div class="relative z-0 w-full mb-2 group">
                                            <label for="name" class="block">Check {{ $status }}
                                                if Admit</label>
                                            <input type="checkbox" wire:model="status" id="">


                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-end py-2">
                                    <div
                                        class="mx-4 relative bg-orange-500 py-3 px-5 text-sm font-medium text-center rounded-lg sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300  animate__animated animate__bounce headline">
                                        <button type="submit" data-modal-hide="edit" class="">
                                            Update
                                        </button>

                                    </div>
                                    <div
                                        class=" relative bg-orange-500 py-3 px-5 text-sm font-medium text-center rounded-lg sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300  animate__animated animate__bounce headline">
                                        <button type="button" data-modal-hide="edit" class="">
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


    <!-- Delete employee-->
    <div wire:ignore.self id="deleteMenu" tabindex="-1"
        class="fixed  right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="deleteMenu">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                        Are
                        you sure
                        you want to delete - <span class="block">
                            {{ $name }}?
                        </span> </h3>
                    <button data-modal-hide="deleteMenu" wire:click="destory" type="button"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="deleteMenu" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                        cancel</button>
                </div>
            </div>
        </div>
    </div>
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
    <div class="" id="">
        <div class="flex justify-between items-center w-full pl-14 ">
            <div class="">
                <a onclick="history.back()" class="rounded hover:rounded-lg p-2 w-9 bg-orange-500"><i
                        class="fa fa-reply px-6" aria-hidden="true"></i></a>
            </div>
            <div class=" relative bg-orange-500 px-2 flex items-center justify-center text-sm font-medium text-center rounded-lg sm:w-fit focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600  dark:focus:ring-primary-800  headline laptopsm:ms-12 tablet:ms-2 phone:ms-1 laptopsm:w-24 laptopsm:h-10 tablet:w-24 tablet:h-10 phone:w-16 phone:h-8"
                data-modal-show="addCategory" data-modal-toggle="addCategory">
                <button type="submit" class="py-2 w-full">
                    <span class="phone:text-[10px] laptopsm:text-[15px] tablet:text-[15px] "> Add
                        New</span>
                </button>
            </div>
        </div>

        <div class="">
            <div class="flex justify-between items-center w-full pl-14 ">
                <div class="">
                    <h1 class="text-2xl pb-5 pt-3 text-orange-600">Category List</h1>
                </div>
                <div class="w-56">
                    <input type="text" wire:model.debounce.200ms="search"
                        class="block rounded-lg py-2 px-0 w-full text-sm text-gray-900 bg-transparent  border-2 border-gray-500 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-orange-500 peer"
                        placeholder="Search you want">
                </div>

            </div>
        </div>
    </div>
    {{-- showing data --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-10 mt-14">
        <form wire:submit.prevent="deleteSelectedItems">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">
                            <input type="checkbox" wire:model="selectAll">
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <i class="fas fa-sort fs-3" wire:click="sortBy('name')"></i>
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <i class="fas fa-sort fs-3" wire:click="sortBy('description')"></i>
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <i class="fas fa-sort fs-3" wire:click="sortBy('status')"></i>
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <i class="fas fa-sort fs-3" wire:click="sortBy('employee_id')"></i>
                            Created By
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th class="px-6 py-3">
                                @if (
                                    $category->employee_id ==
                                        auth()->guard('staff')->user()->id)
                                    <input type="checkbox" wire:model="selectedItems" value="{{ $category->id }}">
                                @endif
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $category->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $category->description }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($category->status == 0)
                                    Pending
                                @else
                                    Approved
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{ $category->categoryCreateUser->name }}
                            </td>
                            @php
                                $pop = '';
                                if (
                                    !$category->employee_id ==
                                    auth()
                                        ->guard('staff')
                                        ->user()->id
                                ) {
                                    $pop = 'popup-modal-' . $category->id;
                                    // $editing = 'edit-' . $category->id;
                                }
                                
                            @endphp
                            <td class="px-6 py-4">
                                @if (
                                    $category->employee_id ==
                                        auth()->guard('staff')->user()->id)
                                    <button type="button" wire:click="storeId({{ $category->id }})"
                                        data-modal-show="edit" data-modal-toggle="edit"><i class="fa fa-edit"
                                            aria-hidden="true"></i></button>
                                    <button type="button" wire:click="storeId({{ $category->id }})"
                                        data-modal-target="deleteMenu" data-modal-toggle="deleteMenu"><i
                                            class="fa fa-trash" aria-hidden="true"></i></button>
                                @endif
                            </td>
                        </tr>
                        <!-- Delete employee-->
                        {{-- <div id="{{ $pop }}" tabindex="-1"
                                class="absolute  right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="{{ $pop }}">
                                            <svg class="w-3 h-3" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-6 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are
                                                you sure
                                                you want to delete - {{ $category->name }}?</h3>
                                            <button data-modal-hide="{{ $pop }}"
                                                wire:click="destory({{ $category->id }})" type="button"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Yes, I'm sure
                                            </button>
                                            <button data-modal-hide="{{ $pop }}" type="button"
                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                                cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}


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
        </form>

        {{-- {{ $categories->links() }} --}}
    </div>


    @push('scripts')
        <script src="../path/to/flowbite/dist/flowbite.min.js"></script>

        <script>
            window.addEventListener('close-modal', event => {
                // console.log("HELL");
                // $('#addCategory').modal('hide');
                // $('#updateBrandModal').modal('hide');
                // $('#deleteBrandModal').modal('hide');

            });
            window.addEventListener('open-modal', function(e) {
                alert("open");
                // $('.hidden').style.display = "grid";
                $('#le').html();
                // $('#updateBrandModal').modal('hide');
                // $('#deleteBrandModal').modal('hide');

            });
        </script>
    @endpush
