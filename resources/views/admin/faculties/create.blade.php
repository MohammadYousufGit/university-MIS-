
@extends('layouts.app')
@section('pagename')
Faculties
@endsection
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Add New Faculty</h5>

      <!-- Multi Columns Form -->
      <form class="row g-3" action="{{ route('faculties.store') }}" method="post">
        {{ csrf_field() }}
        <div class="col-md-12">
          <label for="inputName5" class="form-label">Name</label>
          <input type="text" class="form-control" id="inputName5" name="name">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End Multi Columns Form -->

    </div>
  </div>
@stop





