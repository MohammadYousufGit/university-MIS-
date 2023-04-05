@extends('layouts.app')
@section('pagename')
Faculties
@endsection
@section('content')
<div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Faculties List</h5>

        <!-- Table with stripped rows -->
        <table id="example1" class="table table-bordered table-condensed table-hover table-striped">
            <thead>

            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Manipulate</th>
            </tr>
            </thead>
            <tbody>
                @foreach($faculties as $faculty)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
{{--                            <td><img src="{{ Storage::disk('local')->url($faculty->image) }}" style="max-height: 60px;border-radius: 10%;max-width: 70px"></td>--}}
                        <td>{{ $faculty->name }}</td>
                        <td>
                            <form id="del-form-{{ $faculty->id }}" action="{{ route('faculties.destroy',$faculty->id) }}" method="post">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                                <div class="btn-group btn-group-sm" role="group">

                                    {{-- @can('faculties.update',Auth::user()) --}}

                                    <a class="btn btn-info" href="{{ route('faculties.edit',$faculty->id) }}"><span class="glyphicon glyphicon-edit"></span>edit</a>
                                    {{-- @endcan --}}

                                     {{-- @can('faculties.delete',Auth::user()) --}}

                                        {{--<input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger delete-btn" value="delete" />--}}
                                    <a href="#" onclick="
                                            if(confirm('Are you sure to delete')){
                                            event.preventDefault();
                                            document.getElementById('del-form-{{ $faculty->id }}').submit();
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
        <a href="{{ route("faculties.create")}}" style="display: inline; float: right" class="btn btn-primary col-lg-3">Add New faculty</a>
      </div>
    </div>
</div>


  @endsection
