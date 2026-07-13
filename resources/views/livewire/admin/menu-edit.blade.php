<div>
    <div class="p-4  rounded-lg h-full  bg-slate">
        <form wire:submit.prevent="updateMenu" enctype="multipart/form-data">
            <div class="grid space-y-10 mx-auto shadow-lg lg:mt-10 md:mt-10 sm:mt-3"
                style="padding:60px;padding-top: 40px;">
                {{-- <div class="flex justify-around align-middle">
                    @if ($menuImages)
                        <div class="">
                            <p class="text-gray-500 py-2">
                                Current Photos
                            </p>
                            @foreach ($menuImages->menuImages as $item)
                                <div class="w-[150px]">
                                    <div class="">
                                        <img class="w-full  " src="{{ asset('storage/' . $item->image) }}"
                                            alt="Preview Image" style="width: 150px; height:100px;">
                                    </div>
                                    <div class="block">
                                        <button type="button" wire:click="destoryImage({{ $item->id }})"
                                            class="rounded-full font-medium text-red-900 hover:text-orange-500">Remove</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    @if ($image)
                        <div class="columns-3">
                            <div class="w-full">
                                <p class="text-gray-500 py-2 inline-block">
                                    Preview Image
                                </p>
                                <div class=" gap-2">

                                    @foreach ($image as $item)
                                        <div class="basis-1/3 w-[150px]">
                                            <img class="w-full aspect-video" src="{{ $item->temporaryUrl() }}"
                                                alt="Preview Image" style="width: 150px; height:100px;">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div> --}}
                <div class="flex justify-between align-middle">
                    @if ($menuImages)
                        @foreach ($menuImages->menuImages as $item)
                            <div class="basis-1/2">
                                <div class=" gap-2">
                                    <p class="text-orange-500 font-bold py-2">
                                        Current Image
                                    </p>
                                    <div class="">
                                        <img class="w-full  rounded-lg shadow-lg shadow-orange-300"
                                            src="{{ asset('storage/' . $item->image) }}" alt="Current Image"
                                            style="width: 250px; height:150px;">
                                    </div>
                                    <div class="block">
                                        <button type="button" wire:click="destoryImage({{ $item->id }})"
                                            class="rounded-full font-medium text-red-900 hover:text-orange-500">Remove</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    @if ($image)
                        <div class="basis-1/2">
                            <p class="text-orange-500 font-bold py-2">
                                Preview Image
                            </p>
                            @foreach ($image as $item)
                                <div class="basis-1/3 w-[150px]">
                                    <img class="w-full  rounded-2xl shadow-lg shadow-orange-300"
                                        src="{{ $item->temporaryUrl() }}" alt="Preview Image"
                                        style="width: 150px; height:100px;">
                                </div>
                            @endforeach
                            {{-- <div class=" gap-2">

                                <div class="basis-1/3 ">
                                    <img class="w-full  rounded-2xl shadow-lg shadow-orange-300"
                                        src="{{ $image->temporaryUrl() }}" alt="Preview Image"
                                        style="width: 250px; height:150px;">
                                </div>
                            </div> --}}
                        </div>
                    @endif
                </div>

                {{-- <div class="relative z-0 w-full mb-2 group">
                    <input type="file" wire:model.prevent.debounce.200ms="image" max="2" multiple
                        id="image"
                        class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('name') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="image"
                        class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Full
                        Choose Image</label>
                    @error('image.*')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <select type="text" wire:model="category_id" id="category_id"
                        class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('category_id') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
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
                <div class="grid gap-4 grid-cols-2 w-full">
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
                            class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('category_id') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
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
                        <select type="text" wire:model="status" id="status"
                            class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('status') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" ">
                            <option value="">{{ $st }}</option>
                            <option value="0">
                                Pending</option>
                            <option value="1">Admit</option>
                            <option value="2" selected>Available</option>
                            <option value="3">UnAvailable
                            </option>
                        </select>
                        <label for="role_as"
                            class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Select
                            Status</label>
                        @error('status')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div> --}}
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
                        <label for="image" class="block">
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
                            <select type="text" wire:model="employee_id"
                                class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('category_id') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" ">
                                <option value="auth()->guard('staff')->user()->id">Admin</option>
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
                            class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 @error('category_id') border-red-500 @enderror appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
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
                    <div class="basis-1/2 ">
                        {{-- <label for="" class="block text-gray-900">
                            Available
                        </label> --}}
                        <input type="radio" wire:model="status" value="0" id="0"> <label
                            for="0">Pending</label>
                        <input type="radio" wire:model="status" value="1" id="1"> <label
                            for="1">Available</label>
                        <input type="radio" wire:model="status" value="2" id="2"> <label
                            for="2">Unavailable</label>
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
                    class="mx-4 relative bg-orange-500 py-3 px-5 text-sm font-medium text-center rounded-lg sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300  animate__animated animate__bounce headline">
                    <button type="submit" class="">
                        Update
                    </button>

                </div>
                <div
                    class=" relative bg-orange-500 py-3 px-5 text-sm font-medium text-center rounded-lg sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300  animate__animated animate__bounce headline">
                    <a href="{{ url('admin/menus') }}" class="">
                        Cancel
                    </a>
                </div>


            </div>
        </form>


    </div>
</div>

@push('scripts')
@endpush
