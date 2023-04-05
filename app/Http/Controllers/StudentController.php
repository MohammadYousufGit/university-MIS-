<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Senf;
use App\Models\Payment;
use App\Models\SenfStudent;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        $senfs = Senf::all();
        return view('admin.students.index', compact('students', 'senfs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $senfs = Senf::all();
        return view('admin.students.create', compact('senfs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student;
        // $student->is_active =  $request->is_active;
        $student->name = $request->name;
        $student->father_name = $request->father_name;
        $student->dob = $request->dob;
        $student->gender = $request->gender;
        $student->current_address = $request->current_address;
        $student->permenent_address = $request->permenent_address;
        // $student->phone = $request->phone;
        $student->tazkera_no = $request->tazkera_no;
        $student->current_senf_id = $request->senf_id;
        $student->graduated_at = $request->graduated_at;
        $student->join_year = $request->join_year;
        // if ($request->hasFile('image')){
            // return $student->image = $request->image->store('public/student_images');
        // }
        $student->save();

        $student->senfs()->sync($request->senf_id);
        $senf_student = SenfStudent::where('senf_id', $request->senf_id)
                                        ->where('student_id', $student->id)->first();
        $senf_student->discount = $request->discount;
        $senf_student->save();


        $payment = New Payment;
        $payment->student_id = $student->id;
        $payment->amount = $student->senf->monthly_fee;
        $payment->discount = $request->discount;
        $payment->needed_payment = 'monthly_fee';
        $payment->save();
        $payment = New Payment;
        $payment->student_id = $student->id;
        $payment->amount = 300;
        $payment->discount = $request->discount;
        $payment->needed_payment = 'ID Card Fee';
        $payment->save();
        $payment = New Payment;
        $payment->student_id = $student->id;
        $payment->amount = 2000;
        $payment->discount = $request->discount;
        $payment->needed_payment = 'Registration Fee';
        $payment->save();
        return redirect(route('students.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $senfs = Senf::all();
        return view('admin.students.edit', compact('student', 'senfs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $student->name = $request->name;
        $student->father_name = $request->father_name;
        $student->dob = $request->dob;
        $student->gender = $request->gender;
        $student->current_address = $request->current_address;
        $student->permenent_address = $request->permenent_address;
        // $student->phone = $request->phone;
        $student->tazkera_no = $request->tazkera_no;
        $student->current_senf_id = $request->senf_id;
        $student->graduated_at = $request->graduated_at;
        $student->join_year = $request->join_year;
        // if ($request->hasFile('image')){
            // return $student->image = $request->image->store('public/student_images');
        // }

        $student->senfs()->sync($request->senf_id);
        $senf_student = SenfStudent::where('senf_id', $request->senf_id)
        ->where('student_id', $student->id)->first();
        $senf_student->discount = $request->discount;
        $senf_student->update();
        $student->update();
        return redirect(route('students.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->back();
    }
}
