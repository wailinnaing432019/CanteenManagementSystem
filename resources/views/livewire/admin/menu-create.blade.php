<div>
    <div class="p-4  rounded-lg h-full  bg-slate dark:text-blue-400">
        <form wire:submit.prevent="add" method="POST" enctype="multipart/form-data">
            <div class="grid shadow-2xl shadow-cyan-500/50 rounded-lg  space-y-10 mx-auto  lg:mt-10 md:mt-10 sm:mt-3"
                style="padding:60px;padding-top: 40px;">

                @if ($image)
                    <p>
                        Preview Image
                    </p>
                    <div class="flex flex-row gap-2">
                        @foreach ($imagePreviews as $index => $preview)
                            <div class="basis-1/3 w-[150px]">

                                <img class="w-full  " src="{{ $preview }}" alt="Preview Image"
                                    style="width: 150px;height:100px;">


                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="grid gap-4 grid-cols-2 items-top w-full">
                    <div class="basis-1/2">
                        <div class="relative z-0 w-full mb-2 group">
                            <input type="text" wire:model="name" id="name"
                                class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('name') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " />
                            <label for="name"
                                class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Menu
                                Name</label>
                            @error('name')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="basis-1/2">
                        <label for="image" class="block dark:text-gray-400">
                            Choose Image to upload</label>
                        <input type="file" wire:model.prevent="image" multiple id="image"
                            class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('image') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        @error('image')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <div class="grid gap-4 grid-cols-2 w-full">
                    <div class="basis-1/2">
                        <div class="relative z-0 w-full mb-2 group">
                            <select type="text" wire:model="employee_id" id="employee_id"
                                class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('category_id') border-red-500 @enderror appearance-none dark:text-blue-400 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" ">
                                <option value="{{ auth()->guard('staff')->user()->id }}">No Chef</option>
                                @foreach ($chefs as $chef)
                                    <option value="{{ $chef->id }}">{{ $chef->name }}</option>
                                @endforeach
                            </select>
                            <label for="name"
                                class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Cooked By
                            </label>
                            @error('employee_id')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="basis-1/2">
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="text" wire:model="price" id="price"
                                class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('price') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " />
                            <label for="price"
                                class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Price
                            </label>
                            @error('price')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="relative z-0 grid gap-4 grid-cols-2 w-full group">
                    <div class="basis-1/2">
                        <select type="text" wire:model="category_id" id="category_id"
                            class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('category_id') border-red-500 @enderror appearance-none dark:text-blue-400 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" ">
                            <option value="">Choose Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <label for="role_as"
                            class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Select
                            Category</label>
                        @error('category_id')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="basis-1/2">
                        <label for="" class="block text-gray-900 dark:text-gray-400">
                            Available
                        </label>
                        <input type="checkbox" wire:model="status" id="">
                    </div>
                </div>

                <div class="grid gap-4 grid-cols-2 w-full">
                    <div class="relative z-0 w-full mb-2 group">
                        <input type="text" wire:model="waiting_time" id="waiting_time"
                            class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('waiting_time') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="waiting_time"
                            class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Waiting_time</label>
                        @error('waiting_time')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="tel" wire:model="description" id="description"
                            class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('description') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="description"
                            class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description
                        </label>
                        @error('description')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>


            </div>
            <div class="flex justify-end py-2">
                <div
                    class=" relative bg-red-500 dark:bg-slate-800 dark:text-blue-400 py-3 px-5 text-sm font-medium text-center rounded-lg sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300  animate__animated animate__bounce headline ">
                    <a href="{{ url('admin/menus') }}" class="">
                        back
                    </a>
                </div>
                <div
                    class="mx-4 relative bg-orange-500 dark:bg-slate-800 dark:text-blue-400 py-3 px-5 text-sm font-medium text-center rounded-lg sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300  animate__animated animate__bounce headline ">
                    <button type="submit" class="">
                        Create
                    </button>

                </div>

            </div>
        </form>
    </div>
</div>
