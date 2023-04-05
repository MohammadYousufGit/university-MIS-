@extends('layouts.app')
@section('pagename')
Departments
@endsection
@section('content')


          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Departments</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3" action="{{ route('departments.update',$department->id) }}" method="post" >
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="col-8">
                    <label for="name" class="form-label">Department Title</label>
                    <input type="text" class="form-control" value="{{ $department->name }}" id="name" name="name" placeholder="Enter title">
                </div>
                <div class="col-4">
                    <label for="inputState" class="form-label">Faculty</label>
                    <select name="faculty" required id="inputState" class="form-select">
                      <option  selected="">Choose Faculty</option>
                      @foreach ( $faculties as $faculty )

                      <option  value="{{ $faculty->id }}"

                        @foreach($faculties as $faculty)
                        @if($faculty->id == $department->faculty_id)
                        selected
                      @endif
                      @endforeach

                        >{{ $faculty->name }}</option>
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
