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

    <div class="laptopsm:text-xl tablet:text-lg phone:text-base font-bold ps-5 pt-2"><a href=" "
            class="bg-slate-600 text-orange-700 px-2 py-1 "> back</a>
    </div>
    <h3 class="text-center text-black font-bold text-lg drop-shadow-md">Your Favourite Foods</h3>
    <div
        class="grid grid-flow-row laptopsm:grid-cols-4 tablet:grid-cols-3  phone:grid-cols-2 laptopsm:gap-6 tablet:gap-4 phone:gap-4 laptopsm:gap-y-10 tablet:gap-y-9 phone:gap-y-8 py-14 px-24">
        <div class="">
            <div
                class="laptopsm:h-52 laptopsm:w-44 tablet:h-48 tablet:w-40 phone:h-36 phone:w-24 ms-5 rounded-md  border bottom-1 shadow-2xl shadow-blue-300 relative pb-0 dark:shadow-none">
                <div
                    class=" absolute px-3 py-1 mt-1 rounded-2xl text-red-600 font-bold laptopsm:-top-7 laptopsm:-right-5 tablet:-top-6 tablet:-right-5 phone:-top-6 phone:-right-4 z-40 laptopsm:text-3xl tablet:text-2xl phone:text-xl">
                    <p><i class="fa-regular fa-circle-xmark"></i></p>
                </div>
                <div class="icontent">
                    <a href=" " style="width:30px;height: 30px;border-radius:30px;"
                        class="bg-slate-800 px-3 py-1 mt-1  text-orange-600 font-bold ">
                        <p>i</p>
                    </a>
                </div>
                <img src="./img/food3.png" alt=""
                    class="laptopsm:w-full laptopsm:h-24 tablet:w-40 tablet:h-24 phone:w-24 phone:h-16 border-b-1 bg-gray-400 ">
                <div
                    class="laptopsm:w-full laptopsm:h-28 tablet:w-40 tablet:h-24 phone:w-24 phone:h-20 bg-white dark:bg-slate-400 text-blue-600 font-semibold text-center laptopsm:pt-4 tablet:pt-3 phone:pt-2  phone:text-[10px]">
                    <h5 class="laptopsm:text-[15px] tablet:text-[15px]">Product name</h5>
                    <p class="laptopsm:text-[15px] tablet:text-[15px] pb-5">$45</p>
                    <hr>
                    <div
                        class="text-center  text-orange-500 font-bold bg-white dark:bg-slate-400 border-t-slate-300 laptopsm:w-full laptopsm:h-4 tablet:w-40 tablet:h-6 phone:w-24 phone:h-4 laptopsm:text-[12px] tablet:text-[12px]">
                        Available
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <div
                class="laptopsm:h-52 laptopsm:w-44 tablet:h-48 tablet:w-40 phone:h-36 phone:w-24 ms-5 rounded-md  border bottom-1 shadow-2xl shadow-blue-300 relative pb-0 dark:shadow-none">
                <div
                    class=" absolute px-3 py-1 mt-1 rounded-2xl text-red-600 font-bold laptopsm:-top-7 laptopsm:-right-5 tablet:-top-6 tablet:-right-5 phone:-top-6 phone:-right-4 z-40 laptopsm:text-3xl tablet:text-2xl phone:text-xl">
                    <p><i class="fa-regular fa-circle-xmark"></i></p>
                </div>
                <div class="icontent">
                    <a href=" " style="width:30px;height: 30px;border-radius:30px;"
                        class="bg-slate-800 px-3 py-1 mt-1  text-orange-600 font-bold ">
                        <p>i</p>
                    </a>
                </div>
                <img src="./img/food3.png" alt=""
                    class="laptopsm:w-full laptopsm:h-24 tablet:w-40 tablet:h-24 phone:w-24 phone:h-16 border-b-1 bg-gray-400 ">
                <div
                    class="laptopsm:w-full laptopsm:h-28 tablet:w-40 tablet:h-24 phone:w-24 phone:h-20 bg-white dark:bg-slate-400 text-blue-600 font-semibold text-center laptopsm:pt-4 tablet:pt-3 phone:pt-2  phone:text-[10px]">
                    <h5 class="laptopsm:text-[15px] tablet:text-[15px]">Product name</h5>
                    <p class="laptopsm:text-[15px] tablet:text-[15px] pb-5">$45</p>
                    <hr>
                    <div
                        class="text-center  text-orange-500 font-bold bg-white dark:bg-slate-400 border-t-slate-300 laptopsm:w-full laptopsm:h-4 tablet:w-40 tablet:h-6 phone:w-24 phone:h-4 laptopsm:text-[12px] tablet:text-[12px]">
                        Available
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <div
                class="laptopsm:h-52 laptopsm:w-44 tablet:h-48 tablet:w-40 phone:h-36 phone:w-24 ms-5 rounded-md  border bottom-1 shadow-2xl shadow-blue-300 relative pb-0 dark:shadow-none">
                <div
                    class=" absolute px-3 py-1 mt-1 rounded-2xl text-red-600 font-bold laptopsm:-top-7 laptopsm:-right-5 tablet:-top-6 tablet:-right-5 phone:-top-6 phone:-right-4 z-40 laptopsm:text-3xl tablet:text-2xl phone:text-xl">
                    <p><i class="fa-regular fa-circle-xmark"></i></p>
                </div>
                <div class="icontent">
                    <a href=" " style="width:30px;height: 30px;border-radius:30px;"
                        class="bg-slate-800 px-3 py-1 mt-1  text-orange-600 font-bold ">
                        <p>i</p>
                    </a>
                </div>
                <img src="./img/food3.png" alt=""
                    class="laptopsm:w-full laptopsm:h-24 tablet:w-40 tablet:h-24 phone:w-24 phone:h-16 border-b-1 bg-gray-400 ">
                <div
                    class="laptopsm:w-full laptopsm:h-28 tablet:w-40 tablet:h-24 phone:w-24 phone:h-20 bg-white dark:bg-slate-400 text-blue-600 font-semibold text-center laptopsm:pt-4 tablet:pt-3 phone:pt-2  phone:text-[10px]">
                    <h5 class="laptopsm:text-[15px] tablet:text-[15px]">Product name</h5>
                    <p class="laptopsm:text-[15px] tablet:text-[15px] pb-5">$45</p>
                    <hr>
                    <div
                        class="text-center  text-orange-500 font-bold bg-white dark:bg-slate-400 border-t-slate-300 laptopsm:w-full laptopsm:h-4 tablet:w-40 tablet:h-6 phone:w-24 phone:h-4 laptopsm:text-[12px] tablet:text-[12px]">
                        Available
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <div
                class="laptopsm:h-52 laptopsm:w-44 tablet:h-48 tablet:w-40 phone:h-36 phone:w-24 ms-5 rounded-md  border bottom-1 shadow-2xl shadow-blue-300 relative pb-0 dark:shadow-none">
                <div
                    class=" absolute px-3 py-1 mt-1 rounded-2xl text-red-600 font-bold laptopsm:-top-7 laptopsm:-right-5 tablet:-top-6 tablet:-right-5 phone:-top-6 phone:-right-4 z-40 laptopsm:text-3xl tablet:text-2xl phone:text-xl">
                    <p><i class="fa-regular fa-circle-xmark"></i></p>
                </div>
                <div class="icontent">
                    <a href=" " style="width:30px;height: 30px;border-radius:30px;"
                        class="bg-slate-800 px-3 py-1 mt-1  text-orange-600 font-bold ">
                        <p>i</p>
                    </a>
                </div>
                <img src="./img/food3.png" alt=""
                    class="laptopsm:w-full laptopsm:h-24 tablet:w-40 tablet:h-24 phone:w-24 phone:h-16 border-b-1 bg-gray-400 ">
                <div
                    class="laptopsm:w-full laptopsm:h-28 tablet:w-40 tablet:h-24 phone:w-24 phone:h-20 bg-white dark:bg-slate-400 text-blue-600 font-semibold text-center laptopsm:pt-4 tablet:pt-3 phone:pt-2  phone:text-[10px]">
                    <h5 class="laptopsm:text-[15px] tablet:text-[15px]">Product name</h5>
                    <p class="laptopsm:text-[15px] tablet:text-[15px] pb-5">$45</p>
                    <hr>
                    <div
                        class="text-center  text-orange-500 font-bold bg-white dark:bg-slate-400 border-t-slate-300 laptopsm:w-full laptopsm:h-4 tablet:w-40 tablet:h-6 phone:w-24 phone:h-4 laptopsm:text-[12px] tablet:text-[12px]">
                        Available
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>

</html>
