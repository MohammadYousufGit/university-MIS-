@extends('layouts.app')
@section('pagename')
Departments
@endsection
@section('content')
<div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Departments List</h5>

        <!-- Table with stripped rows -->
        <table id="example1" class="table table-bordered table-condensed table-hover table-striped">
            <thead>

            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Faculty</th>
                <th>Manipulate</th>
            </tr>
            </thead>
            <tbody>
                @foreach($departments as $department)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
{{--                            <td><img src="{{ Storage::disk('local')->url($department->image) }}" style="max-height: 60px;border-radius: 10%;max-width: 70px"></td>--}}
                        <td>{{ $department->name }}</td>
                        <td>{{ $department->faculty->name }}</td>
                        <td>
                            <form id="del-form-{{ $department->id }}" action="{{ route('departments.destroy',$department) }}" method="post">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                                <div class="btn-group btn-group-sm" role="group">

                                    {{-- @can('departments.update',Auth::user()) --}}

                                    <a class="btn btn-info" href="{{ route('departments.edit',$department) }}"><span class="glyphicon glyphicon-edit"></span>edit</a>
                                    {{-- @endcan --}}

                                     {{-- @can('departments.delete',Auth::user()) --}}

                                        {{--<input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger delete-btn" value="delete" />--}}
                                    <a href="#" onclick="
                                            if(confirm('Are you sure to delete')){
                                            event.preventDefault();
                                            document.getElementById('del-form-{{ $department->id }}').submit();
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
        <a href="{{ route("departments.create")}}" style="display: inline; float: right" class="btn btn-primary col-lg-3">Add New department</a>
      </div>
    </div>
</div>


  @endsection
