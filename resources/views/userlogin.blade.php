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
    {{-- @vite('resources/css/app.css') --}}
    <link rel="stylesheet" href="customize.css">
</head>

<body class="z-50 bg-slate-100 mb-10">

    <div class="mx-auto items-center justify-center flex h-auto pt-32">
        <div class=" rounded-lg drop-shadow-2xl overflow-hidden  bg-white laptopsm:w-[800px]">
            <div class="pt-5 mx-auto items-center justify-center flex   text-green-500">
                Hungry Heaven
            </div>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="w-full px-7 py-8 ">
                    <a href="auth/google"
                        class="w-[500px] bg-green-500 text-white px-3 py-1 rounded-3xl  flex items-center justify-center mb-9 drop-shadow-lg">
                        <i class="fa-brands fa-google text-2xl me-2 text-red-600"></i>
                        Login with
                        Google</a>

                    <div class="mb-9">
                        <hr>
                        <p
                            class="bg-white border bottom-1 rounded-[30px] w-[30px] h-[30px] flex items-center justify-center pb-1 ms-56 -mt-4 text-base font-bold drop-shadow-lg">
                            or</p>
                    </div>
                    <div class="mb-4 mt-1">
                        <input type="email"
                            class="in pl-4  block w-full py-2 bg-white border border-slate-300 rounded-2xl text-sm shadow-sm placeholder-slate-400 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:invalid:ring-pink-500  drop-shadow-lg"
                            placeholder="Email" name="email" id="">
                        @error('email')
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

                    <button type="submit"
                        class="w-[500px] bg-green-500 text-white px-3 py-2 rounded-3xl  flex items-center justify-center mb-9 drop-shadow-lg font-bold">Sign
                        in</button>
                    <div class="flex justify-between">
                        <div class="">
                            <input type="checkbox" name="remember" id="" class="w-4 h-4 me-1 ms-1">Remember me
                        </div>
                        <p class="text-blue-600 ms-9 drop-shadow-lg"><a href="forgot-password">Forgot Password?</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <p class="mx-auto items-center justify-center flex pt-3">Don't have an account? <a href="/register"><span
                class="text-green-500 ps-1 font-bold underline"> Sign
                up
                here</span></a></p>
</body>

</html>
