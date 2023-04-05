<?php

namespace App\Http\Controllers;

use App\Models\StudentSubjectAttendance;
use App\Models\SenfSubject;
use App\Models\Senf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentSubjectAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $senfs = Senf::where('is_active', true)->pluck('id');
        $senf_subjects = SenfSubject::whereIn('senf_id', $senfs)->orderBy('senf_id', 'desc')->get();
        return view('admin.attendances.index', compact('senf_subjects'));
    }

    public function report()
    {

        $senfs = Senf::where('is_active', true)->pluck('id');
        $senf_subjects = SenfSubject::whereIn('senf_id', $senfs)->orderBy('senf_id', 'desc')->get();
        return view('admin.attendances.report', compact('senf_subjects'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->is_present;
        $senf_subject = SenfSubject::findorfail($request->senf_subject_id);
        foreach($request->student_id as $key=>$student_id){
            $attendance = new StudentSubjectAttendance;
            $attendance->student_id = $student_id;
            $attendance->senf_subject_id = $request->senf_subject_id;
            $attendance->user_id = Auth::user()->id;
            $attendance->lesson = $request->lesson;
            $attendance->date = $request->date;
            if (isset($request->is_present[$key]) && $request->is_present[$key] != null) {
                $attendance->is_present = 1;
            } else {
                $attendance->is_present = 0;
            }
            $attendance->status = $request->status[$key];
            $attendance->save();
        }

        return redirect()->route('attendances.index')->with('success', 'Attendance successfully taken!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentSubjectAttendance  $studentSubjectAttendance
     * @return \Illuminate\Http\Response
     */
    public function show($subject)
    {

        $senf_subject =  SenfSubject::findorfail($subject);
        $students =  $senf_subject->senf->students;
        $attendances = StudentSubjectAttendance::where('senf_subject_id',$senf_subject->id)->get();
        return view('admin.attendances.show_report', compact('students','attendances' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentSubjectAttendance  $studentSubjectAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit($subject)
    {

        $senf_subject =  SenfSubject::findorfail($subject);
        return view('admin.attendances.create', compact('senf_subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentSubjectAttendance  $studentSubjectAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentSubjectAttendance $studentSubjectAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentSubjectAttendance  $studentSubjectAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentSubjectAttendance $studentSubjectAttendance)
    {
        //
    }
}
