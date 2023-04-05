@extends('layouts.app')
@section('pagename')
Users
@endsection
@section('content')
<div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Users</h5>

        <!-- Table with stripped rows -->
        <table id="example1" class="table table-bordered table-condensed table-hover table-striped">
            <thead>

            <tr>
                <th>No</th>
                {{--<th>Image</th>--}}
                <th>User name</th>
                {{--<th>Phone</th>--}}
                <th>Email</th>
                <th>User Roles</th>
                <th>Manipulate</th>
            </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
{{--                            <td><img src="{{ Storage::disk('local')->url($user->image) }}" style="max-height: 60px;border-radius: 10%;max-width: 70px"></td>--}}
                        <td>{{ $user->name }}</td>
{{--                            <td>{{ $user->phone }}</td>--}}
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach($user->roles as $urole)
                                <p>{{ $urole->name }} &nbsp;</p>
                                @endforeach

                        </td>
                        <td>
                            <form id="del-form-{{ $user->id }}" action="{{ route('users.destroy',$user->id) }}" method="post">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                                <div class="btn-group btn-group-sm" role="group">

                                    {{-- @can('users.update',Auth::user()) --}}

                                    <a class="btn btn-info" href="{{ route('users.edit',$user->id) }}"><span class="glyphicon glyphicon-edit"></span>edit</a>
                                    {{-- @endcan --}}

                                     {{-- @can('users.delete',Auth::user()) --}}

                                        {{--<input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger delete-btn" value="delete" />--}}
                                    <a href="#" onclick="
                                            if(confirm('Are you sure to delete')){
                                            event.preventDefault();
                                            document.getElementById('del-form-{{ $user->id }}').submit();
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
        <a href="{{ route("users.create")}}" style="display: inline; float: right" class="btn btn-primary col-lg-3">Add New User</a>
      </div>
    </div>
</div>


  @endsection
