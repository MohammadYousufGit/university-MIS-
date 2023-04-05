<?php


// app/Console/Commands/ChargeMonthlyFees.php

namespace App\Console\Commands;

use App\Models\Senf;
use App\Models\Student;
use App\Models\SenfStudent;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ChargeMonthlyFees extends Command
{
    protected $signature = 'charge:monthly-fees';
    protected $description = 'Charge monthly fees to all students who are enrolled in courses.';

    public function handle(){
        $senf_id = Senf::where('is_active', true)->pluck('id');

        $students = Student::whereIn('current_senf_id', $senf_id)->get();
        foreach( $students as $student){

            $payment = New Payment;
            $payment->student_id = $student->id;
            $payment->needed_payment = 'monthly_fee';
            $payment->amount = $student->senf->monthly_fee;
            $payment->discount = SenfStudent::where('student_id', $student->id)->where('senf_id', $student->current_senf_id)->first()->discount;
            $payment->save();

        }
    }
}
