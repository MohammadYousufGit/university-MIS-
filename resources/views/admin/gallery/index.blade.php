@extends('layouts.app')
@section('content')

<table class="table table-hover">
  
<thead>
    <tr>
         <h4 class="text-center">Gallery</h4>
         <a href="{{url('admin/gallery/create')}}" class="btn btn-primary btn-lg" role="button" aria-pressed="true">Create gallery</a>
    </tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Pic Name</th>
      <th scope="col">Picture</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $row)
    <tr>  
      <th scope="row">{{$row->id}}</th>
      <td>{{$row->title}}</td>
      <td><img src="{{URL::asset($row->picture)}}" alt="{{$row->title}}" class="img-thumbnail" style="height:100px;"></td>
      <td>
        <form action="{{url('admin/gallery/'.$row->id)}}" method="post">
                  {{csrf_field()}}
                  {{method_field('delete')}}
          <div class="btn-group" role="group" aria-label="Basic example">
              <a href="{{url('admin/gallery/'.$row->id.'/edit')}}" class="btn btn-primary">Edit</a>
              <a href="{{url('admin/gallery/'.$row->id)}}" class="btn btn-success">View Album</a>
              <!-- <button type="submit" class="btn btn-danger">Delete</button> -->
              <input type="submit" value="delete" class="btn btn-danger" onclick="return confirm('Are You Sure Do You want to delete this gallery');">
          </div>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection