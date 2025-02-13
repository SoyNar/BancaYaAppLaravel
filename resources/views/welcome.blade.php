<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Estilos de Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Estilos personalizados -->
</head>
<body class="font-sans antialiased bg-[#1e3a8a] text-white min-h-screen">
<div class="container mx-auto px-4">
    <header class="py-6">
        @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-end">
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-white">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-white">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-white">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <main class="mt-6">
        <div class="text-center">
            <img
                src="{{ asset('img/bancaya.png') }}"
                alt="Descripción de la imagen"
                class=" max-w-xl mx-auto rounded-lg scale-125 "
            >
        </div>
    </main>

    <footer class="py-16 text-center text-sm text-white/70">
        <!-- Contenido del footer aquí -->
    </footer>
</div>
</body>
</html>
