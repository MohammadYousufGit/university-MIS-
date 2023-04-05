
@extends('layouts.app')
@section('pagename')
Class
@endsection
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Add New Class for a Department</h5>

      <!-- Multi Columns Form -->
      <form class="row g-3" action="{{ route('senfs.store') }}" method="post">
        {{ csrf_field() }}
        <div class="col-md-6">
          <label for="inputName5" class="form-label">Class Title</label>
          <input type="text"  required class="form-control" id="inputName5" name="name" >
        </div>
        <div class="col-md-3">
          <label for="inputName5" class="form-label">Year</label>
          <input type="text" required class="form-control" id="inputName5" name="year">
        </div>
        <div class="col-md-3">
          <label for="inputName5" class="form-label">Semester</label>
          <input type="number" required class="form-control" id="inputName5" name="semester">
        </div>
        <div class="col-md-4">
            <label for="inputName5" class="form-label">Monthly Fee</label>
            <input type="number" required class="form-control" id="inputName5" name="monthly_fee">
          </div>
        <div class="col-md-4">
          <label for="inputName5" class="form-label">Start Date</label>
          <input type="date" class="form-control" name="start_date">
        </div>
        <div class="col-md-4">
          <label for="inputName5" class="form-label">End Date</label>
          <input type="date" class="form-control" name="end_date">
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">Department</label>
            <select name="department" required id="inputState" class="form-select">
              <option disabled  selected="">Choose Department</option>
              @foreach ( $departments as $department )

              <option value="{{ $department->id }}">{{ $department->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-8">
              <label for="inputName5" class="form-label">Status</label>
              <input type="text" class="form-control" id="inputName5" name="status">
            </div>
            <div class="form-switch">
                <input class="form-check-input" name="is_active" type="checkbox" id="flexSwitchCheckChecked" checked="">
                <label class="form-check-label" for="flexSwitchCheckChecked">Active</label>
              </div>



            <div class="col-md-6 form-check">

              <label for="inputState" class="form-label"></label>
                <input class="form-check-input" required type="checkbox" id="gridCheck1">
                <label class="form-check-label" for="gridCheck1">
                  Information is Checked
                </label>
            </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Add Class</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End Multi Columns Form -->

    </div>
</div>

@stop





