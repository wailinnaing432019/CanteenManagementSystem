@extends('layout.admin')

@section('title', 'Slides')


@section('content')
    <div class="p-4  rounded-lg dark:border-gray-700 h-screen w-full">
        <div class="flex justify-between items-center w-full pl-14 ">
            <div class="">
                <a onclick="history.back()" class="rounded hover:rounded-lg p-2 w-9 bg-blue-500"><i class="fa fa-reply px-6"
                        aria-hidden="true"></i></a>
            </div>
            <div
                class=" relative bg-orange-500 px-2 flex items-center justify-center text-sm font-medium text-center rounded-lg sm:w-fit focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600  dark:focus:ring-primary-800  headline laptopsm:ms-12 tablet:ms-2 phone:ms-1 laptopsm:w-24 laptopsm:h-10 tablet:w-24 tablet:h-10 phone:w-16 phone:h-8">
                <a href="{{ url('admin/slide/create') }}" class="py-2 w-full">
                    <span class="phone:text-[10px] laptopsm:text-[15px] tablet:text-[15px]"> Add New</span>
                </a>
            </div>
        </div>

        <div class="">
            <div class="flex justify-between items-center w-full pl-14 ">
                <div class="">
                    <h1 class="text-2xl  pt-3 text-orange-600">Slide List</h1>
                    <span class="text-orange-500"> Total - {{ $slidedata->count() }}</span>
                </div>
                {{-- <div class="w-56">
                    <input type="text"
                        class="block rounded-lg py-2 px-0 w-full text-sm text-gray-900 bg-transparent  border-2 border-gray-500 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-orange-500 peer"
                        placeholder="Search you want">
                </div> --}}

            </div>
        </div>
        <div class="relative w-full overflow-x-auto  sm:rounded-lg  border shadow-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-l-8 border-orange-500">
                <thead class="text-sm text-orange-500  uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class=" border-0 border-b-2 border-orange-700">
                        <th class="px-6 py-4">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <i class="fas fa-sort fs-3" wire:click="sortBy('name')"></i>
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Discount
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="text-gray-900 text-sm dark:text-white">
                    @forelse ($slidedata as $key=>$sdata)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                            <th class="px-6 py-4">
                                {{ $slidedata->firstItem() + $key }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap ">
                                {{ $sdata->menu->name }}
                            </th>
                            <td class="px-6 py-4">
                                <img src="{{ asset('storage/' . $sdata->image) }}" class="rounded-lg"
                                    style="width:100px; height:60px;"alt="">
                            </td>
                            <td class="px-6 py-4">
                                {{ $sdata->discount }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $sdata->description }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('slide#edit', $sdata->id) }}">
                                    <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline pe-2"
                                        data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                </a>
                                <a href="{{ route('slide#delete', $sdata->id) }}">
                                    <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                        data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>

                    @empty
                    @endforelse
                </tbody>

            </table>
        </div>
        {{ $slidedata->links() }}
    </div>
@endsection
