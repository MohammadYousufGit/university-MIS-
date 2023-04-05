
@extends('layouts.app')
@section('pagename')
Permissions
@endsection
@section('content')

    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Permission</h5>

              <!-- Vertical Form -->
              <form class="row g-3" action="{{ route('permissions.store') }}" method="post">
                {{ csrf_field() }}
                <div class="col-12">
                    <label for="name">Permission name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter title">
                </div>
                <div class="col-12">
                    <label for="name">Permission for</label>
                    <select class="form-control" id="name" name="for" >
                        <option selected disabled >Select permission for</option>
                        <option value="department">Department</option>
                        <option value="students">Students</option>
                        <option value="finanace">Finanace</option>
                        <option value="exams">Exams</option>
                        <option value="announce">Announcements</option>
                        <option value="attendance">Students Attendance</option>
                        <option value="teacher">Teacher</option>
                        <option value="user">User Management</option>
                    </select>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
@stop
