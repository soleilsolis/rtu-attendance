@extends('layouts.app')

@section('title', 'Subjects')

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
            <th>Name</th>
            <th class="right aligned">Date</th>
        </thead>

        <tbody>
            @foreach ($subjects as $subject)
                <tr onclick="location.href='/subject/{{ $subject->id }}'">
                    <td class="collapsing">{{ $subject->id }}</td>
                    <td>{{ $subject->name }}</td>
                    <td class="right aligned">{{ $subject->created_at }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <div id="attendance-modal" class="ui basic small modal">
        <div class="bg-white shadow-md p-6 rounded-md overflow-auto">
            <h1 id="attendance-label" class="mb-10 text-black text-3xl font-bold">New Subject</h1>
            <form class="ui large form submit-form" data-method="POST" data-action="/subjects" data-callback="reload">
                @csrf


                <x-field id="name" name="name" type="text" label="Name"></x-field>

                <button class="ui big blue button mt-12" type="submit">Save</button>
            </form>

        </div>
    </div>
@endsection
