@extends('layout.admin')

@section('title')
    Slide
@endsection

@section('content')
    <div class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700 h-screen  bg-slate">
        <h1 class="text-2xl text-orange-600">Create A New Slide</h1>
        <form action="{{ url('admin/slide/store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="grid space-y-10 mx-auto shadow-lg lg:mt-10 md:mt-10 sm:mt-3"
                style="width:1050px;padding:60px;padding-top: 40px;">
                <div class="flex space-x-6" style="width: 900px;">
                    <div class="relative w-1/2">
                        <div>
                            <label for="menuname"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <select name="menu_id" id="menuname"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder=""="">
                                <option value="">Choose Menu</option>
                                @forelse ($menus as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                @empty
                                    <option value=""> No</option>
                                @endforelse

                            </select>
                            @error('menu_id')
                                <p class="text-red-700">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="relative w-1/2">
                        <div>
                            <label for="discount"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Discount(%)</label>
                            <input type="number" name="discount" id="discount" value="{{ old('discount') }}"
                                placeholder=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            @error('discount')
                                <p class="text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="flex space-x-6 " style="width: 900px;">
                    <div class="relative w-full">
                        <div>
                            <label for="slidedes"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea name="description" id="slidedes" placeholder=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">{{ old('description') }}</textarea>
                            @error('description')
                                <p class=" text-red-700">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="flex space-x-6" style="width: 900px;">
                    <div class="relative w-1/2">
                        <div>
                            <label for="menuimg"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                            <input type="file" name="image" id="menuimg"
                                class="bg-gray-50 border border-gray-30 text-sm rounded-lgblock w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="">
                            @error('image')
                                <p class="text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="relative w-1/2">
                    </div>
                </div>

                <div class="flex justify-end space-x-2">
                    <div
                        class=" relative bg-orange-500 py-3 px-7 text-sm font-medium text-center rounded-lg sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800  animate__animated animate__bounce headline">
                        <button type="submit" name="submit">
                            Create
                        </button>
                    </div>
                    <div class=" relative py-3 px-7 text-sm font-medium text-center rounded-lg sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800  animate__animated animate__bounce headline"
                        style="background-color: rgb(139, 3, 3)">
                        <button type="reset" name="cancel">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
