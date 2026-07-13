@extends('layout.admin')
@section('title', 'Customers Order')
@section('content')
    <div class="">
        <div class="text-orange-500 p-3 m-2 dark:text-blue-400">
            <h5 class="text-xl">Customers Order </h5>
            <span class="text-base text-orange-500 dark:text-blue-400"> Total - {{ $orders->count() }}</span>
        </div>
        <div class=" overflow-x-auto shadow-md sm:rounded-lg w-full  dark:bg-gray-700">

            <table class="w-full text-sm text-left  border-l-8 border-orange-500 dark:border-blue-400">
                <thead class="text-sm text-orange-500 uppercase  dark:bg-gray-700 dark:text-blue-400">
                    <tr class=" border-b-2 border-orange-500 dark:border-blue-400">
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Customer Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Table No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Leave Note
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Mail Send
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Order Time
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $key => $order)
                        <tr
                            class="bg-white dark:bg-gray-900 dark:text-white border-b hover:bg-gray-50 laptopsm:text-[15px] tablet:text-[15px] phone:text-[12px] ">
                            <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                                {{ $orders->firstItem() + $key }}
                            </td>
                            <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                                {{ $order->user->name }}
                            </td>
                            <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                                {{ $order->table_no }}
                            </td>
                            <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                                {{ $order->leave_note ?? '-' }}
                            </td>
                            <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                                {{ $order->send_mail == 0 ? 'No' : 'Yes' }}
                            </td>
                            <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                                {{ $order->status == 0 ? 'pending' : ($order->status == 1 ? 'accept' : ($order->status == 2 ? 'reject' : 'completd')) }}
                            </td>
                            <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                                {{ $order->created_at->format('d-m-Y H:i:s A') }}
                            </td>
                            <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                                <a href="{{ url('admin/customers/orders/' . $order->id) }}"><i class="fa fa-edit"
                                        aria-hidden="true"></i></a>
                            </td>
                        </tr>


                    @empty
                        <tr>
                            <td colspan="7" class="leading-9 p-5 text-center text-xl dark:text-red-600 ">
                                No Order Found
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

        </div>
        <div class="">
            {{ $orders->links() }}
        </div>
    </div>
@endsection
