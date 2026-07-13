@extends('layout.admin')
@section('title', 'Comments')
@section('content')
    <div class="">
        <div class="m-5">
            <a onclick="history.back()"
                class="rounded hover:rounded-lg p-2 w-9 cursor-pointer bg-blue-500 dark:bg-slate-700 dark:text-blue-400"><i
                    class="fa fa-reply px-6" aria-hidden="true"></i></a>
        </div>
        <div class=" overflow-x-auto shadow-md w-full  dark:bg-gray-700">
            <div class="flex justify-center gap-9 my-5">
                <div class="">
                    <img src="{{ asset('storage/' . $menu->menuImages[0]->image) }}" class="rounded-lg"
                        style="width: 200px; height:150px;" alt="">
                </div>
                <div class="text-orange-500">
                    <div class=""><span class="w-32 inline-block"> Name </span> : <span class="ps-3 font-bold">
                            {{ $menu->name }}</span> </div>
                    <div class=""><span class="w-32 inline-block"> Category </span> : <span class="ps-3 font-bold">
                            {{ $menu->category->name }}</span> </div>
                    <div class=""><span class="w-32 inline-block"> Price </span> : <span class="ps-3 font-bold">
                            {{ $menu->price }}</span> </div>
                    <div class=""><span class="w-32 inline-block"> Waiting Time </span> : <span
                            class="ps-3 font-bold">
                            {{ $menu->waiting_time }}</span> </div>
                    <div class=""><span class="w-32 inline-block"> Cooked By </span> : <span class="ps-3 font-bold">
                            {{ $menu->MenuCreateUser->name }}</span> </div>
                    <div class=""><span class="w-32 inline-block"> View </span> : <span class="ps-3 font-bold">
                            {{ $menu->count }}</span> </div>
                    <div class="flex items-top"><span class="w-32 inline-block"> Description </span> : <span
                            class="ps-3 w-96 font-bold inline-block">
                            {{ $menu->description }} </span> </div>
                </div>
            </div>
            <div class=" overflow-x-auto shadow-md sm:rounded-lg w-full  dark:bg-gray-700">
                <table class="w-full text-sm text-left sm:rounded-lg  border-l-8 border-orange-500">
                    <thead class="text-sm text-orange-500 uppercase  dark:bg-gray-700">
                        <tr class=" border-b-2 border-orange-500">
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Comments
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <i class="fas fa-sort fs-3"></i>
                                Created By
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($comments as $key=> $comment)
                            <tr
                                class="bg-white dark:bg-gray-900 dark:text-white border-b hover:bg-gray-50 laptopsm:text-[15px] tablet:text-[15px] phone:text-[12px] ">
                                <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                                    {{ $comments->firstItem() + $key }}
                                </td>
                                <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                                    {{ $comment->message }}</td>
                                <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                                    {{ $comment->user->name }}</td>
                                <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                                    <form
                                        action="{{ url('admin/comments/delete/' . $comment->menu_id . '/' . $comment->user_id . '/' . $comment->id) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>


                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No Comments yet</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

        </div>
        {{-- <div class="">
                {{ $menus->links() }}
            </div> --}}
    </div>
@endsection
