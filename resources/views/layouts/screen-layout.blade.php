<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Turnos')</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-gray-100">
<div class="min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-[#1e3a8a] text-white shadow-lg">
            <div class="h-16 flex items-center justify-center">
                <h1 class="text-4xl font-bold">@yield('subtitle', 'subtitlepage')</h1>
            </div>

    </header>

    <!-- Contenido -->
    <main class="flex-1 p-8">
        @yield('content')
    </main>
</div>

@stack('scripts')
</body>
</html>
