<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../dist/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="customize.css">
</head>

<body
    style="background-image: url(./Refracted\ Radiance\ \(4\).png);background-repeat: no-repeat;background-size: cover;"
    class="z-50">
    <div class="mx-auto items-center justify-center flex h-screen pt-3">
        <div class=" shadow-topshadow rounded overflow-hidden ">
            <div class="grid grid-flow-row h-full w-[550px]">
                <div
                    class="flex items-center justify-center row-span-3 shadow-inner shadow-slate-300 lg:w-full tablet:w-full phone:w-3/4 h-[100px]">
                    <div class="text-center ">
                        <h1 class=" text-green-600 text-4xl font-bold tracking-widest drop-shadow-md">HUNGRY HAVEN
                        </h1>
                    </div>
                </div>
                <div class=" row-span-9 w-full shadow-inner shadow-purple-100 bg-blue-100  pb-8 pt-8">
                    <div class="laptopsm:pt-20 tablet:pt-16 phone:pt-5">
                        <div class="flex justify-center items-center mb-5 ">
                            <div class="w-14 h-14 rounded-full bg-green-600 border-2 border-slate-200">
                                <div class="flex justify-center items-center">
                                    <i class="fa-regular fa-user text-4xl text-slate-200  pt-1"></i>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('staff.login') }}" method="POST">
                            @csrf
                            <div class="ps-20">
                                <div class="relative mt-2 rounded-md shadow-sm">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 ">
                                        <span class="text-gray-500 sm:text-sm me-5">
                                            <i class="fa-solid fa-envelope mr-5 ic bg-slate-200 rounded-[5px] w-5 h-5 text-center "
                                                style="padding-top:2px;"></i>
                                    </div>
                                    <input type="email" name="email"
                                        class="in pl-10 mb-5 mt-1 block w-4/5 px-3 py-2 bg-white border border-slate-300 rounded-2xl text-sm shadow-sm placeholder-slate-400 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:invalid:ring-pink-500 "
                                        placeholder="your@gmail.com" name="" id="">

                                </div>
                                @error('email')
                                    <p class="text-red-500 -mt-5">{{ $message }}</p>
                                @enderror
                                <div class="relative mt-2 rounded-md shadow-sm">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <span class="text-gray-500 sm:text-sm"><i
                                                class="fa-solid fa-lock ic2 bg-slate-200 rounded-md w-5 h-5 text-center"
                                                style="padding-top:2px;"></i></span>
                                    </div>
                                    <input type="password" name="password"
                                        class="in2 pl-10 mb-3 mt-1 block w-4/5 px-3 py-2 bg-white border border-slate-300 rounded-2xl text-sm shadow-sm placeholder-slate-400 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:invalid:ring-pink-500"
                                        placeholder="password" name="" id="">
                                </div>
                                @error('password')
                                    <p class="text-red-500 -mt-5">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 flex justify-center">
                                <button type="submit"
                                    class="w-3/4 text-white  bg-green-600 px-1 py-2 rounded-2xl mt-4 font-bold laptopsm:text-lg tablet:text-md phone:text-sm  ">Log
                                    in</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
</body>
<script>
    var put2 = document.querySelector(".in2");
    var ic2 = document.querySelector(".ic2");
    put2.addEventListener('mouseover', (event) => {
        ic2.style.color = "green";
        ic2.style.boxShadow = "-1px -1px 8px #16a34a";
    });
    put2.addEventListener('mouseout', (event) => {
        ic2.style.color = "gray";
        ic2.style.backgroundColor = "rgb(226, 232, 240)";
    });
    var put = document.querySelector(".in");
    var ic = document.querySelector(".ic");
    put.addEventListener('mouseover', (event) => {
        ic.style.color = "green";
        ic.style.boxShadow = "-1px -1px 8px #16a34a";
    });
    put.addEventListener('mouseout', (event) => {
        ic.style.color = "gray";
        ic.style.backgroundColor = "rgb(226, 232, 240)";
    });
</script>

</html>
