@php
    use App\Models\Section;
@endphp

@extends('layouts.app')

@section('title', "Schedule {$schedule->id}")

@section('main')


<form class="ui large form submit-form" data-method="POST" data-action="/schedule/update" data-callback="redirector">
    @csrf
    <x-field id="id" name="id" type="hidden" value="">{{  $schedule->id  }}</x-field>
    
    <x-field label="Instance" type="dropdown" name="instance_id" id="instance_id">
        @foreach (\App\Models\Instance::all() as $instance)
            <option @if($instance->id == $schedule->instance->id) selected @endif  value="{{ $instance->id }}">{{ $instance->user->first_name }} {{ $instance->user->last_name }} - {{ $instance->subject->name }}</option>
        @endforeach
    </x-field>

    <x-field label="Section" type="dropdown" name="section_id" id="section_id">
        @foreach (\App\Models\Section::all() as $section)
            <option @if($section->id == $schedule->section->id) selected @endif  value="{{ $section->id }}">{{ $section->name }}</option>
        @endforeach
    </x-field>
    <x-field id="start_time" name="start_time" type="time" label="Start Time">{{ $schedule->start_time }}</x-field>
    <x-field id="end_time" name="end_time" type="time" label="End Time">{{ $schedule->end_time }}</x-field>

    <x-field label="Days" type="dropdown" name="day" id="day">
        
        <option value="1">Monday</option>
        <option value="2">Tuesday</option>
        <option value="3">Wednesday</option>
        <option value="4">Thursday</option>
        <option value="5">Friday</option>
        <option value="6">Saturday</option>
        <option value="7">Sunday</option>
    
    </x-field>

    <button class="ui big blue button mt-12" type="submit">Save</button>
</form>

<form class="ui large form submit-form" data-method="DELETE" data-action="/schedule/delete/{{ $schedule->id }}" data-callback="redirector">
    <button class="ui big red button mt-12" type="submit">Delete</button>

</form>

@endsection 

@section('scripts')
    <script>
        function redirector() {
            location.href = "/schedules";
        }
    </script>
@endsection
