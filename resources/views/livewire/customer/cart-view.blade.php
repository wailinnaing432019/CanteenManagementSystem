<div class="mt-5">

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
    <div class="gap-4 flex justify-between laptopsm:grid-cols-2  tabletssm:grid-cols-1  phone:grid-cols-1">
        <div
            class="@if ($menus == null) ml-32 me-32 w-[1100px] @else w-2/3 col-span-2 shadow-md sm:rounded-lg m-10 @endif">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mr-3">
                <thead
                    class="laptopsm:text-xl tablet:text-xl text-orange-500 font-bold uppercase bg-slate-700 dark:bg-gray-700 dark:text-gray-400 phone:text-[16px] ">
                    <tr>
                        <th scope="col" class="px-2 py-3">
                            Menu
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Quantity
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Price Per Unit
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @if ($menus != null)
                        @forelse ($menus as $key => $menu)
                            @if ($quantity[$key] > 0)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 phone:text-[14px]">
                                    <td class="px-2 py-4 text-xl">

                                        <a href="{{ url('menus/' . $menu->id) }}">{{ $menu->name }}</a>
                                        <sup class="text-red-500">
                                            @if ($menu->discount != 0)
                                                {{ $menu->discount }} % discount
                                            @endif
                                        </sup>
                                    </td>
                                    <td class="px-2 py-4">
                                        <div
                                            class="bg-slate-50 flex w-3/4 justify-around rounded items-center shadow-md shadow-slate-200">
                                            <span wire:click="decrement({{ $menu->id }})"
                                                class="font-bold hover:scale-150 cursor-pointer"><i class="fa fa-minus"
                                                    aria-hidden="true"></i></span>
                                            <input type="number" disabled class="font-bold w-24 pl-8 hover:scale-125"
                                                value="{{ $quantity[$key] }}" />
                                            <span wire:click="increment({{ $menu->id }})"
                                                class="cursor-pointer font-bold hover:scale-150"><i class="fa fa-plus"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                    </td>

                                    <td class="px-2 py-4">
                                        {{ $menu->price }}
                                    </td>
                                    <td>
                                        <i wire:click="deleteCartItem({{ $menu->id }})"
                                            class="pointer text-orange-500 fa fa-trash" aria-hidden="true"></i>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <div class="">ther is no data</div>
                        @endforelse
                    @else
                        <tr class="text-blue-500 text-xl mt-56 text-center ">
                            <td colspan="3">
                                <h4 class="text-2xl pt-12">You don't have current data yet !
                                    <a href="{{ url('/menus') }}" class="text-red-500">Shop</a>
                                </h4>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        @php
            $count = 0;
        @endphp

        @if ($menus != null)
            <div class="w-1/3 me-3">
                <div class=" bg-slate-200 px-3 laptopsm:text-xl tablet:text-xl text-center" style="heigt:300px">
                    <p class="py-2 text-yellow-300 font-bold">{{ $setting->name }}</p>
                    <span class="block text-base">{{ $setting->address }}</span>
                    <span class="text-base block">{{ $setting->phone }}</span>
                    <div class="flex justify-between text-base">
                        <p>{{ $tableNo }}</p>
                        <p>@auth
                                {{ auth()->user()->name }}
                            @endauth
                        </p>
                    </div>
                    <div class="">
                        <table class="text-sm w-full  mt-3">
                            <thead>
                                <tr>
                                    <th>
                                        Qty
                                    </th>
                                    <th>
                                        Description
                                    </th>
                                    <th>
                                        Ks
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="border-b-2 h-[200px] border-black ">
                                @php
                                    $total = 0.0;
                                @endphp
                                @if ($menus != null)
                                    @forelse ($menus as $key=> $menu)
                                        @if ($quantity[$key] > 0)
                                            <tr class="leading-1 ">
                                                <td>{{ $quantity[$key] }}</td>
                                                <td>{{ $menu->name }} * {{ $menu->price }}</td>
                                                <td>
                                                    @if ($menu->discount == '0')
                                                        {{ $quantity[$key] * $menu->price }}
                                                    @else
                                                        {{ $quantity[$key] * $menu->price - $quantity[$key] * $menu->price * $menu->discount * 0.01 }}
                                                    @endif
                                                </td>
                                                @php
                                                    if ($menu->discount == '0') {
                                                        $total += $quantity[$key] * $menu->price;
                                                    } else {
                                                        $total += $quantity[$key] * $menu->price - $quantity[$key] * $menu->price * $menu->discount * 0.01;
                                                    }
                                                @endphp
                                            </tr>
                                        @endif
                                    @empty
                                    @endif
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr class="font-bold leading-9">
                                    <td colspan="2" class="py-2">Total</td>
                                    <td>{{ $total }}</td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
                <div data-modal-target="leaveNote" data-modal-toggle="leaveNote"
                    class="bg-orange-500 cursor-pointer w-full mt-2 rounded-sm flex justify-center items-center shadow-md shadow-orange-200
                       laptopsm:py-3 tablet:py-3 phone:py-2">
                    <button type="button">Order Now</button>
                </div>
            </div><!-- create purcahse-->
            <div wire:ignore.self style=" " id="leaveNote" tabindex="-1" aria-hidden="true"
                class="fixed h-[600px]  top-10 left-0 right-0 z-50 hidden rounded-lg   p-4  overflow-x-hidden  md:inset-0  ">
                <div
                    class="relative max-w-screen-sm max-w-screen-md max-w-screen-lg max-w-screen-xl max-w-screen-2xl    max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-gray-300 w-[500px] rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl  font-semibold text-gray-900 dark:text-white">
                                Leave Note
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="leaveNote">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="px-2 space-y-1">
                            <div class="row">
                                <div class="p-4   h-full w-full  ">
                                    <form wire:submit.prevent="order">
                                        <div class="grid space-y-10 mx-auto  lg:mt-10 md:mt-10 sm:mt-3"
                                            style=" padding-top: 10px;">
                                            <div class="grid gap-4 grid-cols-1 w-full">
                                                <div class="relative z-0 w-full mb-2 group">

                                                    <label for="message"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                        Something , you want to tell to chefs
                                                    </label>
                                                    <textarea id="message" wire:model='leave_note' rows="4"
                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Optional"></textarea>

                                                    @error('leave_note')
                                                        <p class="text-red-500 text-sm">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                            </div>

                                        </div>
                                        <div class="flex justify-end py-2">
                                            <div
                                                class="mx-4 relative bg-orange-500 py-3 px-5 text-sm font-medium text-center rounded-lg sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300  animate__animated animate__bounce headline">
                                                <button type="submit" class="">
                                                    Confirm
                                                </button>

                                            </div>
                                            <div
                                                class=" relative bg-orange-500 py-3 px-5 text-sm font-medium text-center rounded-lg sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300  animate__animated animate__bounce headline">
                                                <button type="button" data-modal-hide="leaveNote" class="">
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
        @endif

    </div>
</div>
