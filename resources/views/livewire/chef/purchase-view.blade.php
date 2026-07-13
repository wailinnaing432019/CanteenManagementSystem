<div>
    <div class="">
        <div class="flex justify-end items-right w-full pl-14 ">

            @if (!$isButtonDisabled)
                <div @if ($isButtonDisabled) disabled @endif
                    class=" relative bg-orange-500 px-2 flex items-center justify-center text-sm font-medium text-center rounded-lg sm:w-fit focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600  dark:focus:ring-primary-800  headline laptopsm:ms-12 tablet:ms-2 phone:ms-1 laptopsm:w-24 laptopsm:h-10 tablet:w-24 tablet:h-10 phone:w-16 phone:h-8"
                    data-modal-target="addPurchase" data-modal-toggle="addPurchase">
                    <button type="submit" class="py-2 w-full">
                        <span class="phone:text-[10px] laptopsm:text-[15px] tablet:text-[15px]"> Add New</span>
                    </button>
                </div>
            @else
                <div class="">
                    Order Time is From 04:00 PM to next morning at 07:00 AM
                    <small class="text-red-500 text-sm">
                        <p id="current-time">Current time: {{ now()->timezone('Asia/Yangon')->format('H:i') }}</p>
                    </small>
                </div>
            @endif
        </div>

        {{-- <div class="">
            <div class="flex justify-between items-center w-full pl-14 ">
                <div class="">
                    <h1 class="text-2xl pb-5 pt-3 text-orange-600">Purchase Order</h1>
                </div>
                <div class="w-56">
                    <input type="text" wire:model.debounce.200ms="search"
                        class="block rounded-lg py-2 px-0 w-full text-sm text-gray-900 bg-transparent  border-2 border-gray-500 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-orange-500 peer"
                        placeholder="Search you want">
                </div>

            </div>
        </div> --}}
    </div>
    <!-- create purcahse-->
    <div wire:ignore.self style=" " id="addPurchase" tabindex="-1" aria-hidden="true"
        class="relative -mt-28 top-0 left-0 right-0 z-50 hidden   p-4  overflow-x-hidden  md:inset-0  ">
        <div
            class="relative max-w-screen-sm max-w-screen-md max-w-screen-lg max-w-screen-xl max-w-screen-2xl    max-h-full">
            <!-- Modal content -->
            <div class="fixed bg-gray-300 w-[500px] rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Add Order Product
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="addPurchase">
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
                        <div class="p-4   h-full w-full  ">
                            <form wire:submit.prevent="add">
                                <div class="grid space-y-10 mx-auto  lg:mt-10 md:mt-10 sm:mt-3"
                                    style=" padding-top: 40px;">
                                    <div class="grid gap-4 grid-cols-1 w-full">
                                        <div class="relative z-0 w-full mb-2 group">
                                            <input type="text" wire:model="product_name" id="product_name"
                                                class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('address') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " />
                                            <label for="product_name"
                                                class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                                Product Name</label>
                                            @error('product_name')
                                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="grid gap-4 grid-cols-1 w-full">
                                        <div class="relative z-0 w-full mb-2 group">
                                            <input type="text" wire:model="quantity" id="quantity"
                                                class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('address') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " />
                                            <label for="name"
                                                class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                                Quantity</label>
                                            @error('quantity')
                                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="grid gap-4 grid-cols-1 w-full">
                                        <div class="relative z-0 w-full mb-2 group">
                                            <input type="text" wire:model="small_description" id="small_description"
                                                class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('address') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " />
                                            <label for="name"
                                                class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                                Small Description</label>
                                            @error('small_description')
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
                                        <button type="button" data-modal-hide="addPurchase" class="">
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
    <!-- view purchase -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-10 mt-14">
        <form wire:submit.prevent="deleteSelectedItems">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        @if ($purchase->count() > 0)
                            <th class="px-6 py-3">
                                <input type="checkbox" wire:model="selectAll">
                            </th>
                        @endif
                        <th scope="col" class="px-6 py-3">
                            <i class="fas fa-sort fs-3" wire:click="sortBy('product_name')"></i>
                            Product Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <i class="fas fa-sort fs-3" wire:click="sortBy('quantity')"></i>
                            Quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <i class="fas fa-sort fs-3" wire:click="sortBy('status')"></i>
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <i class="fas fa-sort fs-3" wire:click="sortBy('small_description')"></i>
                            Small Description
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @if ($purchase)
                        @forelse ($purchase as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th class="px-6 py-3">
                                    @if (
                                        $item->employee_id ==
                                            auth()->guard('staff')->user()->id)
                                        <input type="checkbox" wire:model="selectedItems"
                                            value="{{ $item->id }}">
                                    @endif

                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->product_name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $item->quantity }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $item->status === 0 ? 'pending' : 'approved' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->small_description }}
                                </td>
                            </tr>


                        @empty
                            @if (!$isButtonDisabled)
                                <tr class="p-4 text-red-500 text-xl">
                                    <td class="py-5 text-center" colspan="5">No Purchase Order , Full Inventory ?
                                        Or
                                        OrderNow
                                    </td>
                                </tr>
                            @else
                                <tr class="p-4 text-red-500 text-xl">
                                    <td class="py-5 text-center" colspan="5">You can't order right now !
                                    </td>
                                </tr>
                            @endif
                        @endforelse
                    @else
                        @if (!$isButtonDisabled)
                            <tr>
                                <td colspan="3">No Purchase Order , Full Inventory ? Or OrderNow</td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="3">You can't order right now !</td>
                            </tr>
                        @endif
                    @endif

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
</div>
@push('scripts')
    <script>
        function updateMyanmarTime() {
            var currentTime = new Date().toLocaleTimeString([], {
                timeZone: 'Asia/Yangon',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
            document.getElementById('current-time').innerText = 'Current time: ' + currentTime;
        }

        updateMyanmarTime(); // Update immediately
        setInterval(updateMyanmarTime, 1000); // Update every second
    </script>
@endpush
