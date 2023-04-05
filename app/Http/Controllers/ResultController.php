<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $exam_id = Result::select('exam_id')->distinct()->get();
        $exams = Exam::whereIn('id', $exam_id)->get();


        return view('admin.results.index', compact('exams'));
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
    public function store(Request $request )
    {

                $data = [];
                if( $request->exam_type == 'final'){
                    foreach( $request->student_id as $key=>$id){
                    $data[] = [
                        'exam_id' => $request->exam_id,
                        'student_id' => $id,
                        'score' => $request->final_score[$key]
                    ];
                }
                }
                else{
                    foreach( $request->student_id as $key=>$id){

                    $data[] = [
                        'exam_id' => $request->exam_id,
                        'student_id' => $id,
                        'score' => $request->mid_term_score[$key]
                    ];
                }
            }
            Result::insert($data);
            return redirect(route('results.show', $request->exam_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show($exam_id)
    {

        $results = Result::where('exam_id', $exam_id)->get();
        if( $results[0]->exam->type == "final"){
            $first_exam = Exam::where('senf_subject_id', $results[0]->exam->senf_subject_id)->where('type', "20")->first();
            $first_results = Result::where('exam_id', $first_exam->id)->get();
            return view('admin.results.final_result', compact('results', 'first_results'));

        }else return view('admin.results.mid_result', compact('results'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {

        if($result->exam->type == 'final'){

            $mid_exam = Exam::where('senf_subject_id', $result->exam->senf_subject_id )->where('type', '20')->first();
            $mid_exam_results = Result::where('exam_id', $mid_exam->id)->get();
            $results = Result::where('exam_id', $result->exam->id)->get();
            return view('admin.results.edit',compact('mid_exam_results' , 'results'));
        }
        elseif($result->exam->type == '20'){
            $results = Result::where('exam_id', $result->exam->id)->get();
            return view('admin.results.edit',compact('results'));
        }
        else{
            return 'The Exam Type is incorrect';
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        $results = Result::where('exam_id', $result->exam->id)->get();
        if($result->exam->type == 'final'){
            $mid_exam = Exam::where('senf_subject_id', $result->exam->senf_subject_id )->where('type', '20')->first();
            $mid_exam_results = Result::where('exam_id', $mid_exam->id)->get();

            foreach($results as $key=>$res){
                $res->score = $request->final_score[$key];
                $res->update();
            }
            foreach($mid_exam_results as $key=>$mid_res){
                $mid_res->score = $request->mid_term_score[$key];
                $mid_res->update();
            }

        }
        else{
            foreach($results as $key=>$res){
                $res->score = $request->mid_term_score[$key];
                $res->update();
            }
        }
        return redirect(route('results.show', $result));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        //
    }
}
