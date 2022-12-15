<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function enabled()
    {
        $now = now()->startOfDay();
        $attendance = Attendance::where('created_at', '>=', now()->startOfDay())
                ->where('created_at', '<=', now()->startOfDay()->addDays(1))
                ->where('user_id', '=', Auth::id())
                ->first();

        $schedule = Auth::user()->section->schedules->where('day', '=', $now->dayOfWeek)->first();

        return ! $attendance && $schedule;

    }


    public function index(Request $request)
    {   
        $created_at = $request->created_at;
        $section_id = $request->section_id;

        if (Auth::user()->type == 'admin') {
            $attendances = new Attendance();

            if ($created_at) {
                $date = Carbon::parse($request->created_at);

           
                $attendances = $attendances->where('created_at', '>=', $created_at)
                ->where('created_at', '<=', $date->addDays(1)->format("Y-m-d"));
            }

            if ($section_id) {
                $attendances = $attendances->whereHas('user', function (Builder $query) use ($section_id) {
                    $query->where('section_id', '=', $section_id);
                });
            }

            $attendances = $attendances->get(); 
        } 

        if (Auth::user()->type == 'student') {
            $attendances = Auth::user()->attendances->sortByDesc('id');
        }
        
    
        return view('attendance', compact('attendances', 'created_at', 'section_id'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAttendanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttendanceRequest $request)
    {
        $attendance = Attendance::create([
            'user_id' => Auth::id()
        ]);

        return $attendance;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttendanceRequest  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
