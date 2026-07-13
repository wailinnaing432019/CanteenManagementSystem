<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/js/fontawesome-iconpicker.min.js"
        integrity="sha512-7dlzSK4Ulfm85ypS8/ya0xLf3NpXiML3s6HTLu4qDq7WiJWtLLyrXb9putdP3/1umwTmzIvhuu9EW7gHYSVtCQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{ asset('css/customer.css') }}">
</head>

<body>

    <div class="laptopsm:text-xl tablet:text-lg phone:text-base font-bold ps-5 pt-2"><a href=""
            class="bg-slate-600 text-orange-700 px-2 py-1 "> back</a>
    </div>
    <h3 class="text-center text-black font-bold text-lg drop-shadow-md">Your Orderlist</h3>
    <div class=" relative overflow-x-auto shadow-md sm:rounded-lg m-10 mt-14">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="my">
            <thead
                class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400 font-extrabold border-2 border-gray-200 dark:border-2 dark:border-slate-800 drop-shadow-md">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price_perunit
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Quantity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total_price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Order_date
                    </th>
                </tr>
            </thead>
            <tbody>
                {{-- @forelse ($menus as $menu) --}}
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 laptopsm:text-[15px] tablet:text-[15px] phone:text-[12px] text-blue-600 ">
                    <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">

                    </td>
                    <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">

                    </td>
                    <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">

                    </td>
                    <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">

                    </td>
                    <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1">

                    </td>
                    <td class="laptopsm:px-6 laptopsm:py-4  tablet:px-4 tablet:py-3 phone:px-1 phone:py-1 text-center">

                    </td>
                </tr>
                {{-- @empty
                @endforelse --}}

            </tbody>
        </table>
    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>

</html>
