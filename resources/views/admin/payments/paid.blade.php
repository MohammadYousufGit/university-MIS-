@extends('layouts.app')
@section('pagename')
Payments
@endsection
@section('content')
<div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Paid Payments List</h5>

        <!-- Table with stripped rows -->
        <table id="example1" class="table table-bordered table-condensed table-hover table-striped">
            <thead>

            <tr>
                <th>No</th>
                <th>Student Name</th>
                <th>Payment of</th>
                <th>Amount</th>
                <th>Discount</th>
                <th>Paid At</th>
                <th><h4 class="bx bx-cog"></h4></th>
            </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $payment->student->name }}</td>
                        <td>{{ $payment->needed_payment }}</td>
                        <td>{{ $payment->amount }}</td>
                        <td>{{ $payment->discount }}</td>
                        <td>{{ $payment->paid_at }}</td>
                        <td>


                            {{-- @can('payments.update', Auth::user()) --}}

                            <div class="btn-group btn-group-sm" role="group">
                                <a  class="btn rounded-pill btn-dark btn-shadow"
                                    href="{{ route('payments.edit', $payment) }}"><span
                                        class="bx bxs-edit-alt"></span></a>


                                {{-- @endcan --}}

                                {{-- @can('payments.delete', Auth::user()) --}}

                                {{-- <input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger delete-btn" value="delete" /> --}}

                                <form id="del-form-{{ $payment->id }}"
                                    action="{{ route('payments.destroy', $payment) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}

                                    <a href="#"
                                        onclick="
                                    if(confirm('Are you sure to delete')){
                                    event.preventDefault();
                                    document.getElementById('del-form-{{ $payment->id }}').submit();
                                    }
                                    else event.preventDefault();

                                    "
                                        class="btn btn-danger rounded-pill btn-shadow"><span
                                            class="bx bxs-trash"></span></a>
                                    {{-- @endcan --}}

                                </form>

                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>


  @endsection
