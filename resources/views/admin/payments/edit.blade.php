@extends('layouts.app')
@section('pagename')
Class
@endsection
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Edit Class for a Department</h5>

      <!-- Multi Columns Form -->
      <form class="row g-3" action="{{ route('senfs.update') }}" method="post">
        {{ csrf_field() }}

        {{ method_field('PATCH') }}
        <div class="col-md-6">
          <label for="inputName5" class="form-label">Class Title</label>
          <input type="text" value="{{ $senf->name }}"  required class="form-control" id="inputName5" name="name" >
        </div>
        <div class="col-md-6">
          <label for="inputName5" class="form-label">Year</label>
          <input type="text" value="{{ $senf->year }}" required class="form-control" id="inputName5" name="year">
        </div>
        <div class="col-md-6">
          <label for="inputName5" class="form-label">Semester</label>
          <input type="text" value="{{ $senf->semester }}" required class="form-control" id="inputName5" name="semester">
        </div>
        <div class="col-md-6">
          <label for="inputName5" class="form-label">Start Date</label>
          <input type="date" value="{{ $senf->start_date }}" class="form-control" name="start_date">
        </div>
        <div class="col-md-6">
          <label for="inputName5" class="form-label">End Date</label>
          <input type="date" value="{{ $senf->end_date }}" class="form-control" name="end_date">
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">Department</label>
            <select name="department" required id="inputState" class="form-select">
              <option  selected="">Choose Department</option>
              @foreach ( $departments as $department )

              <option value="{{ $department->id }}"


                @foreach($departments as $department)
                @if($department->id == $department->department_id)
                selected
              @endif
              @endforeach

                >{{ $department->name }}</option>
              @endforeach
            </select>
          </div>
        <div class="col-md-8">
          <label for="inputName5"  class="form-label">Status</label>
          <input type="text" value="{{ $senf->status }}" class="form-control" id="inputName5" name="status">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End Multi Columns Form -->

    </div>
</div>
@stop
