@extends('layouts.app')
@section('pagename')
Payment
@endsection
@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Unpaid Payments</h5>

    <!-- Table with stripped rows -->
    <table id="unpaid-payment-table" class="table table-bordered table-hover table-striped">
        <thead>

        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Father Name</th>
            <th>Payment for</th>
            <th>Amount</th>
            <th>Discount</th>
            <th>Fine</th>
            <th>Amount to Pay </th>
            <th>Created At</th>
            <th>Manipulation</th>
        </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)

        <form action="{{ route('payments.update', $payment) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
                    <tr>
                        <td>
                            <input value="{{ $payment->student_id }}" type="hidden" class="form-control noborder" name="student_id" required>
                            {{ $loop->index+1 }}
                        </td>
                                <td>{{ $payment->student->name }}</td>
                                <td>{{ $payment->student->father_name }}</td>
                                <td><input type="text" class="form-control noborder" value="{{ $payment->needed_payment }}" name="needed_payment" required></td>
                                <td><input type="text" class="form-control noborder amount" value="{{ $payment->amount }}" name="amount" readonly required></td>
                                <td><input type="number" class="form-control noborder discount" value="{{ $payment->discount }}" name="discount"></td>
                                <td><input type="number" class="form-control noborder extra_charge" value="@php
                                    $total = $payment->amount;

                                    if ($payment->needed_payment == 'monthly_fee' && $payment->created_at->diffInDays(now()) > 5) {
                                        $days_delayed = $payment->created_at->diffInDays(now()) - 5;
                                        $extra_charge = $total * ($days_delayed * 0.02);
                                        // $total += $extra_charge;
                                        echo $extra_charge;
                                    }

                                                        @endphp"></td>
                                <td><input type="number" class="form-control noborder total_amount" name="paid_amount" value="" readonly></td>


                                    <td><input type="text" class="form-control noborder" value="{{ $payment->created_at }}" name="created_at" readonly required></td>
                                    <td><button type="submit" class="btn btn-primary">Pay</button></td>

                            </tr>
                        </form>
                            @endforeach
                        </tbody>
                    </table>

            </div>
        </div>
    </div>

<script>

// get all the payment rows
const paymentRows = document.querySelectorAll("#unpaid-payment-table tbody tr");

// loop through each payment row
paymentRows.forEach((paymentRow) => {
// get the input elements in the current payment row
const amountInput = paymentRow.querySelector(".amount");
const extraChargeInput = paymentRow.querySelector(".extra_charge");
const discountInput = paymentRow.querySelector(".discount");
const totalAmount = paymentRow.querySelector(".total_amount");

// initial calculation
let amount = parseInt(amountInput.value|| 0 );
let extraCharge = parseInt(extraChargeInput.value|| 0 );
let discountPercentage = parseInt(discountInput.value|| 0 );
let paid = (amount + extraCharge) * (1 - discountPercentage / 100);
console.log(paid);
totalAmount.value = paid;

// event listener for discount percentage changes
discountInput.addEventListener("keyup", function() {
discountPercentage = parseInt(this.value|| 0 );
paid = (amount + extraCharge) * (1 - discountPercentage / 100);
console.log(paid);
totalAmount.value = paid;
});
});
</script>


  @endsection
