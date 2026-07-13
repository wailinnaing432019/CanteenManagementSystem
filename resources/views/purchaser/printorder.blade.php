<div class="w-[700px]">
    <div style="margin-bottom:20px;">
        Date - @php
            echo date('d-m-y');
        @endphp
    </div>

    <div class="" style="margin-left:100px;">
        <table class=" table-fixed ms-40">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                style="padding-bottom:20px;">
                <tr>
                    <th style="padding-right: 40px;padding-bottom:20px;">
                        Product_name
                    </th>
                    <th style="padding-right: 40px;padding-bottom:20px;">
                        Quantity
                    </th>
                    <th style="padding-right:10px;padding-bottom:20px;">
                        Price Per Unit
                    </th>
                    <th style="padding-right:10px;padding-bottom:20px;">
                        Total Price
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr style="padding-bottom:5px;">
                        <td style="padding-right:70px;padding-bottom:5px;">{{ $order->product_name }}
                        </td>
                        <td style="padding-right:40px;padding-bottom:5px;">{{ $order->quantity }} </td>
                        <td
                            style="width:150px;height:15px;border-bottom:1px dotted gray;padding-right:10px;padding-bottom:5px;">
                        </td>
                        <td
                            style="width:150px;height:15px;border-bottom:1px dotted gray;padding-right:10px;padding-bottom:5px;">
                        </td>
                    </tr>
                @empty
                    <h3 class="text-2xl text-red-700 text-center mt-3">There is no Order for @php
                        echo date('d-m-y');
                    @endphp</h3>
                @endforelse
            </tbody>
        </table>
        <div class="">
        </div>
    </div>

</div>
