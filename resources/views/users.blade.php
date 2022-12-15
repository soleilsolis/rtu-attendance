@extends('layouts.app')

@section('title', 'Users')

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
            <th class="right aligned">Section</th>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr onclick="location.href='/user/{{ $user->id }}'">
                    <td class="collapsing">{{ $user->id }}</td>
                    <td>{{ $user->last_name }}, {{ $user->first_name }}</td>
                    <td  class="right aligned">{{ $user->section->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div id="attendance-modal" class="ui basic small modal">
        <div class="bg-white shadow-md p-6 rounded-md overflow-auto">
            <h1 id="attendance-label" class="mb-10 text-black text-3xl font-bold">New User</h1>
            <x-forms.register></x-forms.register>

        </div>
    </div>
@endsection

@section('script')
    <script>
        function create(params) {

        }
    </script>
@endsection
