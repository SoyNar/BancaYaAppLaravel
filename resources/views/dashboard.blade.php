@extends('layouts.screen-layout')

@section('title', 'Generar turno')

<div class="bg-white rounded-lg shadow p-6">
    @section('subtitle', 'Genera tu turno')
</div>
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('error'))
        <x-alert type="danger" :message="session('error')" />
    @endif

    <!-- Mostrar mensajes de éxito -->
    @if (session('success'))
        <x-alert type="success" :message="session('success')" />
    @endif



    <form action="{{route('createTurn')}}" method="POST">
        @csrf
        @method('POST')
        <div class="flex justify-center items-center min-h-screen">
            <div class="w-full max-w-3xl px-4 mx-auto flex flex-col items-center space-y-6">
                <!-- Input de identificación -->
                <input
                    type="text"
                    name="document"
                    value="{{old('document')}}"
                    placeholder="Número de identificación"
                    class="w-full p-4 border border-gray-300 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-lg"
                >
                @error('document')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror


                <!-- Categorías  -->
                <div class="w-full max-w-3xl grid grid-cols-2 gap-4">
                    @foreach(\App\Enums\CategoryEnum::cases() as $category)
                        @php
                            $bgColor = in_array($category, [
                                   App\Enums\CategoryEnum::ACCOUNT_OPENING,
                                   App\Enums\CategoryEnum::CREDIT_REQUEST
                               ]) ? 'bg-blue-800' : 'bg-teal-600';
                        @endphp

                        <input type="radio"
                               name="category"
                               id="category_{{ $category->value }}"
                               value="{{ $category->value }}"
                               class="hidden peer"
                               {{ old('category') == $category->value ? 'checked' : '' }}
                               required >
                        <label
                            for="category_{{ $category->value }}"
                            class="w-full text-center py-3 px-6 {{ $bgColor }} text-white font-bold rounded-lg cursor-pointer peer-checked/{{ $category->value }}:bg-blue-500"

                        >
                            @switch($category)
                                @case(App\Enums\CategoryEnum::ACCOUNT_OPENING)
                                    Apertura de Cuenta
                                    @break
                                @case(App\Enums\CategoryEnum::DEPOSIT_WITHDRAWALS)
                                    Retiros y depósitos
                                    @break
                                @case(App\Enums\CategoryEnum::CONSULTATION_ASSESSMENT)
                                    Consulta y asesoría
                                    @break
                                @case(App\Enums\CategoryEnum::CREDIT_REQUEST)
                                    Solicitud de crédito
                                    @break
                            @endswitch
                        </label>

                    @endforeach
                </div>
                @error('category')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror


                <!-- Botón Generar Turno -->
                <button class="w-full bg-blue-800 hover:bg-amber-500 text-white font-bold py-3 px-6 border-b-4 border-blue-800 hover:border-blue-500 rounded-lg text-lg">
                    Generar turno
                </button>
            </div>
        </div>


    </form>

@endsection
