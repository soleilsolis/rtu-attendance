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
                    <td>{{ $schedule->instance->user->first_name }} {{ $schedule->instance->user->last_name }} - {{ $schedule->instance->subject->name }}</td>
                    <td>{{ $schedule->section->course->name }} {{ $schedule->section->name }}</td>
                    <td>{{ $schedule->start_time }}</td>
                    <td>{{ $schedule->end_time }}</td>
                    <td>{{ $schedule->day }}</td>
                    <td class="right aligned">{{ $schedule->created_at }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <div id="attendance-modal" class="ui basic small modal">
        <div class="bg-white shadow-md p-6 rounded-md overflow-auto">
            <h1 id="attendance-label" class="mb-10 text-black text-3xl font-bold">New SChedule</h1>
            <form class="ui large form submit-form" data-method="POST" data-action="/schedules" data-callback="reload">
                @csrf

                <x-field label="Instance" type="dropdown" name="instance_id" id="instance_id">
                    @foreach (\App\Models\Instance::all() as $instance)
                        <option value="{{ $instance->id }}">{{ $instance->user->first_name }} {{ $instance->user->last_name }} - {{ $instance->subject->name }}</option>
                    @endforeach
                </x-field>

                <x-field label="Section" type="dropdown" name="section_id" id="section_id">
                    @foreach (\App\Models\Section::all() as $section)
                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                    @endforeach
                </x-field>
                <x-field id="start_time" name="start_time" type="time" label="Start Time"></x-field>
                <x-field id="end_time" name="end_time" type="time" label="End Time"></x-field>

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

        </div>
    </div>
@endsection
