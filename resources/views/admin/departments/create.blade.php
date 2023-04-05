
@extends('layouts.app')
@section('pagename')
Department
@endsection
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Add New Departments for a Faculty</h5>

      <!-- Multi Columns Form -->
      <form class="row g-3" action="{{ route('departments.store') }}" method="post">
        {{ csrf_field() }}
        <div class="col-md-8">
          <label for="inputName5" class="form-label">Name</label>
          <input type="text" class="form-control" id="inputName5" name="name">
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">Faculty</label>
            <select name="faculty" required id="inputState" class="form-select">
              <option  selected="">Choose Faculty</option>
              @foreach ( $faculties as $faculty )

              <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
              @endforeach
            </select>
          </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End Multi Columns Form -->

    </div>
  </div>
@stop





