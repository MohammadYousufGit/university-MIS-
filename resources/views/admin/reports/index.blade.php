@extends('layouts.app')
@section('pagename')
Report
@endsection
@section('content')
<div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Payment Report List</h5>

        <!-- Table with stripped rows -->
        <table id="payment-table-body" class="table table-bordered table-condensed table-hover table-striped">
            <thead>

            <tr>
                <th>No</th>
                <th>Student Name</th>
                <th>Payment</th>
                <th>Discount</th>
                <th>Amount</th>
                <th>Paid At</th>
                <th>Paid Amount</th>
            </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                    <tr class="payment-row">
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $payment->student->name }}</td>
                        <td>{{ $payment->needed_payment }}</td>
                        <td>{{ $payment->discount }}</td>
                        <td>{{ $payment->amount }}</td>
                        <td>{{ $payment->paid_at }}</td>
                        <td class="paid_amount">{{ $payment->paid_amount }}</td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
      </div>
    </div>
</div>

<script>
const paymentRows = document.querySelectorAll(".payment-row");

let totalPaidAmount = 0;

paymentRows.forEach((paymentRow) => {
  const paidAmountCell = paymentRow.querySelector(".paid_amount");

  const paidAmount = parseFloat(paidAmountCell.textContent || 0);
  totalPaidAmount += paidAmount;
});

const totalRow = document.createElement("tr");

const nameCell = document.createElement("th");
nameCell.textContent = "Total Income";

const paidAmountCell = document.createElement("th");
paidAmountCell.textContent = totalPaidAmount.toFixed(2);


totalRow.appendChild(document.createElement("th"));
totalRow.appendChild(document.createElement("th"));
totalRow.appendChild(document.createElement("th"));
totalRow.appendChild(document.createElement("th"));
totalRow.appendChild(document.createElement("th"));
totalRow.appendChild(nameCell);
totalRow.appendChild(paidAmountCell);

const paymentTableBody = document.querySelector("#payment-table-body");
paymentTableBody.appendChild(totalRow);

</script>
  @endsection
