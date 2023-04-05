@extends('layouts.app')
@section('pagename')
Class
@endsection
@section('content')
<div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Classes List</h5>

        <!-- Table with stripped rows -->
        <table id="example1" class="table table-bordered table-condensed table-hover table-striped">
            <thead>

            <tr>
                <th>No</th>
                <th>Class Title</th>
                <th>Department</th>
                <th>Year</th>
                <th>Semester</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Manipulation</th>
            </tr>
            </thead>
            <tbody>
                @foreach($senfs as $senf)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
{{--                            <td><img src="{{ Storage::disk('local')->url($senf->image) }}" style="max-height: 60px;border-radius: 10%;max-width: 70px"></td>--}}
                        <td>{{ $senf->name }}</td>
                        <td>{{ $senf->department->name }}</td>
                        <td>{{ $senf->year }}</td>
                        <td>{{ $senf->semester }}</td>
                        <td>{{ $senf->start_date }}</td>
                        <td>{{ $senf->end_date }}</td>
                        <td>{{ $senf->status }}</td>
                        <td>
                            <form id="del-form-{{ $senf->id }}" action="{{ route('senfs.destroy',$senf) }}" method="post">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                                <div class="btn-group btn-group-sm" role="group">

                                    {{-- @can('senfs.update',Auth::user()) --}}

                                    <a class="btn btn-info" href="{{ route('senfs.edit',$senf) }}"><span class="glyphicon glyphicon-edit"></span>edit</a>
                                    {{-- @endcan --}}

                                     {{-- @can('senfs.delete',Auth::user()) --}}

                                        {{--<input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger delete-btn" value="delete" />--}}
                                    <a href="#" onclick="
                                            if(confirm('Are you sure to delete')){
                                            event.preventDefault();
                                            document.getElementById('del-form-{{ $senf->id }}').submit();
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
        <a href="{{ route("senfs.create")}}" style="display: inline; float: right" class="btn btn-primary col-lg-3">Add New Class</a>
      </div>
    </div>
</div>


  @endsection
