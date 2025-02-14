@extends('layouts.screen-layout')

@section('title', 'Ver Turnos')

@section('subtitle', 'Atencion de turnos')

@section('content')

    <div class="flex flex-col gap-4 items-center justify-center bg-[#1e3a8a]">
        <div class="flex gap-4">
            <div class="flex flex-col gap-4">
                <div class="text-3xl text-white font-bold font-mochiy-pop-one">Completados</div>
                <div
                    class="w-64 h-32 bg-[#a5c67b] text-[#15663f] text-5xl font-bold rounded-3xl border-4 border-[#15663f] flex items-center justify-center">
                    <img src="{{ asset('img/ok-image.png') }}" alt="Ok">
                    <span>23</span>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <div class="text-3xl text-white font-bold font-mochiy-pop-one">En espera</div>
                <div
                    class="w-64 h-32 bg-[#72a6bf] text-[#1e3a8a] text-5xl font-bold rounded-3xl border-4 border-[#19274f] flex items-center justify-center">
                    <img src="{{ asset('img/watch-image.png') }}" alt="Ok">
                    <span>25</span>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <div class="text-3xl text-white font-bold font-mochiy-pop-one">En servicio</div>
                <div
                    class="w-64 h-32 bg-[#f6ffaf] text-[#f5ba01] text-5xl font-bold rounded-3xl border-4 border-[#f5ba01] flex items-center justify-center">
                    <img src="{{ asset('img/people-image.png') }}" alt="Ok">
                    <span>5</span>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-[50vw] gap-4">
            <div class="text-3xl text-white font-bold font-mochiy-pop-one">
                Turnos en espera
            </div>
            <div class="flex flex-wrap gap-y-4">
                <div class="w-1/3">
                    <div class="w-64 h-32  text-white font-bold text-7xl p-4 rounded-3xl flex items-center justify-center"
                        style="background-color: #13b895">
                        A000
                    </div>
                </div>
                <div class="w-1/3">
                    <div class="w-64 h-32  text-white font-bold text-7xl p-4 rounded-3xl flex items-center justify-center"
                        style="background-color: #cebd20">
                        A000
                    </div>
                </div>
                <div class="w-1/3">
                    <div class="w-64 h-32  text-white font-bold text-7xl p-4 rounded-3xl flex items-center justify-center"
                        style="background-color: #cebd20">
                        A000
                    </div>
                </div>
                <div class="w-1/3">
                    <div class="w-64 h-32  text-white font-bold text-7xl p-4 rounded-3xl flex items-center justify-center"
                        style="background-color: #cebd20">
                        A000
                    </div>
                </div>
                <div class="w-1/3">
                    <div class="w-64 h-32  text-white font-bold text-7xl p-4 rounded-3xl flex items-center justify-center"
                        style="background-color: #cebd20">
                        A000
                    </div>
                </div>
                <div class="w-1/3">
                    <div class="w-64 h-32  text-white font-bold text-7xl p-4 rounded-3xl flex items-center justify-center"
                        style="background-color: #cebd20">
                        A000
                    </div>
                </div>
            </div>
        </div>
        <div class="w-[300px] h-[80px] font-mochiy-pop-one text-white text-3xl bg-[#ef3420] rounded-2xl flex items-center justify-center">
            Siguiente turno
        </div>
    </div>

@endsection