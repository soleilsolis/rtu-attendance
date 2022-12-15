@php
    use App\Models\Section;
@endphp

@extends('layouts.app')

@section('title', "{$course->name}")

@section('main')


<form class="ui large form submit-form" 
    data-method="POST" 
    data-action="/course/update" 
    data-callback="reload"
>
    @csrf
    <x-field id="id" name="id" type="hidden" value="">{{  $course->id  }}</x-field>
    
    <x-field id="name" name="name" type="text" label="Name" >{{  $course->name  }}</x-field>

    <button class="ui big blue button mt-12" type="submit">Save</button>
</form>

@endsection 

@section('scripts')
    
@endsection
