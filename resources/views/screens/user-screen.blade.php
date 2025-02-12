@extends('layouts.screen-layout')

@section('title', 'Generar turno')

@section('subtitle', 'Genera tu turno')

@section('content')

    <form>
        <div class="flex justify-center items-center min-h-screen">
            <div class="w-full max-w-3xl px-4 mx-auto flex flex-col items-center space-y-6">
                <!-- Input de identificación -->
                <input type="text" placeholder="Número de identificación"
                    class="w-full p-4 border border-gray-300 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-lg">

                <!-- Categorías en dos columnas -->
                <div class="w-full max-w-3xl grid grid-cols-2 gap-4">
                    <input type="radio" id="opcion1" name="categoria" value="opcion1" class="hidden peer/opcion1">
                    <label for="opcion1"
                        class="w-full text-center py-3 px-6 bg-blue-800  text-white font-bold rounded-lg cursor-pointer peer-checked/opcion1:bg-blue-500 peer-checked/opcion1:text-white">
                        Apertura de Cuenta
                    </label>

                    <input type="radio" id="opcion2" name="categoria" value="opcion2" class="hidden peer/opcion2">
                    <label for="opcion2"
                        class="w-full text-center py-3 px-6 bg-teal-600  text-white font-bold rounded-lg cursor-pointer peer-checked/opcion2:bg-blue-500 peer-checked/opcion2:text-white">
                        Retiros y depósitos
                    </label>

                    <input type="radio" id="opcion3" name="categoria" value="opcion3" class="hidden peer/opcion3">
                    <label for="opcion3"
                        class="w-full text-center py-3 px-6 bg-teal-600 text-white font-bold rounded-lg cursor-pointer peer-checked/opcion3:bg-blue-500 peer-checked/opcion3:text-white">
                        Consulta y asesoria
                    </label>

                    <input type="radio" id="opcion4" name="categoria" value="opcion4" class="hidden peer/opcion4">
                    <label for="opcion4"
                        class="w-full text-center py-3 px-6 bg-blue-800   text-white font-bold rounded-lg cursor-pointer peer-checked/opcion4:bg-blue-500 peer-checked/opcion4:text-white">
                        Solicitud de credito
                    </label>
                </div>

                <!-- Botón Generar Turno -->
                <button
                    class="w-full bg-blue-800 hover:bg-amber-500 text-white font-bold py-3 px-6 border-b-4 border-blue-800 hover:border-blue-500 rounded-lg text-lg">
                    Generar turno
                </button>
            </div>
        </div>


    </form>

@endsection