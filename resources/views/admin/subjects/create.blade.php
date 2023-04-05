
@extends('layouts.app')
@section('pagename')
Subject
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Add New Subject</h5>

        <form class="row g-3" action="{{ route('subjects.store') }}" method="post">
        {{ csrf_field() }}
        <div class="col-md-6">
            <label for="inputName5" class="form-label">Subject Name</label>
            <input type="text" class="form-control" id="inputName5" name="name">
        </div>
        {{-- <div class="col-md-6">
            <label for="inputName5" class="form-label">Subject Credit for Class</label>
            <input type="text" class="form-control" id="inputName5" name="credit">
        </div>
        <div class="col-md-6">
            <label for="inputState" class="form-label">Class of the Subject</label>
            <select name="senf" required id="inputState" class="form-select">
              <option  selected="">Choose Class</option>
              @foreach ( $senfs as $senf )

              <option value="{{ $senf->id }}">{{ $senf->name }}</option>
              @endforeach
            </select>
          </div>
        <div class="col-md-6">
            <label for="inputState" class="form-label">Teacher of the Subject</label>
            <select name="teacher" required id="inputState" class="form-select">
              <option  selected="">Choose Teacher</option>
              @foreach ( $teachers as $teacher )

              <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
              @endforeach
            </select>
          </div> --}}
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
        </form><!-- End Multi Columns Form -->

    </div>
</div>
@stop





