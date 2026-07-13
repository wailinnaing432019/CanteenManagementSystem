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
                                <div class="grid gap-4 grid-cols-1 w-full">
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
                                <div class="grid gap-4 grid-cols-1 w-full">
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
                                    class="mx-4 relative bg-orange-500 dark:bg-slate-800 dark:text-blue-400 py-3 px-5 text-sm font-medium text-center rounded-lg sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300  animate__animated animate__bounce headline">
                                    <button type="submit" class="">
                                        Create
                                    </button>

                                </div>
                                <div
                                    class=" relative bg-orange-500 dark:bg-slate-800 dark:text-blue-400 py-3 px-5 text-sm font-medium text-center rounded-lg sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300  animate__animated animate__bounce headline">
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
<div wire:ignore.self style="margin-top:90px;" id="authentication-modal" tabindex="-1" aria-hidden="true"
    class="fixed mt-9 top-4 left-0 right-0 z-50 hidden w-11/12 p-4 overflow-y-auto overflow-x-hidden  md:inset-0  ">
    <div class="relative max-w-screen-sm max-w-screen-md max-w-screen-lg max-w-screen-xl max-w-screen-2xl    max-h-full"
        style="width:500px; left:50px">
        <!-- Modal content -->
        <div class="relative bg-gray-300  rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Category
                </h3>
                <button type="button"
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
                        <form wire:submit.prevent="updateCategory" enctype="multipart/form-data">
                            <div class="grid space-y-10 mx-auto shadow-lg lg:mt-10 md:mt-10 sm:mt-3"
                                style="padding:60px;padding-top: 40px;">
                                <div class="grid gap-4 grid-cols-1 w-full">
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
                                <div class="grid gap-4 grid-cols-1 w-full">
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
                                        <label for="name" class="block">Approve</label>
                                        <input type="checkbox" wire:model="status" id="">


                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end py-2">
                                <div
                                    class="mx-4 relative dark:bg-slate-800 dark:text-blue-400 bg-orange-500 py-3 px-5 text-sm font-medium text-center rounded-lg sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300  animate__animated animate__bounce headline">
                                    <button type="submit" data-modal-hide="authentication-modal" class="">
                                        Update
                                    </button>

                                </div>
                                <div
                                    class=" relative dark:bg-slate-800 dark:text-blue-400 bg-orange-500 py-3 px-5 text-sm font-medium text-center rounded-lg sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300  animate__animated animate__bounce headline">
                                    <button type="button" data-modal-hide="authentication-modal" class="">
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
    class="fixed h-[600px]  top-10 left-0 right-0 z-50 hidden rounded-lg   p-4  overflow-x-hidden  md:inset-0  ">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-gray-300 w-[500px] rounded-lg shadow dark:bg-gray-700">
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
