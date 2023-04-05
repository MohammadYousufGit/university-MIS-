
@extends('layouts.app')
@section('pagename')
Exam
@endsection
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Add New Exam for a Subject of a Class</h5>

      <!-- Multi Columns Form -->
      <form class="row g-3" action="{{ route('exams.store') }}" method="post">
        {{ csrf_field() }}
        <div class="col-md-4">
            <label for="inputState" class="form-label">Type of Exam</label>
            <select name="type" required id="inputState" class="form-select">
              <option  disabled selected="">Choose Exam Type</option>
              <option value="20">20%</option>
              <option value="final">Final</option>

            </select>
          </div>
        <div class="col-md-8">
            <label for="inputState" class="form-label">Class and Subject</label>
            <select name="senf_subject" required id="inputState" class="form-select">
              <option  selected="">Choose Class Subject</option>
              @foreach ( $senf_subjects as $senf_subject )

              <option value="{{ $senf_subject->id }}">{{ $senf_subject->subject->name }} of class {{ $senf_subject->senf->name }} in {{ $senf_subject->credit }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-4">
            <label for="inputName5" class="form-label">Taken Date</label>
            <input type="date" required class="form-control" name="taken_date">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End Multi Columns Form -->

    </div>
  </div>
@stop





