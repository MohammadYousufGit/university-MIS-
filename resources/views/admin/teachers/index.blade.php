@extends('layouts.app')
@section('pagename')
teacher
@endsection
@section('content')
<div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Teachers List</h5>

        <table id="example1" class="table table-bordered table-condensed table-hover table-striped">
            <thead>

            <tr>
                <th>No</th>
                <th>Full Name</th>
                <th>father Name</th>
                <th>Degree</th>
                <th>Current Address</th>
                <th>Permenent Address</th>
                <th>Phone</th>
                {{-- <th>Email Address</th> --}}
                <th>Date of Birth</th>
                <th>Join Date</th>
                <th>End Date</th>
                <th>Manipulate</th>
            </tr>
            </thead>
            <tbody>
                @foreach($teachers as $teacher)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
{{--                            <td><img src="{{ Storage::disk('local')->url($teacher->image) }}" style="max-height: 60px;border-radius: 10%;max-width: 70px"></td>--}}
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->father_name }}</td>
                        <td>{{ $teacher->degree }}</td>
                        <td>{{ $teacher->current_address }}</td>
                        <td>{{ $teacher->permenent_address }}</td>
                        <td>{{ $teacher->phone }}</td>
                        {{-- <td>{{ $teacher->email }}</td> --}}
                        <td>{{ $teacher->dob }}</td>
                        <td>{{ $teacher->join_date }}</td>
                        <td>{{ $teacher->end_date }}</td>
                        <td>
                            <form id="del-form-{{ $teacher->id }}" action="{{ route('teachers.destroy',$teacher) }}" method="post">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                                <div class="btn-group btn-group-sm" role="group">

                                    {{-- @can('teachers.update',Auth::user()) --}}

                                    <a class="btn btn-info" href="{{ route('teachers.edit',$teacher) }}"><span class="glyphicon glyphicon-edit"></span>edit</a>
                                    <a class="btn btn-info" href="{{ route('teachers.show',$teacher) }}"><span class="glyphicon glyphicon-edit"></span>Subject</a>
                                    {{-- @endcan --}}

                                     {{-- @can('teachers.delete',Auth::user()) --}}

                                        {{--<input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger delete-btn" value="delete" />--}}
                                    <a href="#" onclick="
                                            if(confirm('Are you sure to delete')){
                                            event.preventDefault();
                                            document.getElementById('del-form-{{ $teacher->id }}').submit();
                                            }
                                            else event.preventDefault();

                                            " class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Delete</a>
                                     {{-- @endcan --}}

                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        <!-- End Table with stripped rows -->
        <a href="{{ route("teachers.create")}}" style="display: inline; float: right" class="btn btn-primary col-lg-3">Add New teacher</a>
      </div>
    </div>
</div>


  @endsection
