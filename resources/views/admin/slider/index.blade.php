@extends('layouts.app')
@section('content')

<table class="table table-hover">
  
<thead>
    <tr>
         <h4 class="text-center">Slider List</h4>
         <a href="{{url('admin/slider/create')}}" class="btn btn-primary btn-lg" role="button" aria-pressed="true">Add new</a>
    </tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Sub Title</th>
      <th scope="col">Slider</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $row)
    <tr>  
      <th scope="row">{{$loop->index + 1}}</th>
      <td>{{$row->title}}</td>
      <td>{{$row->sub_title}}</td>
      <td><img src="{{URL::asset($row->picture)}}" style="height:100px;" /></td>
      <td>
      <form action="{{url('admin/slider/'.$row->id)}}" method="post">
								{{csrf_field()}}
								{{method_field('delete')}}
        <div class="btn-group" role="group" aria-label="Basic example">
            <!-- <button type="submit" class="btn btn-danger">Delete</button> -->
            <input type="submit" value="delete" class="btn btn-danger" onclick="return confirm('Are You Sure Do You want to delete this slider');">
        </div>
      </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="row">
      <div class="text-center">
        {{$data->links('pagination::bootstrap-4')}}
       </div>
</div>
@endsection