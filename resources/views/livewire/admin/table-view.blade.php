<div wire:key="sortBy('status')">
    @section('title', 'Tables ')
    <div class="flex justify-between items-center">
        <div class="ms-4 mb-2">
            <h1 class="text-2xl pb-0 pt-3 text-orange-500 font-bold dark:text-blue-400">Table List</h1>
            <span class="text-orange-500 dark:text-blue-400">Total - {{ $tables->count() }}</span>
        </div>
        <div
            class="  bg-orange-500 py-2 px-5 text-sm font-medium text-center rounded-lg sm:w-fit focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600  dark:focus:ring-primary-800  headline dark:bg-gray-700 dark:text-blue-400">
            <a href="{{ url('admin/tables/create') }}" class="">
                Add New Table
            </a>
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
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-10 ">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead
                class="text-xs text-gray-700  uppercase bg-gray-50 dark:bg-gray-700 dark:text-blue-400              ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <i class="fas fa-sort fs-3" wire:click="sortBy('table_no')"></i>
                        Table No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>

                    <th scope="col" class="px-6 py-3">
                        <i class="fas fa-sort fs-3" wire:click="sortBy('status')"></i>
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <i class="fas fa-sort fs-3" wire:click="sortBy('description')"></i>
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                        <span class="sr-only">Action</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tables as $table)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700   laptopsm:text-[15px] tablet:text-[15px] phone:text-[12px]">
                        <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                            {{ $table->table_no }}
                        </td>
                        <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                            <img src="{{ asset('storage/' . $table->image) }}" alt=""
                                class="laptopsm:w-40 rounded laptopsm:h-20 tablet:w-28 tablet:h-12 phone:w-16 phone:h-8">
                        </td>

                        <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                            {{ $table->status == 0 ? 'Unavailable' : 'Available' }}
                        </td>
                        <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                            {{ $table->description }}
                        </td>
                        <td
                            class="laptopsm:px-6 laptopsm:py-4 flex tablet:px-4 tablet:py-3 phone:px-1 phone:py-1 text-right items-center ">
                            <a href="{{ url('admin/tables/edit/' . $table->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <i class="fa fa-edit px-2 text-lg  hover:text-orange-500 text-black dark:text-gray-500 w-1/2"
                                    aria-hidden="true"></i>
                            </a>
                            {{-- <a href="{{ url('admin/tables/edit/' . $table->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <i class="fa fa-trash px-2 text-lg hover:text-orange-500 text-black w-1/2"
                                    aria-hidden="true"></i>
                            </a> --}}
                            <button type="button" wire:click="delete({{ $table->id }})" wire:loading.attr="disabled"
                                data-modal-target="deleteTable" data-modal-toggle="deleteTable"
                                class="font-medium ms-4 text-blue-600 dark:text-blue-500 hover:underline">
                                <i class="fa fa-trash px-2 text-lg  hover:text-orange-500 text-black dark:text-gray-500 w-1/2"
                                    aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
        <div class="">
            {{ $tables->links() }}
        </div>
    </div>
    <!-- Delete Menu-->
    {{-- <div wire:ignore.self id="deleteTable" tabindex="-1"
        class="absolute  right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="deleteTable">
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
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are
                        you sure
                        you want to delete - <p class="block"> {{ $table_no }} ?</p>
                    </h3>
                    <button wire:click="destroy" data-modal-hide="deleteTable" type="button"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="deleteTable" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                        cancel</button>
                </div>
            </div>
        </div>
    </div> --}}
</div>
