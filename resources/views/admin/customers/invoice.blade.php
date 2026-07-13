@extends('layout.admin')
@section('title', 'Preview Invoice')
@section('content')
    <style>
        @media print {
            .no-print {
                display: none;
            }

            .print-only {
                display: flex;
                justify-content: center;
            }

            .wd {
                width: 400px;
            }

        }
    </style>
    <div class="m-5 flex justify-between no-print">
        <a class="bg-orange-400 hover:text-gray-500 hover:bg-orange-500 text-white px-4 py-3 rounded-lg "
            href="{{ url('admin/customers/orders/' . $order->id) }}">back</a>
        <button onclick="window.print()"
            class="px-2  hover:bg-orange-500 hover:text-white rounded-lg outline outline-2 outline-orange-500">Print
            Invoice</button>
    </div>
    <div class="container mt-10 flex justify-center print-only" id="mySection">
        <div class="w-1/3 me-3 wd">
            <div class="rounded-lg bg-slate-200 px-3 laptopsm:text-xl tablet:text-xl text-center" style="heigt:300px">
                <p class="py-2 text-yellow-300 font-bold">{{ $setting->name }}</p>
                <span class="block text-base">{{ $setting->address }}</span>
                <span class="text-base block">{{ $setting->phone }}</span>
                <div class="flex justify-between p-3 font-bold">
                    <p class="text-xs">Table No : {{ $order->table_no }}</p>
                    <p class="text-xs">
                        Customer : {{ $order->user->name }}
                    </p>
                </div>
                <div class="">
                    <table class="text-sm w-full  mt-3">
                        <thead>
                            <tr>
                                <th>
                                    Qty
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Ks
                                </th>
                            </tr>
                        </thead>
                        <tbody class="border-b-2 h-[200px] border-black ">
                            @php
                                $total = 0.0;
                            @endphp
                            @forelse ($orderDetails as $item)
                                <tr class="leading-1 ">
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->menu->name }} * {{ $item->price }}</td>
                                    <td>{{ $item->quantity * $item->price }}</td>
                                    @php
                                        $total += $item->quantity * $item->price;
                                    @endphp
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                        <tfoot class="p-5">
                            <tr class="font-bold leading-9">
                                <td colspan="2" class="py-2">Total</td>
                                <td>{{ $total }} Ks</td>
                            </tr>
                        </tfoot>
                    </table>
                    <p class="text-xs">
                        Thanks For comming !
                        <br>
                        Hope to come back again !
                    </p>
                </div>
            </div>

        </div>
    </div>
@endsection
