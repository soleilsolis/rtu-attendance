@extends('layouts.app')

@section('title', 'Schedules')

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
            <th>Instance</th>
            <th>Section</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Day</th>
            <th class="right aligned">Date</th>
        </thead>

        <tbody>
            @foreach ($schedules as $schedule)
                <tr onclick="location.href='/schedule/{{ $schedule->id }}'">
                    <td class="collapsing">{{ $schedule->id }}</td>
                    <td>{{ $schedule->name }}</td>
                    <td class="right aligned">{{ $schedule->created_at }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <div id="attendance-modal" class="ui basic small modal">
        <div class="bg-white shadow-md p-6 rounded-md overflow-auto">
            <h1 id="attendance-label" class="mb-10 text-black text-3xl font-bold">New Subject</h1>
            <form class="ui large form submit-form" data-method="POST" data-action="/schedules" data-callback="reload">
                @csrf

                <x-field label="Instance" type="dropdown" name="user_id" id="user_id">
                    @foreach (\App\Models\Instance::all() as $instance)
                        <option value="{{ $user->id }}">{{ $user->last_name }}, {{ $user->first_name }}</option>
                    @endforeach
                </x-field>

                <x-field label="Professor" type="dropdown" name="user_id" id="user_id">
                    @foreach (\App\Models\User::where('type', '=', 'professor')->get() as $user)
                        <option value="{{ $user->id }}">{{ $user->last_name }}, {{ $user->first_name }}</option>
                    @endforeach
                </x-field>
                <x-field id="name" name="name" type="text" label="Name"></x-field>

                <button class="ui big blue button mt-12" type="submit">Save</button>
            </form>

        </div>
    </div>
@endsection
