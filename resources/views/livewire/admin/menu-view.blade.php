<div class="p-4  rounded-lg dark:border-gray-700 h-screen w-full">
    {{-- @include('livewire.admin.menu-edit-modal') --}}
    {{-- back and add menu --}}
    @section('title', 'Menus list')
    <div class="flex justify-between items-center w-full pl-14 ">
        <div class="">
            <a onclick="history.back()"
                class="rounded hover:rounded-lg p-2 w-9 bg-blue-500 dark:bg-slate-700 dark:text-blue-400"><i
                    class="fa fa-reply px-6" aria-hidden="true"></i></a>
        </div>
        <div
            class=" relative bg-orange-500 px-2 flex items-center justify-center text-sm font-medium text-center rounded-lg sm:w-fit focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600  dark:focus:ring-primary-800  headline laptopsm:ms-12 tablet:ms-2 phone:ms-1 laptopsm:w-24 laptopsm:h-10 tablet:w-24 tablet:h-10 phone:w-16 phone:h-8 dark:bg-slate-700 dark:text-blue-400">
            <a href="{{ url('admin/menus/create') }}" class="py-2 w-full">
                <span class="phone:text-[10px] laptopsm:text-[15px] tablet:text-[15px]"> Add New</span>
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
    {{-- Searching Data --}}
    <div class="">
        <div class="flex justify-between items-center w-full pl-14 ">
            <div class=" mb-2">
                <h1 class="text-2xl pb-0 pt-3 text-orange-500 font-bold  dark:text-blue-400">Menu List</h1>
                <span class="text-orange-500  dark:text-blue-400">Total - {{ $menus->total() }}</span>
            </div>
            <div class="w-56">
                <input type="text" wire:model.debounce.200ms="search"
                    class="block rounded-lg py-2 px-0 w-full text-sm text-gray-900 bg-transparent  border-2 border-gray-500 appearance-none dark:text-white dark:border-gray-600  focus:outline-none focus:ring-0 focus:border-orange-500 peer dark:bg-slate-700 dark:focus:border-blue-400"
                    placeholder="Search you want">
            </div>

        </div>
    </div>
    <div class="relative w-full overflow-x-auto  sm:rounded-lg  border shadow-lg dark:border-slate-600">
        <form wire:submit.prevent="deleteSelectedItems">
        <table
            class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-l-8 border-orange-500 dark:border-blue-400">
            <thead class="text-sm text-orange-500  uppercase bg-gray-50 dark:bg-gray-700  dark:text-blue-400">
                <tr class=" border-0 border-b-2 border-orange-700 dark:border-blue-400">
                    <th class="px-6 py-3">
                        <input type="checkbox" wire:model="selectAll">
                    </th>
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
                        <i class="fas fa-sort fs-3" wire:click="sortBy('employee_id')"></i>
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">

                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="text-gray-900 text-sm dark:text-white">
                @forelse ($menus as $menu)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                        <th class="px-6 py-4">

                            <input type="checkbox" wire:model="selectedItems" value="{{ $menu->id }}">

                        </th>
                        <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap ">
                            {{ $menu->name }}
                        </th>
                        <td class="px-6 py-4">
                            @if ($menu->menuImages()->count() > 0)
                                <img src="{{ asset('storage/' . $menu->menuImages[0]->image) }}" class="rounded-lg"
                                    style="width:100px; height:60px;"alt="">
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            {{ $menu->category->name ?? '' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $menu->price }}
                        </td>
                        <td class="px-6 py-4">

                            {{ $menu->MenuCreateUser->name ?? 'admin' }}
                        </td>
                        <td class="px-6 py-4 ">
                            {{ $menu->waiting_time }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($menu->status == '0')
                                <span class="bg-yellow-300 rounded px-2 py-1"> Pending</span>
                            @elseif ($menu->status == '1')
                                <span class="bg-lime-600 rounded px-2 py-1"> Available</span>
                            @else
                                <span class="bg-red-500 rounded px-2 py-1"> UnAvailable</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 dark:text-gray-500">
                            <div class="flex justify-between">
                                <a href="{{ url('admin/menudetail/' . $menu->id) }}"><i class="fa fa-info"></i></a>
                                <a href="{{ url('admin/menus/edit/' . $menu->id) }}"><i class="fa fa-edit"></i></a>
                                <button type="button" wire:click="delete({{ $menu->id }})"
                                    wire:key="menu-{{ $menu->id }}" data-modal-target="deleteMenu"
                                    data-modal-toggle="deleteMenu"><i class="fa fa-trash"
                                        aria-hidden="true"></i></button>
                            </div>

                        </td>
                    </tr>

                @empty
                @endforelse
                <tr>
                    <td colspan="3">
                        @if (count($selectedItems) > 0)
                            <button type="submit"><i class="fa fa-trash fs-4  mx-2 text-red-500"
                                    aria-hidden="true"></i>
                                {{ count($selectedItems) }} selected
                            </button>
                        @endif
                    </td>
                </tr>
            </tbody>

        </table>
        <div wire:ignore.self id="deleteMenu" tabindex="-1"
            class="absolute  right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="deleteMenu">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are
                            you sure
                            you want to delete - <p class="block"> {{ $name }} ?</p>
                        </h3>
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
    </div>
    {{ $menus->links() }}
</div>
