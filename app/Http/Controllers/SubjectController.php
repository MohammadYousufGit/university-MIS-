<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Senf;
use App\Models\SenfSubject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        $senfs = Senf::all();
        $teachers = Teacher::all();

        $senf_subjects = SenfSubject::all();
        return view('admin.subjects.index', compact('subjects','senfs','teachers', 'senf_subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        $senfs = Senf::all();
        return view('admin.subjects.create', compact('teachers', 'senfs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subject = new Subject;
        $subject->name = $request->name;
        $subject->save();
        // $subject->senfs()->sync($request->senf);
        // $senf_subject = SenfSubject::where('subject_id', $subject->id)->where('senf_id', $request->senf)->first();
        // $senf_subject->teacher_id = $request->teacher;
        // $senf_subject->credit = $request->credit;
        // $senf_subject->save();


        return redirect(route('subjects.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function assign(Request $request)
    {
        $senf_subject = new SenfSubject;
        $senf_subject->teacher_id = $request->teacher;
        $senf_subject->subject_id = $request->subject_id;
        $senf_subject->senf_id = $request->senf;
        $senf_subject->credit = $request->credit;
        $senf_subject->save();
        return redirect()->route('subjects.index');
    }


    public function show(Subject $subject)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $teachers = Teacher::all();
        $senfs = Senf::all();
        return view('admin.subjects.edit', compact('subject', 'teachers', 'senfs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $subject->name = $request->name;
        $subject->update();
        return redirect(route('subjects.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect(route('subjects.index'));
    }
}
