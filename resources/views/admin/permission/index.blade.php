@extends('layouts.app')
@section('pagename')
Permissions
@endsection
@section('content')
<div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title col-lg-6 ">Permissions</h5>

        <!-- Table with stripped rows -->
        <table id="example1" class="table table-bordered table-condensed table-hover table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>permission Name</th>
                    <th>permission for</th>

                    <th>Manipulate</th>
                </tr>
                </thead>
                <tbody>
                @foreach($permissions as $permission)
                <tr>
                    <td>{{ $loop->index + 1}}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->for }}</td>



                    <td>
                        <form action="{{route('permissions.destroy', $permission->id) }}" method="post">
                            {{csrf_field()}}
                            {{method_field('delete')}}
                            <div class="btn-group btn-group-xs" role="group">
                                <a class="btn btn-warning " href="{{ route('permissions.edit' ,$permission->id) }}"><span class="glyphicon glyphicon-edit"></span> edit</a>
                                <input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger delete-btn" value=" delete" />
                            </div>
                        </form>
                    </td>
                </tr>
                    @endforeach
                </tbody>

            </table>
            <a href="{{ route("permissions.create")}}" style="display: inline; float: right" class="btn btn-primary col-lg-3">Add New Permission</a>
        </div>
        <!-- /.box-body -->
    </div>

    @stop
