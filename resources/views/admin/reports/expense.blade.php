@extends('layout.admin')
@section('title', 'Report Expense')
@section('content')
    <div class="">
        <div class="text-orange-500 p-3 m-2 dark:text-blue-400 flex justify-between items-center">
            <div class="text-xl">
                <h3>Total Expense : {{ $totalAmount }} Ks</h3>
            </div>
            <div class="">
                <form action="{{ url('admin/reports/expense') }}" method="get">

                    <div class="flex space-x-3 items-end ">
                        <div class="">
                            <label for="">Start Date</label><br>
                            <input type="date" min="{{ $firstCreatedAt }}" value="{{ request('startDate') ?? '' }}"
                                max="{{ $lastCreatedAt }}" name="startDate" id=""
                                class="rounded-lg outline outline-2 outline-orange-500">
                        </div>
                        <div class="">
                            <label for="">End Date</label> <br>
                            <input type="date" min="{{ $firstCreatedAt }}" value="{{ request('endDate') ?? '' }}"
                                max="{{ $lastCreatedAt }}" name="endDate" id="" placeholder="EndDate"
                                class="rounded-lg outline outline-2 outline-orange-500">
                        </div>
                        <div class="">
                            <button type="submit"
                                class="outline outline-2 hover:bg-orange-500 hover:text-white outline-orange-500 rounded-lg p-2">Filter</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class=" overflow-x-auto shadow-md sm:rounded-lg w-full  dark:bg-gray-700">

            <table class="w-full text-sm   border-l-8 border-orange-500 dark:border-blue-400">
                <thead class="text-sm text-orange-500 uppercase  dark:bg-gray-700 dark:text-blue-400">
                    <tr class=" border-b-2 border-orange-500 dark:border-blue-400">
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price per Unit
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total Amount
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created Date
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $key => $order)
                        <tr
                            class="bg-white dark:bg-gray-900 dark:text-white border-b hover:bg-gray-50 laptopsm:text-[15px] tablet:text-[15px] phone:text-[12px] text-center">
                            <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                                {{ $orders->firstItem() + $key }}
                            </td>
                            <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                                {{ $order->product_name }}
                            </td>
                            <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                                {{ $order->quantity }}
                            </td>
                            <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                                {{ $order->price_perunit }}
                            </td>
                            <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                                {{ $order->total_price }}
                            </td>
                            <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">
                                {{ $order->created_at->format('Y-m-d') }}
                            </td>

                        </tr>

                    @empty
                        <tr>
                            <td colspan="5 " class="text-center text-xl leading-9 p-4">No Data Found</td>
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
