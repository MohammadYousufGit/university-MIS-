<?php

namespace App\Http\Controllers;

use App\Models\SenfStudent;
use Illuminate\Http\Request;

class SenfStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SenfStudent  $senfStudent
     * @return \Illuminate\Http\Response
     */
    public function show($student)
    {

        return $exams = Exam::where('senf_subject_id',
                        SenfSubject::where('senf_id',
                        SenfStudent::where('student_id', $student)->pluck('senf_id')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SenfStudent  $senfStudent
     * @return \Illuminate\Http\Response
     */
    public function edit(SenfStudent $senfStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SenfStudent  $senfStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SenfStudent $senfStudent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SenfStudent  $senfStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(SenfStudent $senfStudent)
    {
        //
    }
}
