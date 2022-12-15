@extends('layouts.app')

@section('title', 'Attendance')

@section('main')

<div class="mb-16 rounded-2xl p-12 portrait:p-5 border-0 bg-white shadow-sm text-black">
    <div class="grid grid-cols-3 gap-x-10">
        <x-forms.search-attendance date="{{ $created_at }}" section_id="{{ $section_id }}" />
            
      
    </div>
</div>
    <table class="ui selectable stackable table">
        <thead>
            <th>#</th>
            <th>Full Name</th>
            <th class="right aligned">Date</th>
        </thead>

        <tbody>
            @foreach ($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->id }}</td>
                    <td class="right aligned">{{ $attendance->created_at }}</td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
   
@endsection


@section('scripts')
    <script>
        function lmao(params) {
            
        }

    </script>
@endsection