<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+One&display=swap" rel="stylesheet">
    <title>@yield('title', 'Sistema de Turnos')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <div class="flex flex-col">
        <!-- Header -->
        <header class="bg-[#1e3a8a] text-white shadow-lg">
            <div class="container mx-auto px-4">
                <div class="h-48 flex items-center justify-center">
                    <div class="flex items-end space-x-4">
                        <h1 class="text-8xl font-bold font-mochiy-pop-one">@yield('subtitle', 'subtitlepage')</h1>
                        @if(Request::is('seetickets'))
                            <img src="{{ asset('img/cards.png') }}" alt="tarjetas de credito"
                                class="w-18 h-10 object-cover">
                        @endif
                    </div>
                </div>
            </div>
        </header>

        <!-- Contenido -->
        <main class="flex-1 p-8 w-screen h-screen">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>

</html>