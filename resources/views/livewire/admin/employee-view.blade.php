<div class="">
    @include('livewire.admin.employee-modal')

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
    @section('title', 'Employee List')
    <div class="w-full">
        <div class="flex justify-between items-center w-full ">
            <div class="ps-2 mb-2">
                <h1 class="text-2xl pb-0 pt-3 text-orange-500 font-bold dark:text-blue-400">Employee List</h1>
                <span class="text-orange-500 dark:text-blue-400">Total - {{ $employees->count() }}</span>
            </div>
            <div class="flex justify-between">
                <div class="mr-4 w-44">
                    <select wire:model.prevent.debounce.200ms="position"
                        class="block rounded-lg py-2 px-1 w-full text-sm text-gray-900 bg-transparent  border-2 border-gray-500 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-400 focus:outline-none focus:ring-0 focus:border-orange-500 peer dark:bg-slate-700"
                        id="">
                        <option value="">All</option>
                        <option value="admin">Admin</option>
                        <option value="chef">Chef</option>
                        <option value="purchaser">Purchaser</option>
                    </select>
                </div>
                <div class="w-56">
                    <input type="text" wire:model.debounce.300ms="search"
                        class="block rounded-lg py-2 px-1 w-full text-sm text-gray-900 bg-transparent  border-2 border-gray-500 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-400  focus:outline-none focus:ring-0 focus:border-orange-500 peer dark:bg-slate-700"
                        placeholder="Search you want">
                </div>
            </div>

        </div>
    </div>
    <div class=" overflow-x-auto shadow-md sm:rounded-lg w-full  dark:bg-gray-700 mt-5">
        <table class="w-full text-sm text-left  border-l-8 border-orange-500 dark:border-blue-400 ">
            <thead class="text-sm text-orange-500 dark:text-blue-400 uppercase  ">
                <tr class=" border-b-2 border-orange-500 dark:border-blue-400">
                    <th class="px-6 py-3">
                        <input type="checkbox" wire:model="selectAll">
                    </th>
                    {{-- <th scope="col" class="px-6 py-3">
                        No
                    </th> --}}
                    <th scope="col" class="px-6 py-3 ">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        <i class="fas fa-sort fs-3" wire:click="sortBy('name')"></i>
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        <i class="fas fa-sort fs-3" wire:click="sortBy('email')"></i>
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        <i class="fas fa-sort fs-3" wire:click="sortBy('phone')"></i>
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        <i class="fas fa-sort fs-3" wire:click="sortBy('role_as')"></i>
                        Position
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 1;
                @endphp
                @forelse ($employees as $employee)
                    <tr
                        class="bg-white dark:bg-gray-800 dark:text-white border-b hover:bg-gray-50 laptopsm:text-[15px] tablet:text-[15px] phone:text-[12px] text-center">

                        <th class="px-6 py-4">
                            @if (
                                $employee->id !=
                                    auth()->guard('staff')->user()->id)
                                <input type="checkbox" wire:model="selectedItems" value="{{ $employee->id }}">
                            @endif
                        </th>
                        {{-- <td>{{ $count }}</td> --}}
                        @php
                            $count++;
                        @endphp

                        <th scope="row"
                            class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1 font-medium text-gray-900 whitespace-nowrap">

                            <img src="{{ asset('storage/' . $employee->image) }}" alt="no img"
                                class="laptopsm:w-20 laptopsm:h-16 tablet:w-28 tablet:h-12 phone:w-16 phone:h-8">
                        </th>
                        <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                            {{ $employee->name }}
                        </td>
                        <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                            {{ $employee->email }}
                        </td>
                        <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                            {{ $employee->phone }}
                        </td>
                        <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                            {{ $employee->role_as }}
                        </td>
                        @php
                            $pop = 'popup-modal-' . $employee->id;
                        @endphp
                        <td
                            class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1 text-right">
                            <!-- Modal Header -->
                            {{-- <button type="button" data-modal-target="authentication-modal"
                                data-modal-toggle="authentication-modal" wire:click="edit({{ $employee->id }})"
                                class="font-medium text-blue-600 hover:underline"><i class="fas fa-edit"
                                    aria-hidden="true"></i>
                            </button> --}}
                            @if (
                                $employee->id !=
                                    auth()->guard('staff')->user()->id)
                                <div class="flex justify-between">
                                    <a href="{{ url('admin/employeedetail/' . $employee->id) }}"
                                        class="font-medium text-orange-500 dark:text-gray-400 mx-2 text-xl"><i
                                            class="fa fa-info"></i></a>
                                    <a href="{{ url('admin/employees/edit/' . $employee->id) }}"
                                        class="font-medium text-orange-500 dark:text-gray-400 mx-2 text-xl"><i
                                            class="fa fa-edit"></i></a>

                                    <button data-modal-target="{{ $pop }}"
                                        data-modal-toggle="{{ $pop }}"
                                        class="font-medium text-red-600 dark:text-gray-400 hover:underline mx-2 text-xl"><i
                                            class="fas fa-trash" aria-hidden="true"></i>
                                    </button>
                                </div>
                            @endif

                        </td>

                    </tr>
                    <!-- Delete employee-->
                    <div id="{{ $pop }}" tabindex="-1"
                        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="{{ $pop }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-6 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure
                                        you want to delete - {{ $employee->name }}?</h3>
                                    <button data-modal-hide="{{ $pop }}"
                                        wire:click="destory({{ $employee->id }})" type="button"
                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                        Yes, I'm sure
                                    </button>
                                    <button data-modal-hide="{{ $pop }}" type="button"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                        cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
                <tr>
                    <td colspan="3">
                        @if (count($selectedItems) > 0)
                            <button type="submit"><i class="fa fa-trash fs-4  text-red-500" aria-hidden="true"></i>
                                {{ count($selectedItems) }} selected
                            </button>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
    <div class="dark:text-blue-400">
        {{ $employees->links() }}
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
