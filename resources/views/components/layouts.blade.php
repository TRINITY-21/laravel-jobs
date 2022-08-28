<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <title>LaraGigs | Find Laravel Jobs & Projects</title>
    </head>

    <body>
                <nav class="flex justify-between items-center mb-4">
            <a href="/"
                ><img class="w-24" src="images/logo.png" alt="" class="logo"
            /></a>

                        @auth
                                        <h1 style="font-weight: bold; margin-left:40%; text-transfotrm:uppercase">Welcome, {{auth()->user()->name}}</h1>

                        @endauth
            <ul class="flex space-x-6 mr-6 text-lg">

                    @guest
                                        <li>
                    <a href="{{ url('register') }}" class="hover:text-laravel"
                        ><i class="fa-solid fa-user-plus"></i> Register</a
                    >
                </li>
                <li>
                    <a href="{{ url('login') }}" class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a
                    >
                </li>
                    @endguest
                           @auth
                                <ul class="flex space-x-6 mr-6 text-lg">
                <li>
                    <a href="{{ url('manage') }}" class="hover:text-laravel"
                        ><i class="fa-solid fa-gear"></i> Manage Gigs</a
                    >
                </li>
                <li>
                    <form action="{{ url('logout') }}" method="POST">
                        @csrf
                        <button>
                            <i class="fa-solid fa-door-closed"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
                           @endauth
            </ul>
        </nav>

        <x-footer></x-footer>





{{ $slot }}

    </body>
</html>
