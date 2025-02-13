@extends('layouts.screen-layout')

@section('title', 'Confirmación de Turno')
<div class="bg-white rounded-lg shadow p-6">
    @section('subtitle', 'Confirmacion')
</div>
@section('content')
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="max-w-md w-full bg-white rounded-lg shadow-lg p-8">
            @if(session('success'))
                <x-alert type="success" :message="session('success')" />
            @endif

            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-8">Su turno ha sido generado</h2>

                <div class="bg-blue-50 rounded-lg p-6 mb-6">
                    <div class="text-5xl font-bold text-blue-800 mb-2">
                        {{ session('turn.ticket') }}
                    </div>
                    <p class="text-gray-600">Número de turno</p>
                </div>

                <div class="space-y-4 mb-8">

                    <div>
                        <h3 class="font-semibold text-gray-700">Espere su turno en la sala</h3>
                       <h4 class="font-semibold text-gray-700" >Hora:</h4> <p class="text-gray-900">{{ session('turn.date_attention') }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
