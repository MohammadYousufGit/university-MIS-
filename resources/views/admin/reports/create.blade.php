
@extends('layouts.app')
@section('pagename')
Payment
@endsection
@section('content')



<section class="section">
    <div class="row">
      <div class="col-10">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Generate Payment Reports</h5>


            <form action="{{ route('bills.store') }}" method="post">
                {{ csrf_field() }}
              <div class="row mb-3">
                <label for="inputDate" class="col-sm-3 col-form-label">Payments From</label>
                <div class="col-sm-8">
                  <input type="date" required name="from" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputDate" class="col-sm-3 col-form-label">Payments To</label>
                <div class="col-sm-8">
                  <input type="date" name="to" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputTime" class="col-sm-3 col-form-label">Time</label>
                <div class="col-sm-8">
                  <input type="time" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Select Faculty</label>
                <div class="col-sm-8">
                    <select name="faculty" required id="inputState" class="form-select">
                        <option  selected="">Choose Faculty</option>
                        @foreach ( $faculties as $faculty )

                        <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                        @endforeach
                      </select>
                </div>
              </div>

              {{-- <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Select Department</label>
                <div class="col-sm-8">
                    <select name="department" required id="inputState" class="form-select">
                        <option  selected="">Choose Department</option>
                        @foreach ( $departments as $department )

                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                      </select>
                </div>
              </div> --}}

              <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Select Payments</label>
                <div class="col-sm-8">
                    <select name="payment" required id="inputState" class="form-select">
                        <option   disabled selected="">Choose Needed Payment</option>
                        <option value="monthly_fee">Monthly Fee</option>
                        <option value="registration_fee">Registration Fee</option>
                        <option value="chance_fee">ID card Fee</option>
                        <option value="Monograph_fee">Monograph Fee</option>
                        <option value="diploma_fee">Diploma Fee</option>
                        <option value="tajil_fee">Tajil Fee</option>
                        <option value="chance_course_fee">Chance Course Fee</option>

                      </select>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-3 col-form-label"></label>
                <div class="col-sm-8">
                  <button type="submit" class="btn btn-primary">Generate Report</button>
                </div>
              </div>

            </form>

          </div>
        </div>

      </div>

    </div>
  </section>




@stop





