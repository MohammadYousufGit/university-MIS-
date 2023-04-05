<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\SenfSubject;
use App\Models\Student;
use App\Models\Result;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::all();
        return view('admin.exams.index', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $senf_subjects = SenfSubject::all();
        return view('admin.exams.create', compact('senf_subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exam = new Exam;
        $exam->type = $request->type;
        $exam->taken_date = $request->taken_date;
        $exam->senf_subject_id = $request->senf_subject;
        $exam->save();
        return redirect(route('exams.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        if($exam->type == 'final'){

            $mid_exam = Exam::where('senf_subject_id', $exam->senf_subject_id )->where('type', '20')->first();
            $mid_exam_results = Result::where('exam_id', $mid_exam->id)->get();
            return view('admin.results.final',compact('mid_exam_results','exam'));
        }
        elseif($exam->type == '20'){

            return view('admin.results.mid',compact('exam'));
        }
        else{
            return 'The Exam Type is incorrect';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        $senf_subjects = SenfSubject::all();
        return view('admin.exams.edit', compact('senf_subjects', 'exam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
        $exam->type = $request->type;
        $exam->taken_date = $request->taken_date;
        $exam->senf_subject_id = $request->senf_subject;
        $exam->update();
        return redirect(route('exams.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        //
    }
}
