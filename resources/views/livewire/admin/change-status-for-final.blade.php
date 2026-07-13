<div class="w-[200px]">
    <select id="countries" wire:model="status"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 drop-shadow-xl">
        <option selected>Choose Status</option>
        <option value="0">Pending</option>
        <option value="1">Accept</option>
        <option value="2">Reject</option>
        <option value="3">Complete</option>
        <option value="4">Failed</option>
    </select>
</div>
