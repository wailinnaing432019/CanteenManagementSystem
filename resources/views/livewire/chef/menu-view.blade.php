<div class="row">
    @include('livewire.chef.chef-menu-modal')
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
    <div class="">
        {{-- back and add menu --}}
        <div class="flex justify-between items-center w-full pl-14 ">
            <div class="">
                <a onclick="history.back()" class="rounded hover:rounded-lg p-2 w-9 bg-blue-500"><i
                        class="fa fa-reply px-6" aria-hidden="true"></i></a>
            </div>
            <div class=" relative bg-orange-500 px-2 flex items-center justify-center text-sm font-medium text-center rounded-lg sm:w-fit focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600  dark:focus:ring-primary-800  headline laptopsm:ms-12 tablet:ms-2 phone:ms-1 laptopsm:w-24 laptopsm:h-10 tablet:w-24 tablet:h-10 phone:w-16 phone:h-8"
                data-modal-target="addMenu" data-modal-toggle="addMenu">
                <button type="submit" class="py-2 w-full">
                    <span class="phone:text-[10px] laptopsm:text-[15px] tablet:text-[15px]"> Add New</span>
                </button>
            </div>
        </div>


        {{-- Searching Data --}}
        <div class="">
            <div class="flex justify-between items-center w-full pl-14 ">
                <div class="">
                    <h1 class="text-2xl pb-5 pt-3 text-orange-600">My Menus</h1>
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
                            <th>
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
                                <i class="fas fa-sort fs-3" wire:click="sortBy('description')"></i>
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <i class="fas fa-sort fs-3" wire:click="sortBy('status')"></i>
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">

                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($menus as $menu)
                            @if (
                                $menu->employee_id ==
                                    auth()->guard('staff')->user()->id)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th>

                                        <input type="checkbox" wire:model="selectedItems" value="{{ $menu->id }}">

                                    </th>
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
                                    <td class="px-6 py-4">
                                        @if (
                                            $menu->employee_id ==
                                                auth()->guard('staff')->user()->id)
                                            <button type="button" wire:click="edit({{ $menu->id }})"
                                                data-modal-target="editMenu" data-modal-toggle="editMenu"><i
                                                    class="fa fa-edit" aria-hidden="true"></i></button>
                                            <button type="button" wire:click="delete({{ $menu->id }})"
                                                data-modal-target="deleteMenu" data-modal-toggle="deleteMenu"><i
                                                    class="fa fa-trash" aria-hidden="true"></i></button>
                                        @endif
                                    </td>
                                </tr>
                            @endif
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
