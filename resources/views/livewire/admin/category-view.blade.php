<div>
    @section('title', 'Category List')
    @include('livewire.chef.chef-modal')
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
    <div class="p-4  rounded-lg h-full  bg-slate">
        <div class=" tablet:grid-cols-5 phone:grid-cols-4 mt-4">
            <div class="flex justify-between items-center w-full pl-14 ">
                <div class="">
                    <a onclick="history.back()"
                        class="rounded hover:rounded-lg p-2 w-9 bg-blue-500 dark:bg-slate-700 dark:text-blue-400"><i
                            class="fa fa-reply px-6" aria-hidden="true"></i></a>
                </div>
                <div class=" relative bg-orange-500 px-2 flex items-center justify-center text-sm font-medium text-center rounded-lg sm:w-fit focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600  dark:focus:ring-primary-800  headline laptopsm:ms-12 tablet:ms-2 phone:ms-1 laptopsm:w-24 laptopsm:h-10 tablet:w-24 tablet:h-10 phone:w-16 phone:h-8 dark:bg-slate-700 dark:text-blue-400"
                    data-modal-target="addCategory" data-modal-toggle="addCategory">
                    <button type="submit" class="py-2 w-full ">
                        <span class="phone:text-[10px] laptopsm:text-[15px] tablet:text-[15px]"> Add New</span>
                    </button>
                </div>
            </div>

            <div class="">
                <div class="flex justify-between items-center w-full pl-14 ">
                    <div class=" mb-2">
                        <h1 class="text-2xl pb-0 pt-3 text-orange-500 dark:text-blue-400  font-bold">Category List</h1>
                        <span class="text-orange-500 dark:text-blue-400">Total - {{ $categories->total() }}</span>
                    </div>
                    <div class="w-56">
                        <input type="text" wire:model.debounce.200ms="search"
                            class="block rounded-lg py-2 px-0 w-full text-sm text-gray-900 bg-transparent  border-2 border-gray-500 appearance-none dark:text-white dark:border-gray-600 dark:bg-slate-700 dark:focus:border-blue-400 focus:outline-none focus:ring-0 focus:border-orange-500 peer"
                            placeholder="Search you want">
                    </div>

                </div>
            </div>

            {{-- showing data --}}
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-10 mt-14 z-20">

                <div class="relative overflow-x-auto">
                    <form wire:submit.prevent="deleteSelectedItems">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-blue-400">
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
                                        <th class="px-6 py-4">
                                            <input type="checkbox" wire:model="selectedItems"
                                                value="{{ $category->id }}">
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
                                                Admit
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ auth()->guard('staff')->user()->name }}
                                            {{-- {{ $category->categoryCreateUser->id }} he --}}
                                        </td>
                                        <td class="px-6 py-4">

                                            <button type="button" wire:click="storeId({{ $category->id }})"
                                                data-modal-target="authentication-modal"
                                                data-modal-toggle="authentication-modal"><i class="fa fa-edit"
                                                    aria-hidden="true"></i></button>
                                            <button type="button" wire:click="storeId({{ $category->id }})"
                                                data-modal-target="deleteMenu" data-modal-toggle="deleteMenu"><i
                                                    class="fa fa-trash" aria-hidden="true"></i></button>

                                        </td>
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
                        {{ $categories->links() }}

                </div>
            </div>


        </div>
    </div>

    @push('scripts')
        {{-- <script>
            let my = document.querySelector(".myclick");
            let other = document.querySelector(".otherclick");
            let m = document.querySelector("#my");
            let o = document.querySelector("#other");
            document.querySelector(".myclick").addEventListener('click', function() {
                o.style.display = "block";
                m.style.display = "block";
            })
            other.addEventListener('click', function() {
                m.style.display = "none";
                o.style.display = "grid";
            })
        </script> --}}
        {{-- <script>
            window.addEventListener('close-modal', event => {
                console.log("HELL");
                $('#addCategory').modal('hide');
                $('#updateBrandModal').modal('hide');
                $('#deleteBrandModal').modal('hide');

            });
        </script> --}}
    @endpush
