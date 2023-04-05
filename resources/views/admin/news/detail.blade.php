@extends('layouts.app')
@section('content')

	
	<div class="panel panel-primary">
    
        <div class="panel-heading">
            <h1></h1>
        </div>
		<form method="post" action="{{url('admin/newsfeature')}}" enctype="multipart/form-data">
			<div class="panel-body">
				{{ csrf_field() }}
	         <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
	             <label for="name" class="control-label">Title: {{$news->title}}</label>
	         </div>

	         <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
	             <label for="image" class="control-label">Image</label>
                  <input type="hidden" value="{{$news->id}}" name="news_id" />  
                  <input id="image" type="file" class="form-control" name="image[]" multiple value="{{ old('image') }}" required="required" placeholder="Please select image (in formate of jpg,png,bmp">

                 @if ($errors->has('image'))
                     <span class="help-block">
                         <strong>{{ $errors->first('image') }}</strong>
                     </span>
                 @endif
            </div>
			
          </div>
			<div class="panel-footer">
				
				<div class="form-group">
					<a href="{{url('admin/project')}}" class="btn btn-default">Cancel</a>
	            <input type="submit" class="btn btn-primary" value="Save">
	         </div>
			</div>
		</form>
	</div>
	<table class="table table-hover">
  
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Picture</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($media as $row)
    <tr>  
      <th scope="row">{{$loop->index + 1}}</th>
      <td>{{$row->news->title}}</td>
      <td><img src="{{URL::asset($row->picture)}}" style="height: 100px;" class="img img-thumnail"></td>
      <td>
      <form action="{{url('admin/newsfeature/'.$row->id)}}" method="post">
								{{csrf_field()}}
								{{method_field('delete')}}
        <div class="btn-group" role="group" aria-label="Basic example">
            <!-- <button type="submit" class="btn btn-danger">Delete</button> -->
            <input type="submit" value="delete" class="btn btn-danger" onclick="return confirm('Are You Sure Do You want to delete this project');">
        </div>
      </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
@section('script')

<script>
    	tinymce.init({
            selector: '#myTextarea',
            width: 600,
            height: 300
        });
</script>	

@endsection