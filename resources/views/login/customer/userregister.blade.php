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

<body class="z-50 bg-slate-100">
    <div class="mx-auto items-center justify-center flex h-auto pt-10 pb-5">
        <div class=" rounded-lg drop-shadow-2xl overflow-hidden  bg-white laptopsm:w-[800px]">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="w-full px-12 pb-8 pt-2">
                    <button
                        class="w-[500px] text-green-500 px-3 py-2   flex items-center justify-center mb-12 drop-shadow-lg font-bold text-2xl">
                        Hungry Haven
                    </button>
                    <button
                        class="w-[500px] bg-green-500 text-white px-3 py-1 rounded-3xl  flex items-center justify-center mb-9 drop-shadow-lg">
                        <i class="fa-brands fa-google text-2xl me-2 text-red-600"></i>
                        Sign Up with
                        Google</button>

                    <div class="mb-9">
                        <hr>
                        <p
                            class="bg-white border bottom-1 rounded-[30px] w-[30px] h-[30px] flex items-center justify-center pb-1 ms-[48%] -mt-4 text-base font-bold drop-shadow-lg">
                            or</p>
                    </div>
                    <div class="mb-4 mt-1">
                        <input type="text"
                            class="in pl-4  block w-full py-2 bg-white border border-slate-300 rounded-2xl text-sm shadow-sm placeholder-slate-400 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:invalid:ring-pink-500  drop-shadow-lg"
                            placeholder="Username" value="{{ old('name') }}" name="name" id="">
                        @error('name')
                            <p class="text-red-700 pt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4 mt-1">
                        <input type="email"
                            class="in pl-4  block w-full py-2 bg-white border border-slate-300 rounded-2xl text-sm shadow-sm placeholder-slate-400 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:invalid:ring-pink-500  drop-shadow-lg"
                            placeholder="Email" value="{{ old('email') }}" name="email" id="">
                        @error('email')
                            <p class="text-red-700 pt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4 mt-1">
                        <input type="tel"
                            class="in pl-4  block w-full py-2 bg-white border border-slate-300 rounded-2xl text-sm shadow-sm placeholder-slate-400 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:invalid:ring-pink-500  drop-shadow-lg"
                            placeholder="09******" value="{{ old('phone') }}" name="phone" id="">
                        @error('phone')
                            <p class="text-red-700 pt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4 mt-1">
                        <input type="text"
                            class="in pl-4  block w-full py-2 bg-white border border-slate-300 rounded-2xl text-sm shadow-sm placeholder-slate-400 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:invalid:ring-pink-500  drop-shadow-lg"
                            placeholder="Address" value="{{ old('address') }}" name="address" id="">
                        @error('address')
                            <p class="text-red-700 pt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5 mt-1">
                        <input type="password"
                            class="in pl-4  block w-full py-2 bg-white border border-slate-300 rounded-2xl text-sm shadow-sm placeholder-slate-400 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:invalid:ring-pink-500  drop-shadow-lg"
                            placeholder="Password" name="password" id="">
                        @error('password')
                            <p class="text-red-700 pt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5 mt-1">
                        <input type="password"
                            class="in pl-4  block w-full py-2 bg-white border border-slate-300 rounded-2xl text-sm shadow-sm placeholder-slate-400 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:invalid:ring-pink-500  drop-shadow-lg"
                            placeholder="Confirmpassword" name="password_confirmation" id="">
                        @error('password_confirmation')
                            <p class="text-red-700 pt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button
                        class="w-[500px] bg-green-500 text-white px-3 py-2 rounded-3xl  flex items-center justify-center mb-9 drop-shadow-lg font-bold">Register
                    </button>
                    <p class="mx-auto items-center justify-center flex pt-2">If you have an account<a
                            href="{{ route('login') }}"><span class="text-green-500 ps-2 font-bold underline"> Sign
                                in
                            </span></a></p>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
