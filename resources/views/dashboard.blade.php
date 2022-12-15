@php
    use Illuminate\Support\Facades\Auth;
    
@endphp

@extends('layouts.app')

@section('title', 'Dashboard')

@section('main')

    <div class="grid grid-cols-3 gap-x-10 portrait:gap-x-0 portrait:grid-cols-1">
        <div>
            @if (Auth::user()->type === 'admin')
                <div class="mb-16 rounded-2xl p-12 portrait:p-5 border-0 bg-[#001122] shadow-sm text-white">
                    <div class="grid grid-cols-4 gap-x-10 place-items-center">
                        <div>
                            <img class="w-24" src="{{ Vite::asset('/resources/image/users.svg') }}" alt="">
                        </div>
                        <div class="col-span-3">
                            <div class="font-medium text-4xl">Students</div>
                            <div class="font-bold text-6xl">{{ \App\Models\User::where('type', '=', 'student')->count() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-16 rounded-2xl p-12 portrait:p-5 border-0 bg-[#21209C] shadow-sm text-white">
                    <div class="grid grid-cols-4 gap-x-10 place-items-center">
                        <div>
                            <img class="w-24" src="{{ Vite::asset('/resources/image/stack.svg') }}" alt="">
                        </div>
                        <div class="col-span-3">
                            <div class="font-medium text-4xl">Classes</div>
                            <div class="font-bold text-6xl">{{ \App\Models\Section::count() }}</div>
                        </div>
                    </div>
                </div>

                <div class="mb-16 rounded-2xl p-12 portrait:p-5 border-0 bg-white shadow-sm text-black">
                    <div class="grid grid-cols-4 gap-x-10 place-items-center">
                        <div>
                            <img class="w-24" src="{{ Vite::asset('/resources/image/room.svg') }}" alt="">
                        </div>

                        <div class="col-span-3">
                            <div class="font-medium text-4xl">Subjects</div>
                            <div class="font-bold text-6xl">{{ \App\Models\Subject::count() }}</div>
                        </div>
                    </div>
                </div>
            @else
                <div class="mb-16 rounded-2xl p-12 portrait:p-5 border-0 bg-white shadow-sm text-black">
                    <div class="grid grid-cols-4 gap-x-10 place-items-center">
                        <div>
                            <img class="w-24" src="{{ Vite::asset('/resources/image/room.svg') }}" alt="">
                        </div>

                        <div class="col-span-3">
                            <div class="font-medium text-4xl">Today's Schedule</div>

                        </div>


                    </div>

                    @if (! $schedules->isEmpty())
                        <table class="ui very basic large table w-full mt-10">
                            <thead>
                                <th>Subject</th>
                                <th class="right aligned">Time</th>
                            </thead>

                            <tbody>
                                @foreach ($schedules as $schedule)
                                    <tr>
                                        <td>{{ $schedule->instance->subject->name }}</td>
                                        <td class="right aligned">
                                            {{ $schedule->start_time }} - {{ $schedule->end_time }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if (! \App\Http\Controllers\AttendanceController::enabled())
                            <button class="ui big disabled button ">Attend</button>
                            
                        @else
                            <button class="ui big blue button " onclick="$('#attendance-modal').modal('show')">Attend</button>
                            
                        @endif

                    @else
                        <h3 class="text-xl font-normal">There is no schedule for today.</h3>
                    @endif

                </div>
            @endif
        </div>

        <div class="col-span-2">
            <div class="mb-16 rounded-2xl p-12 portrait:p-5 border-0 bg-white shadow-sm">
                <div id='calendar'></div>
            </div>
        </div>
    </div>

    <div id="attendance-modal" class="ui basic mini modal">
        <div class="bg-white shadow-md p-6 rounded-md overflow-auto">
            <h1 id="attendance-label" class="mb-10 text-black text-3xl font-bold">Attend today's schedules?</h1>
            <x-forms.attendance></x-forms.attendance>

        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.0/index.global.min.js"
        integrity="sha256-qhVoe2CgVKC9i6bmWEMbE2erRC7/aclX8n7Aaw6Y+uY=" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'UTC',
                initialView: 'dayGridMonth',
                editable: false,
                selectable: true,
                events: [
                   
              
                @foreach($recurringSchedules as $recurring)
                    {
                        daysOfWeek: [ '{{ "{$recurring->day}" }}' ], // these recurrent events move separately
                        title: '{{ "{$recurring->instance->subject->name}" }}',
                        startTime: '{{ "{$recurring->start_time}" }}',
                        endTime: '{{ "{$recurring->end_time}" }}',
                    },
                @endforeach
                ]   
            }); 

            calendar.render();
        });
    </script>
@endsection
