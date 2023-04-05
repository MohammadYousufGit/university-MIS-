@extends('layouts.app')
@section('pagename')
senf_subject
@endsection
@section('content')
<div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">subject List</h5>

        <!-- Table with stripped rows -->
        <table id="example1" class="table table-bordered table-condensed table-hover table-striped">
            <thead>

            <tr>
                <th>No</th>
                <th>Class Name</th>
                <th>Department</th>
                <th>Subject Name</th>
                <th>credit</th>
                <!-- <th>Manipulate</th> -->
            </tr>
            </thead>
            <tbody>
                @foreach($senf_subjects as $senf_subject)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $senf_subject->senf->name }}</td>
                        <td>{{ $senf_subject->senf->department->name }}</td>
                        <td>{{ $senf_subject->subject->name }}</td>
                        <td>{{ $senf_subject->credit }}</td>
                        {{-- <td>
                            <form id="del-form-{{ $senf_subject->id }}" action="{{ route('senf_subject.destroy',$senf_subject) }}" method="post">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                                <div class="btn-group btn-group-sm" role="group">

                                    {{-- @can('senf_subject.update',Auth::user()) --}}

                                    {{-- <a class="btn btn-info" href="{{ route('senf_subject.edit',$senf_subject) }}"><span class="glyphicon glyphicon-edit"></span>edit</a>
                                    <a class="btn btn-info" href="{{ route('senf_subject.show',$senf_subject) }}"><span class="glyphicon glyphicon-edit"></span>Subject</a>
                                    @endcan

                                     @can('senf_subject.delete',Auth::user())

                                        <input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger delete-btn" value="delete" />
                                    <a href="#" onclick="
                                            if(confirm('Are you sure to delete')){
                                            event.preventDefault();
                                            document.getElementById('del-form-{{ $senf_subject->id }}').submit();
                                            }
                                            else event.preventDefault();

                                            " class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Delete</a>
                                     @endcan

                                </div>
                            </form>
                        </td> --}}
                    </tr>
                    @endforeach
            </tbody>
        </table>
        <!-- End Table with stripped rows -->
        {{-- <a href="{{ route("senf_subject.create")}}" style="display: inline; float: right" class="btn btn-primary col-lg-3">Add New senf_subject</a> --}}
      </div>
    </div>
</div>


  @endsection
