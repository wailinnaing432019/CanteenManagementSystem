<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice </title>
    {{-- @vite('resources/css/app.css') --}}
    <style>
        .container {
            background-color: rgba(24, 211, 224, 0.365);
        }

        tr {
            align-items: center;
        }

        .text-xs {
            font-size: 12px;
        }

        table {
            margin: auto;
            width: 300px;
            border-collapse: collapse;
        }

        .border-bottom {
            border-bottom: 1px solid black;
        }

        .border-top {
            border-top: 1px solid black;
        }

        tr {
            line-height: 40px;
        }
    </style>
</head>

<body>
    <div class="">
        <h5>Wait {{ $waiting_time }}</h5>
        <h4>Order is {{ $status }}</h4>
    </div>
    <div class="container" style="width:300px; margin:auto; padding:30px 30px 5px 30px; border-radius:10px 10px;">
        <div class="w-1/3 me-3">
            <div class="rounded-lg bg-slate-200 px-3 laptopsm:text-xl tablet:text-xl text-center"
                style="heigt:300px;text-align:center;">
                <p style="color:#fa6115; padding:0px 8px;font-weight:700;font-size:18px;">{{ $setting->name }}</p>
                <span class="block text-base">{{ $setting->address }}</span>
                <br>
                <span class="text-base block">{{ $setting->phone }}</span>
                <div class="flex justify-between p-3 font-bold" style="display: flex; justify-content:space-between;">
                    <p class="text-xs">Table No : {{ $order->table_no }}</p>
                    <p class="text-xs">
                        Customer : {{ $order->user->name }}
                    </p>
                </div>
                <div class="">
                    <table class="text-sm w-full  mt-3">
                        <thead class="border-bottom">
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
                        <tbody>
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
                        <tfoot class="border-top" style="font-weight:900; ">
                            <tr style="" class="font-bold leading-9">
                                <td colspan="2" class="py-2">Total</td>
                                <td>{{ $total }} Ks</td>
                            </tr>
                        </tfoot>
                    </table>
                    <p class="text-xs" style="padding-bottom: 0px;">
                        Thanks For comming !
                        <br>
                        Hope to come back again !
                    </p>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
