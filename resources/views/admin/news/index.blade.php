@extends('layouts.app')
@section('content')

<table class="table table-hover">
  
<thead>
    <tr>
         <h4 class="text-center">News & Events List</h4>
         <a href="{{url('admin/news/create')}}" class="btn btn-primary btn-lg" role="button" aria-pressed="true">Add new</a>
    </tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">news Title</th>
      <th scope="col">Description</th>
      <th scope="col">Publish Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $row)
    <tr>  
      <th scope="row">{{$loop->index + 1}}</th>
      <td>{{$row->title}}</td>
      <td>{!! Str::limit($row->description, 70)!!}</td>
      <td>{{$row->publish_date}}</td>
      <td>
      <form action="{{url('admin/news/'.$row->id)}}" method="post">
								{{csrf_field()}}
								{{method_field('delete')}}
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{url('admin/news/'.$row->id.'/edit')}}" class="btn btn-primary">Edit</a>
            <a href="{{url('admin/news/'.$row->id)}}" class="btn btn-success">View Album</a>
              <!-- <button type="submit" class="btn btn-danger">Delete</button> -->
            <input type="submit" value="delete" class="btn btn-danger" onclick="return confirm('Are You Sure Do You want to delete this news');">
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