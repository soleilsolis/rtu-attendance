@extends('layouts.app')

@section('title', 'Courses')

@section('main')
    <table class="ui selectable stackable table">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th class="right aligned">Date</th>
        </thead>

        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td class="right aligned">{{ $course->created_at }}</td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
@endsection
