@extends('layouts.app')
@section('pagename')
student
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Add New Student</h5>

        <form class="row g-3" action="{{ route('students.store') }}" method="post">
        {{ csrf_field() }}
        <div class="col-md-6">
            <label for="inputName5" class="form-label">Student Full Name</label>
            <input type="text" required class="form-control" id="inputName5" name="name">
        </div>
        <div class="col-md-6">
            <label for="inputName5" class="form-label">Student Father Name</label>
            <input type="text" required class="form-control" id="inputName5" name="father_name">
        </div>
        <div class="col-md-6">
            <label for="inputName5" class="form-label">Permenent Address</label>
            <input type="text" required class="form-control" id="inputName5" name="permenent_address">
        </div>
        <div class="col-md-6">
            <label for="inputName5" class="form-label">Current Address</label>
            <input type="text" class="form-control" id="inputName5" name="current_address">
        </div>

        <div class="col-md-4">
            <label for="inputName5" class="form-label">Tazkera Number</label>
            <input type="text" required class="form-control" id="inputName5" name="tazkera_no">
        </div>

        <div class="col-md-2">
            <label for="inputState" class="form-label">Gender</label>
            <select name="gender" class="form-select" aria-label="Default select example">
                <option value="male">male</option>
                <option value="female">female</option>
            </select>
          </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">Class</label>
            <select name="senf_id" required id="inputState" class="form-select">
              <option  selected="">Choose Class</option>
              @foreach ( $senfs as $senf )

              <option value="{{ $senf->id }}" >{{ $senf->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-2">
            <label for="validationDefaultUsername" class="form-label">Discount</label>
            <div class="input-group">
              <span class="input-group-text" id="inputGroupPrepend2">%</span>
              <input type="text" name="discount" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" >
            </div>
          </div>
        {{-- <div class="col-md-6">
            <label for="inputName5" class="form-label">Email</label>
            <input type="text" class="form-control" id="inputName5" name="email">
        </div> --}}
        <div class="col-md-4">
            <label for="inputName5" class="form-label">Date of Birth</label>
            <input type="date" required class="form-control" name="dob">
        </div>
        <div class="col-md-4">
            <label for="inputName5" class="form-label">Join year</label>
            <input type="text" required class="form-control" name="join_year">
        </div>
        {{-- <div class="col-md-4">
            <label for="inputName5" class="form-label">Graduated At</label>
            <input type="text" class="form-control" name="graduated_at">
        </div> --}}
        {{-- <div class="col-md-6">
            <label for="inputName5" class="form-label">Phone</label>
            <input type="text" class="form-control" id="inputName5" name="phone">
        </div> --}}

        <div class="col-12">
            <label for="inputNumber" class="col-sm-2 col-form-label">Student Image</label>
            <div class="col-sm-12">
              <input class="form-control" name="image" type="file" id="formFile">
            </div>
          </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
        </form><!-- End Multi Columns Form -->

    </div>
</div>
@stop





