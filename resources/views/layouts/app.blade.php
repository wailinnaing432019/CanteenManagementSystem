<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/build.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
    <title>@yield('title')</title>

    @livewireStyles
    <style>
        .loader {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: inline-block;
            position: relative;
            background: linear-gradient(0deg, rgba(255, 61, 0, 0.2) 33%, #ff3d00 100%);
            box-sizing: border-box;
            animation: rotation 1s linear infinite;
        }

        .loader::after {
            content: '';
            box-sizing: border-box;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #263238;
        }

        @keyframes rotation {
            0% {
                transform: rotate(0deg)
            }

            100% {
                transform: rotate(360deg)
            }
        }

        * {
            font-family: 'Lobster', cursive;
            font-family: 'Quicksand', sans-serif;
        }

        input:checked~.dot {
            transform: translateX(100%);
            background-color: #ef8009;
        }

        .show-sidebar .sidebar {
            left: 0;
        }

        .logo {
            position: relative;
        }

        .logo h3 {
            position: absolute;
            font-size: 2em;
        }

        .logo h3:nth-child(1) {
            color: transparent;
            -webkit-text-stroke: 3px rgb(244, 102, 26);
        }

        .logo h3:nth-child(2) {
            color: yellow;
            animation: animate 8s ease-in-out infinite;
        }

        @keyframes animate {

            0%,
            100% {
                clip-path: polygon(0 63%, 16% 42%, 30% 47%, 39% 51%, 52% 54%, 64% 54%, 75% 54%, 100% 63%, 100% 100%, 0% 98%, 99% 98%, 99% 98%, 100% 98%, 0 100%);
            }

            50% {
                clip-path: polygon(0 71%, 8% 67%, 17% 64%, 36% 57%, 52% 54%, 63% 50%, 79% 45%, 100% 42%, 100% 100%, 0% 98%, 99% 98%, 99% 98%, 100% 98%, 0 100%);
            }
        }
    </style>

</head>

<body class="dark:bg-slate-950">

    @livewireScripts

    @stack('scripts')

    <script>
        window.addEventListener('load', () => {
            document.querySelector(".loading").style.display = "none";
            document.body.classList.add('show-sidebar');
        })
    </script>

    <script src="{{ asset('js/admin/darkmode.js') }}"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/noframework.waypoints.min.js"
        integrity="sha512-fHXRw0CXruAoINU11+hgqYvY/PcsOWzmj0QmcSOtjlJcqITbPyypc8cYpidjPurWpCnlB8VKfRwx6PIpASCUkQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
</body>

</html>
