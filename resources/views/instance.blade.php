@php
    use App\Models\Section;
@endphp

@extends('layouts.app')

@section('title', "{$instance->user->last_name}, {$instance->user->first_name}")

@section('main')


<form class="ui large form submit-form" 
    data-method="POST" 
    data-action="/instance/update" 
    data-callback="reload"
>
    @csrf
    <x-field id="id" name="id" type="hidden" value="">{{  $instance->id  }}</x-field>
    
    <x-field label="Professor" type="dropdown" name="user_id" id="user_id">
        @foreach (\App\Models\User::where('type', '=', 'professor')->get() as $user)
            <option @if($instance->user_id == $user->id) selected @endif value="{{ $user->id }}">{{ $user->last_name }}, {{ $user->first_name }}</option>
        @endforeach
    </x-field>

    <x-field label="Subject" type="dropdown" name="subject_id" id="subject_id">
        @foreach (\App\Models\Subject::all() as $subject)
            <option @if( $instance->subject_id == $subject->id) selected @endif value="{{ $subject->id }}">{{ $subject->name }}</option>
        @endforeach
    </x-field>  

    <x-field label="Active?" type="dropdown" name="active" id="active">
        
            <option value="0">Yes</option>
            <option value="1">No</option>
        
    </x-field>

    <button class="ui big blue button mt-12" type="submit">Save</button>
</form>

@endsection 

@section('scripts')
    
@endsection
