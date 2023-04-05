<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Senf;
use Carbon\Carbon;
use App\Models\Student;
use App\Models\SenfStudent;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::where('paid_at', null)->get();
        return view('admin.payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // return view('payments.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function paid()
    {
        $payments = Payment::where('paid_at', '!=', null)->orderBy('paid_at', 'desc')->get();
        return view('admin.payments.paid', compact('payments'));
    }



    public function store(Request $request)
    {
        $student = Student::findorfail($request->student_id);

        $payment = New Payment;
        $payment->student_id = $student->id;
        if( $request->needed_payment == 'monthly_fee'){
            $payment->amount = $student->senf->monthly_fee;
            $payment->discount = SenfStudent::where('student_id', $student->id)->where('senf_id', $student->current_senf_id)->first()->discount;
        }else{
            $payment->amount = $request->amount;
            $payment->discount = $request->discount;
        }

        $payment->needed_payment = $request->payment;
        $payment->save();
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show($student)
    {
        $student = Student::findorfail($student);
        return view('admin.payments.create', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $payment->paid_at = Carbon::now();
        $payment->paid_amount = $request->paid_amount;
        $payment->discount = $request->discount;
        $payment->update();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->back();
    }
}
