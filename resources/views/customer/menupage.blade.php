<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('layout.need-style-link')
    <style>
        .icontent {
            width: 50px;
            height: 70px;
            top: 35%;
            left: 40%;
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            opacity: 0;
            transition: 0.4s;

        }

        .icontent:hover {
            opacity: 1;
        }

        .icontent>* {
            transform: translateY(25px);
            transition: transform 0.4s;
        }

        .icontent:hover>* {
            transform: translateY(0px);
        }
    </style>
    @livewireStyles
</head>

<body>
    @include('layout.nav-bar')
    <div class=" container">
        @livewire('customer.menu-page', ['menus' => $menus, 'categories' => $categories])

    </div>
    @include('layout.footer')
    {{-- @include('layout.need-js-link') --}}

    {{-- <script src="https://unpkg.com/scrollreveal"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
    <script src="{{ asset('js/customer/menudarkmode.js') }}"></script>
    <script src="{{ asset('js/customer/slide.js') }}"></script>
    <script src="{{ asset('js/customer/main.js') }}"></script>
    @livewireScripts
</body>

</html>
