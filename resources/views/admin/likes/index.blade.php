@extends('layout.admin')
@section('title', 'Likes & Comments')
@section('content')
    <div class="">
        <div class="text-orange-500 p-3 m-2 dark:text-blue-400">
            <h5 class="text-xl">Likes , Comments & Views </h5>
        </div>
        <div class=" overflow-x-auto shadow-md sm:rounded-lg w-full  dark:bg-gray-700">

            <table class="w-full text-sm text-left  border-l-8 border-orange-500 dark:border-blue-400">
                <thead class="text-sm text-orange-500 uppercase  dark:bg-gray-700 dark:text-blue-400">
                    <tr class=" border-b-2 border-orange-500 dark:border-blue-400">
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Views
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Likes
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Comments
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($menus as $key => $menu)
                        <tr
                            class="bg-white dark:bg-gray-900 dark:text-white border-b hover:bg-gray-50 laptopsm:text-[15px] tablet:text-[15px] phone:text-[12px] text-center">
                            <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                                {{ $menus->firstItem() + $key }}
                            </td>
                            <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                                <img src="{{ asset('storage/' . $menu->menuImages[0]->image) }}"
                                    style="width: 150px; height:80px;" alt="">
                            </td>
                            <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                                {{ $menu->name }}
                            </td>
                            <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                                {{ $menu->category->name }}
                            </td>
                            <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                                {{ $menu->count }}
                            </td>
                            <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                                {{ $menu->likes }}
                            </td>
                            <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">

                                @if ($menu->comments > 0)
                                    <a href="{{ url('admin/comments/menus/' . $menu->id) }}"
                                        class="text-blue-500 underline font-bold">{{ $menu->comments }}</a>
                                @else
                                    {{ $menu->comments }}
                                @endif
                            </td>
                        </tr>

                    @empty
                    @endforelse

                </tbody>
            </table>

        </div>
        <div class="">
            {{ $menus->links() }}
        </div>
    </div>
@endsection
