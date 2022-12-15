@extends('layouts.app')

@section('title', 'Instances')

@section('main')
    <div class="ui secondary menu">
        <div class="right menu">
            <div class="item">
                <button class="ui blue button" onclick="$('#attendance-modal').modal('show')">
                    <i class="plus icon"></i>
                    New
                </button>
            </div>
        </div>
    </div>
    <table class="ui selectable stackable table">
        <thead>
            <th class="collapsing">#</th>
            <th>Professor</th>
            <th>Section</th>
            <th>Subject</th>
            <th class="right aligned">Date</th>
        </thead>

        <tbody>
            @foreach ($instances as $instance)
                <tr onclick="location.href='/instance/{{ $instance->id }}'">
                    <td class="collapsing">{{ $instance->id }}</td>
                    <td>{{ $instance->user->last_name }}, {{ $instance->user->first_name }}</td>
                    <td> {{ $instance->user->section->course->name }} - {{ $instance->user->section->name }}</td>
                    <td>{{ $instance->subject->name }}</td>

                    <td class="right aligned">{{ $instance->created_at }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <div id="attendance-modal" class="ui basic small modal">
        <div class="bg-white shadow-md p-6 rounded-md overflow-auto">
            <h1 id="attendance-label" class="mb-10 text-black text-3xl font-bold">New Instance</h1>
            <form class="ui large form submit-form" data-method="POST" data-action="/instances" data-callback="reload">
                @csrf


                <x-field label="Professor" type="dropdown" name="user_id" id="user_id">
                    @foreach (\App\Models\User::where('type', '=', 'professor')->get() as $user)
                        <option value="{{ $user->id }}">{{ $user->last_name }}, {{ $user->first_name }}</option>
                    @endforeach
                </x-field>

                <x-field label="Subject" type="dropdown" name="subject_id" id="subject_id">
                    @foreach (\App\Models\Subject::all() as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </x-field>  

                <x-field label="Active?" type="dropdown" name="active" id="active">
                    
                        <option value="0">Yes</option>
                        <option value="1">No</option>
                    
                </x-field>

                <button class="ui big blue button mt-12" type="submit">Save</button>
            </form>

        </div>
    </div>
@endsection
