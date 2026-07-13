<div>
    <div class="row">
        <div class="p-4  rounded-lg  h-full  bg-slate">
            <form wire:submit.prevent="updateData" enctype="multipart/form-data" class="shadow-lg shadow-orange-300">
                <div class="grid space-y-10 mx-auto shadow-lg lg:mt-10 md:mt-10 sm:mt-3"
                    style="padding:60px;padding-top: 40px;">

                    <div class="flex justify-between align-middle">
                        @if ($dbImage)
                            <div class="basis-1/2">
                                <div class=" gap-2">
                                    <p class="text-orange-500 font-bold py-2">
                                        Current Table Image
                                    </p>
                                    <div class="">
                                        <img class="w-full  rounded-lg shadow-lg shadow-orange-300"
                                            src="{{ asset('storage/' . $dbImage) }}" alt="Current Image"
                                            style="width: 250px; height:150px;">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($image)
                            <div class="basis-1/2">
                                <div class=" gap-2">
                                    <p class="text-orange-500 font-bold py-2">
                                        Preview Image
                                    </p>
                                    <div class="basis-1/3 ">
                                        <img class="w-full  rounded-2xl shadow-lg shadow-orange-300"
                                            src="{{ $image->temporaryUrl() }}" alt="Preview Image"
                                            style="width: 250px; height:150px;">
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="relative z-0 w-full mb-2 group">
                        <input type="file" wire:model="image" id="image"
                            class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('name') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="image"
                            class="peer-focus:font-medium absolute text-lg text-gray-700 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Full
                            Choose Image</label>
                        @error('image')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid gap-4  w-full">
                        <div class="relative z-0 basis-1/2 mb-2 group">
                            <input type="text" wire:model="table_no" id="table_no"
                                class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('table_no') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " />
                            <label for="table_no"
                                class="peer-focus:font-medium absolute text-lg text-gray-700 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Table_No</label>
                            @error('table_no')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <label for="check" class="text-gray-700">
                            Check if Available
                        </label>
                        <input type="checkbox" wire:model="status" id="">
                    </div>

                    <div class="grid gap-4  w-full">
                        <div class="">
                            <div class="relative z-0 w-full mb-6 group">
                                <textarea wire:model="description" id="description"
                                    class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('description') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" "></textarea>
                                <label for="description"
                                    class="peer-focus:font-medium absolute text-lg text-gray-700 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">description
                                </label>
                                @error('description')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <div class="flex justify-end py-2">

                    <div
                        class="mx-4 relative bg-orange-500 py-3 px-5 text-sm font-medium text-center rounded-lg sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300  animate__animated animate__bounce headline">
                        <button type="submit" class="">
                            Update
                        </button>

                    </div>
                    <div
                        class=" relative bg-orange-500 py-3 px-5 text-sm font-medium text-center rounded-lg sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300  animate__animated animate__bounce headline">
                        <a href="/admin/tables" class="">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
