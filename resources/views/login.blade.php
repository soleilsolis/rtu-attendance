@extends('layouts.guest')

@section('main')
    <div class="h-full flex items-center">

        <div class="px-20 py-12 portrait:px-5 portrait:m-5 rounded-[30px] drop-shadow-lg bg-white/[0.85] mx-auto max-w-[600px] w-full ">
            <div class="mb-14 flex gap-x-5">
                <img class="w-28 portrait:w-20" src="{{ Vite::asset('/resources/image/AJ2.png') }}" alt="">
                <img class="w-28 portrait:w-20 drop-shadow-md" src="{{ Vite::asset('/resources/image/ce.png') }}" alt="">
            </div>
            
            <h1 class="text-5xl font-bold">WELCOME</h1>
            <h1 class="text-3xl font-semibold my-5">RTU Computer Laboratory</h1>
            
            <x-forms.login ></x-forms.login>
        </div>
    </div>
@endsection
