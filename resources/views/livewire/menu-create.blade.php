<div>
    <h1>Hello I'm From LIvewire</h1>
    <div class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700 h-screen  bg-slate">
        <h1 class="text-2xl text-orange-600">Create Menu</h1>
        <div class="grid space-y-10 mx-auto shadow-lg lg:mt-10 md:mt-10 sm:mt-3"
             style="width:1200px;padding:60px;padding-top: 40px;">
            <div class="flex space-x-6" style="width: 1100px;">
                <div class="relative w-1/2">
                    <div>
                        <label for="menuname"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="menuname" id="menuname"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                               placeholder="" required>
                    </div>
                </div>
                <div class="relative w-1/2">
                    <div>
                        <label for="address"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <input type="text" name="address" id="address" placeholder=""
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                               required>
                    </div>
                </div>
            </div>
            <div class="flex space-x-6 relative" >
                <div class="relative w-1/2">
                    <div>
                        <label for="menuwaiting"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waiting
                            Time</label>
                        <input type="text" name="menuwaiting" id="menuwaiting" placeholder=""
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                               required>
                    </div>
                </div>
                <div class="relative w-1/2">
                    <div>
                        <label for="menudes"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea name="menudes" id="menudes" placeholder=""
                                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                  required>
                                </textarea>
                    </div>
                </div>
            </div>
            <div class="flex space-x-6" style="width: 1100px;">
                <div class="relative w-1/2">
                    <div>
                        <label for="menuimg"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                        <input type="file" name="menuimg" id="menuimg"
                               class="bg-gray-50 border border-gray-30 text-sm rounded-lgblock w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                               placeholder="" required>
                    </div>
                </div>
                <div class="relative w-1/2">
                </div>
            </div>

            <div
                class=" relative bg-orange-500 py-3 px-7 text-sm font-medium text-center rounded-lg sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800  animate__animated animate__bounce headline">
                <button type="submit" name="menubtn">
                    Create
                </button>
            </div>
        </div>
    </div>
</div>
