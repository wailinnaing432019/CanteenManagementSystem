<!-- Main modal -->
<div wire:ignore.self style="margin-top:90px;" id="authentication-modal" tabindex="-1" aria-hidden="true"
    class="absolute mt-9 top-4 left-0 right-0 z-50 hidden w-11/12 p-4 overflow-y-auto overflow-x-hidden  md:inset-0  ">
    <div class="relative max-w-screen-sm max-w-screen-md max-w-screen-lg max-w-screen-xl max-w-screen-2xl    max-h-full"
        style="width:1100px; left:50px">
        <!-- Modal content -->
        <div class="relative bg-gray-300  rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Employee
                </h3>
                <button type="button" wire:click="closeModal"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="authentication-modal">
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
                        <form wire:submit.prevent="updateEmployee" enctype="multipart/form-data">
                            <div class="grid space-y-10 mx-auto shadow-lg lg:mt-10 md:mt-10 sm:mt-3"
                                style="padding:60px;padding-top: 40px;">
                                <div class="grid gap-4 grid-cols-2 w-full">
                                    @if ($dbImage)
                                        <div class="basis-1/2">
                                            <p class="text-gray-500 py-2">
                                                Current Profile
                                            </p>
                                            <img class="rounded-lg ml-4" src="{{ asset('storage/' . $dbImage) }}"
                                                width="150px;" height="100px;" alt=" no image ">
                                        </div>
                                    @endif
                                    @if ($image)
                                        <div class="basis-1/2">
                                            <p>
                                                Preview Image
                                            </p>
                                            <img class="rounded-lg" src="{{ $image->temporaryUrl() }}"
                                                alt="Preview Image" width="150px;" height="100px">
                                        </div>
                                    @endif
                                    @error('image')
                                        <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="relative z-0 w-full mb-2 group">
                                    <input type="file" wire:model.debounce.200ms="image" id="image"
                                        class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('name') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " />
                                    <label for="image"
                                        class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Full
                                        Choose Image</label>
                                    @error('name')
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
                                                class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Full
                                                Name</label>
                                            @error('name')
                                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="basis-1/2">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="email" wire:model="email" id="email"
                                                class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('email') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " />
                                            <label for="email"
                                                class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email
                                                address</label>
                                            @error('email')
                                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="grid gap-4 grid-cols-2 w-full">
                                    <div class="relative z-0 w-full mb-2 group">
                                        <input type="text" wire:model="address" id="address"
                                            class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('address') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " />
                                        <label for="address"
                                            class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Full
                                            Address</label>
                                        @error('address')
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="tel" wire:model="phone" id="phone"
                                            class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('phone') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " />
                                        <label for="phone"
                                            class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone
                                            Number</label>
                                        @error('phone')
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="relative z-0 w-full mb-6 group">
                                    <select type="text" wire:model="role_as" id="role_as"
                                        class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('role_as') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" ">
                                        {{-- <option value="">Choose Position</option> --}}
                                        <option value="admin" @if ($role_as == 'admin') selected @endif>Admin
                                        </option>
                                        <option value="chef" @if ($role_as == 'chef') selected @endif>Chef
                                        </option>
                                        <option value="purchaser" @if ($role_as == 'purchaser') selected @endif>
                                            Purchaser</option>
                                    </select>
                                    <label for="role_as"
                                        class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Select
                                        Position</label>
                                    @error('role_as')
                                        <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="time" wire:model="start_time" id="start_time"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300  @error('phone') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " />
                                        <label for="start_time"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Start
                                            Time</label>
                                        @error('start_time')
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="time" wire:model="end_time" id="end_time"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300  @error('phone') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " />
                                        <label for="end_time"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">End
                                            Time</label>
                                        @error('end_time')
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end py-2">
                                <div
                                    class="mx-4 relative bg-orange-500 py-3 px-5 text-sm font-medium text-center rounded-lg sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300  animate__animated animate__bounce headline">
                                    <button type="submit" data-modal-hide="authentication-modal" class="">
                                        Update
                                    </button>

                                </div>
                                <div
                                    class=" relative bg-orange-500 py-3 px-5 text-sm font-medium text-center rounded-lg sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300  animate__animated animate__bounce headline">
                                    <button type="button" data-modal-hide="authentication-modal"
                                        wire:click="closeModal" class="">
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
