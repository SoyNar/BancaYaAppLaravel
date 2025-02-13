@extends('layouts.screen-layout')

@section('title', 'Ver Turnos')

@section('subtitle', 'BancaYa - Turnos')

@section('content')
    <div class="flex flex-col gap-4">

        <div class="flex gap-4">
            <div
                class="w-1/2 bg-[#1e3a8a] text-white rounded-10xl p-4 rounded-[45px] flex gap-10 flex-col items-center justify-center">
                <h1 class="text-6xl font-bold font-mochiy-pop-one">Pide tu prestamo ya</h1>
                <img src="{{ asset('img/loan-purple.png') }}" alt="Logo">
            </div>

            <div class="w-1/2 bg-blue-300 p-4">
                <table class="min-w-full bg-white border-5 border-black-300" style="text-align: center;">
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border border-black-300 text-7xl">Modulos</th>
                        <th class="px-4 py-2 border border-black-300 text-7xl">Turno</th>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="px-4 py-2 border border-black-300">
                            <span class="text-7xl font-black">1</span>
                        </td>
                        <td class="px-2 py-2 border border-black-300 flex items-center justify-center">
                            <div class="w-64 h-32  text-white font-bold text-7xl p-4 rounded-3xl flex items-center justify-center"
                                style="background-color: #cebd20">
                                A000
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="px-4 py-2 border border-black-300">
                            <span class="text-7xl font-black">2</span>
                        </td>
                        <td class="px-2 py-2 border border-black-300 flex items-center justify-center">
                            <div class="w-64 h-32  text-white font-bold text-7xl p-4 rounded-3xl flex items-center justify-center"
                                style="background-color: #99b83c">
                                V045
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="px-4 py-2 border border-black-300">
                            <span class="text-7xl font-black">3</span>
                        </td>
                        <td class="px-2 py-2 border border-black-300 flex items-center justify-center">
                            <div class="w-64 h-32  text-white font-bold text-7xl p-4 rounded-3xl flex items-center justify-center"
                                style="background-color: #ed1f24">
                                B020
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="px-4 py-2 border border-black-300">
                            <span class="text-7xl font-black">4</span>
                        </td>
                        <td class="px-2 py-2 border border-black-300 flex items-center justify-center">
                            <div class="w-64 h-32  text-white font-bold text-7xl p-4 rounded-3xl flex items-center justify-center"
                                style="background-color: #1e3a8a">
                                Q055
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="px-4 py-2 border border-black-300">
                            <span class="text-7xl font-black">5</span>
                        </td>
                        <td class="px-2 py-2 border border-black-300 flex items-center justify-center">
                            <div class="w-64 h-32  text-white font-bold text-7xl p-4 rounded-3xl flex items-center justify-center"
                                style="background-color: #cebd20">
                                A001
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <script>
        // Pasar el array PHP a JavaScript usando JSON
        const codes = @json($codes);
        const mods = @json($modules);

        // Imprimir los códigos y su valor en la consola
        codes.forEach(code => {
            console.log(`Código: ${code.code}, Estado: ${code.value ? 'Activo' : 'Inactivo'}`);
        });

        mods.forEach(module => {
            console.log(`Módulo: ${module[0]}, Estado: ${module[1]}`);
        });

        mods.forEach(module => {
            const moduleName = module[0];
            const moduleStatus = module[1];

            // Condicional encadenada para verificar el estado del módulo
            if (moduleStatus === "Disponible") {
                console.log(`${moduleName} está Disponible.`);
                // Filtrar los códigos activos que empiecen con "Q"
                let activeCode = codes.find(code => code.code.startsWith('Q') && code.value === true);

                // Si no hay códigos con "Q", buscar en los que empiezan con "B"
                if (!activeCode) {
                    activeCode = codes.find(code => code.code.startsWith('B') && code.value === true);
                }

                // Si no hay códigos con "B", buscar en los que empiezan con "A"
                if (!activeCode) {
                    activeCode = codes.find(code => code.code.startsWith('A') && code.value === true);
                }

                // Si no hay códigos con "A", buscar en los que empiezan con "V"
                if (!activeCode) {
                    activeCode = codes.find(code => code.code.startsWith('V') && code.value === true);
                }

                // Si hay un código activo, mostramos el primero que encontramos
                if (activeCode) {
                    console.log(`Primer código activo encontrado: ${activeCode.code}`);
                    activeCode.value = false;
                } else {
                    console.log("No hay códigos activos disponibles.");
                }
            } else if (moduleStatus === "No Disponible") {
                console.log(`${moduleName} no está Disponible.`);
            } else {
                console.log(`Estado desconocido para el módulo: ${moduleName}`);
            }
        });

        codes.forEach(code => {
            console.log(`Código: ${code.code}, Estado: ${code.value ? 'Activo' : 'Inactivo'}`);
        });
    </script>
@endsection