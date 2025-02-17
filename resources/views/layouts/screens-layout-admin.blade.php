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
        <div class="container mx-auto px-4">
            <div class="h-16 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <button class="text-white hover:text-[#cebd20]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <h1 class="text-xl font-semibold">Sistema de Turnos Bancarios</h1>
                </div>
                <div class="flex items-center gap-4">
                    <button class="text-white hover:text-[#cebd20]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
                    <button class="text-white hover:text-[#cebd20]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </button>
{{--                    <form method="POST" action="{{ route('logout') }}" class="inline">--}}
{{--                        @csrf--}}
{{--                        <button type="submit" class="text-white hover:text-[#cebd20]">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />--}}
{{--                            </svg>--}}
{{--                        </button>--}}
{{--                    </form>--}}
                </div>
            </div>
        </div>
    </header>

    <!-- Contenido Principal -->
    <div class="flex flex-1">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg">
            <nav class="p-4 space-y-2">
                <a href="#" class="block px-4 py-2 rounded-lg text-gray-700 hover:bg-[#13b895] hover:text-white">
                    Dashboard
                </a>
                <a href="#" class="block px-4 py-2 rounded-lg text-gray-700 hover:bg-[#13b895] hover:text-white">
                    Gestión de Turnos
                </a>
                <a href="#" class="block px-4 py-2 rounded-lg text-gray-700 hover:bg-[#13b895] hover:text-white">
                    Estadísticas
                </a>
                <a href="#" class="block px-4 py-2 rounded-lg text-gray-700 hover:bg-[#13b895] hover:text-white">
                    Configuración
                </a>
            </nav>
        </aside>

        <!-- Contenido -->
        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>
</div>

@stack('scripts')
</body>
</html>
