@extends('layouts.app')
@section('pagename')
Roles
@endsection
@section('content')
<div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title col-lg-6 ">Roles</h5>

        <!-- Table with stripped rows -->
        <table class="table table-bordered table-condensed table-hover table-striped">
            <thead>
            <tr>
                <th>Role ID</th>
                <th>Role Name</th>
                <th>Role Permissions</th>
                <th>Manipulation</th>
            </tr>
            </thead>
            <tbody>
            <!-- List of all Branches-->
            @foreach($data as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>
                    <td>
                        @foreach ( $row->permissions as $permission )

                        {{$permission->name}}|
                        @endforeach
                    </td>
                    <td>
                        <form action="{{ route('roles.destroy',$row->id) }}" method="post">
                            {{csrf_field()}}
                            {{method_field('delete')}}
                            <div class="btn-group btn-group-xs" role="group">
                                <a class="btn btn-primary " href="{{ route('roles.edit',$row->id) }}"><span class="glyphicon glyphicon-trash"></span>edit</a>
                                <input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger delete-btn" value="delete" />
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach()
            </tbody>
        </table>
            <a href="{{ route("roles.create")}}" style="display: inline; float: right" class="btn btn-primary col-lg-3">Add New Role</a>
        </div>
        <!-- /.box-body -->
    </div>
</div>

    @stop
