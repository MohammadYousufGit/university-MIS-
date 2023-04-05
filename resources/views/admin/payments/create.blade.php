
@extends('layouts.app')
@section('pagename')
Payment
@endsection
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Add New Payment for  {{ $student->name }}</h5>

      <!-- Multi Columns Form -->
      <form class="row" action="{{ route('payments.store') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="student_id" value="{{ $student->id }}">
        <div class="col-md-4">
            <label for="inputState" class="form-label">Payment for</label>
            <select name="payment" required id="inputState" class="form-select">
              <option   disabled selected="">Choose Needed Payment</option>
              <option value="monthly_fee">Monthly Fee</option>
              <option value="Chance Fee">Chance Fee</option>
              <option value="ID Card Fee">ID card Fee</option>
              <option value="Chance Fee">Chance Fee</option>
              <option value="Monograph_fee">Monograph Fee</option>
              <option value="Registration Fee">Registration Fee</option>
              <option value="Diploma Fee">Diploma Fee</option>
              <option value="Tajil Fee">Tajil Fee</option>
              <option value="Chance Course Fee">Chance Course Fee</option>

            </select>
          </div>

          <div class="col-md-4">
            <label for="inputName5" class="form-label">Payment Amount</label>
            <input type="text" name="amount"  class="form-control" id="inputName5" name="name" >
          </div>



        <div class="col-md-4">
            <label for="validationDefaultUsername" class="form-label">Discount</label>
            <div class="input-group">
              <span class="input-group-text" id="inputGroupPrepend2">%</span>
              <input type="text" name="discount" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2">
            </div>
          </div>

        <div class="text-center" style="padding-top: 2%">
          <button type="submit" class="btn btn-primary">Add</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End Multi Columns Form -->

    </div>
</div>

<div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Unpaid Payments</h5>

        <!-- Table with stripped rows -->
        <table id="unpaid-payment-table" class="table table-bordered table-hover table-striped">
            <thead>

            <tr>
                <th>No</th>
                <th>Needed Payment</th>
                <th>Amount</th>
                <th>Discount</th>
                <th>Fine</th>
                <th>Amount to Pay </th>
                <th>Created At</th>
                <th>Manipulation</th>
            </tr>
            </thead>
            <tbody>
                @foreach($student->payments->where('paid_at', null) as $payment)

            <form action="{{ route('payments.update', $payment) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                        <tr>
                            <td>
                                <input value="{{ $student->id }}" type="hidden" class="form-control noborder" name="student_id" required>
                                {{ $loop->index+1 }}
                            </td>

                                    <td><input type="text" class="form-control noborder" value="{{ $payment->needed_payment }}" name="needed_payment" required></td>
                                    <td><input type="text" class="form-control noborder amount" value="{{ $payment->amount }}" name="amount"  required></td>
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

        <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Paid Payments List</h5>

                <!-- Table with stripped rows -->
                <table id="example1" class="table table-bordered table-condensed table-hover table-striped">
                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Needed Payment</th>
                            <th>Amount</th>
                            <th>Discount</th>
                            {{-- <th>Fine</th> --}}
                            <th>Paid Amount</th>
                            <th>Paid at</th>
                            <th>Manipulation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($student->payments->where('paid_at',"!=" ,null) as $payment)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $payment->needed_payment }}</td>
                                <td>{{ $payment->amount }}</td>
                                <td>{{ $payment->discount }}</td>
                                <td>{{ $payment->paid_amount }}</td>
                                <td>{{ $payment->paid_at }}</td>
                                <td>
                                    <form id="del-form-{{ $payment->id }}" action="{{ route('payments.destroy',$payment) }}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('delete')}}
                                        <div class="btn-group btn-group-sm" role="group">

                                            {{-- @can('payments.update',Auth::user()) --}}

                                            <a class="btn btn-info" href="{{ route('payments.edit',$payment) }}"><span class="glyphicon glyphicon-edit"></span>edit</a>
                                            {{-- @endcan --}}

                                             {{-- @can('payments.delete',Auth::user()) --}}

                                                {{--<input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger delete-btn" value="delete" />--}}
                                            <a href="#" onclick="
                                                    if(confirm('Are you sure to delete')){
                                                    event.preventDefault();
                                                    document.getElementById('del-form-{{ $payment->id }}').submit();
                                                    }
                                                    else event.preventDefault();

                                                    " class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Delete</a>
                                             {{-- @endcan --}}

                                        </div>
                                    </form>
                                </td>
                            </tr>
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

@stop





