@extends('layouts.app')
@section('pagename')
teacher
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Add New Teacher</h5>

        <!-- Multi Columns Form -->
        <form class="row g-3" action="{{ route('teachers.store') }}" method="post">
        {{ csrf_field() }}
        <div class="col-md-6">
            <label for="inputName5" class="form-label">Teacher Full Name</label>
            <input type="text" required class="form-control" id="inputName5" name="name">
        </div>
        <div class="col-md-6">
            <label for="inputName5" class="form-label">Teacher Father Name</label>
            <input type="text" required class="form-control" id="inputName5" name="father_name">
        </div>
        <div class="col-md-6">
            <label for="inputName5" class="form-label">Degree</label>
            <input type="text" required class="form-control" id="inputName5" name="degree">
        </div>
        <div class="col-md-6">
            <label for="inputName5" class="form-label">Permenent Address</label>
            <input type="text" required class="form-control" id="inputName5" name="permenent_address">
        </div>
        <div class="col-md-6">
            <label for="inputName5" class="form-label">Current Address</label>
            <input type="text" class="form-control" id="inputName5" name="current_address">
        </div>
        <div class="col-md-6">
            <label for="inputName5" class="form-label">Phone</label>
            <input type="text" class="form-control" id="inputName5" name="phone">
        </div>
        <div class="col-md-6">
            <label for="inputName5" class="form-label">Email</label>
            <input type="text" class="form-control" id="inputName5" name="email">
        </div>
        <div class="col-md-6">
            <label for="inputName5" class="form-label">Date of Birth</label>
            <input type="date" required class="form-control" name="dob">
        </div>
        <div class="col-md-6">
            <label for="inputName5" class="form-label">Join Date</label>
            <input type="date" required class="form-control" name="join_date">
        </div>
        <div class="col-md-6">
            <label for="inputName5" class="form-label">End Date</label>
            <input type="date"  class="form-control" name="end_date">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
        </form><!-- End Multi Columns Form -->

    </div>
</div>
@stop





