<div>
    <!-- Change password modal -->
    <div wire:ignore.self id="changePassword" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
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
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="changePassword">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Change Your Password</h3>
                    <form class="space-y-6" wire:submit.prevent="update">
                        <div>
                            <label for="oldpass"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Old
                                Password</label>
                            <input type="password" wire:model="oldpassword" id="oldpass"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="" required>
                            @error('oldpassword')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="newpass"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New
                                Password</label>
                            <input type="password" wire:model="password" id="newpass"
                                placeholder="[A-Z,a-z,!@#$%] must include"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>
                            @error('password')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="confirmnewpass"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm New
                                Password</label>
                            <input type="password" wire:model="password_confirmation" id="confirmnewpass" placeholder=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>
                            @error('password_confirmation')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Change
                            Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
