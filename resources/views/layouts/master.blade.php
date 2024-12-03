<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('title') </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body>
    <!-- navbar goes here -->
    <nav class="bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between">

                <div class="flex space-x-4">
                    <!-- logo -->
                    <div>
                        <a href=" {{ route('home') }} "
                            class="flex items-center py-5 px-2 text-gray-700 hover:text-gray-900">
                            <svg class="h-6 w-6 mr-1 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                            <span class="font-bold">Blog Laravel</span>
                        </a>
                    </div>

                    <!-- primary nav -->
                    <div class="hidden md:flex items-center space-x-1">
                        @auth
                            <a href="{{route('articles')}}" class="py-5 px-3 text-gray-700 hover:text-gray-900">Les
                                articles</a>
                            <a href="{{route('creation')}}" class="py-5 px-3 text-gray-700 hover:text-gray-900">Nouvel
                                article</a>

                            <button>
                                <form action="{{ route('logout') }}" method="POST"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                    @csrf
                                    <input type="submit" value="Se déconnecter">
                                </form>
                            </button>

                            <a href="{{route('profile')}}" class="py-5 px-3 text-gray-700 hover:text-gray-900"> Profile </a>
                        @endauth
                    </div>
                </div>

                <!-- secondary nav -->
                <div class="hidden md:flex items-center space-x-1">
                    @guest
                        <a href="{{route('login')}}" class="py-5 px-3">Se connecter</a>
                        <a href="{{route('register')}}"
                            class="py-2 px-3 bg-yellow-400 hover:bg-yellow-300 text-yellow-900 hover:text-yellow-800 rounded transition duration-300">S'inscrire</a>
                    @endguest
                </div>

                <!-- mobile button goes here -->
                <div class="md:hidden flex items-center">
                    <button class="mobile-menu-button">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- mobile menu -->
        <div class="mobile-menu hidden md:hidden">
            <a href="{{route('articles')}}" class="py-5 px-3 text-gray-700 hover:text-gray-900">Les articles</a>
        </div>
    </nav>

    <!-- content goes here -->
    <div class="p-6">
        @include('messages.notif-messages')

        @yield('content')
    </div>

</body>

</html>