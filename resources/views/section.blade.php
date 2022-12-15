@php
    use App\Models\Section;
@endphp

@extends('layouts.app')

@section('title', "{$section->name}")

@section('main')


<form class="ui large form submit-form" 
    data-method="POST" 
    data-action="/section/update" 
    data-callback="reload"
>
    @csrf
    <x-field id="id" name="id" type="hidden" value="">{{  $section->id  }}</x-field>
    
    <x-field id="name" name="name" type="text" label="Name" >{{  $section->name  }}</x-field>

    <x-field label="Select Course" type="dropdown" name="course_id" id="course_id">
        @foreach (\App\Models\Course::all() as $course)
            <option value="{{ $course->id }}">{{ $course->name }}</option>
        @endforeach
    </x-field>
    <button class="ui big blue button mt-12" type="submit">Save</button>
</form>

@endsection 

@section('scripts')
    
@endsection
