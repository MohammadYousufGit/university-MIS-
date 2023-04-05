@extends('layouts.app')
@section('content')
	
	<div class="card card-primary">
        <div class="card-heading">
            <h1></h1>
        </div>
		<form method="post" action="{{url('admin/media')}}" enctype="multipart/form-data">
			<div class="card-body">
				{{ csrf_field() }}
	         <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
	             <label for="name" class="control-label">Album title: {{$album->title}}</label>
	         </div>

             <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
	             <label for="name" class="control-label">Media Title</label>
                 <input id="name" type="text" class="form-control" name="title" value="{{ old('title') }}">
                 @if ($errors->has('title'))
                     <span class="help-block">
                         <strong>{{ $errors->first('title') }}</strong>
                     </span>
                 @endif
	         </div>
             <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
	             <label for="name" class="control-label">Media type</label>
                 <select name="type" id="" class="form-control">
                    <option value="0">Picture</option>
                    <option value="1">Video</option>
                 </select>
                 @if ($errors->has('type'))
                     <span class="help-block">
                         <strong>{{ $errors->first('type') }}</strong>
                     </span>
                 @endif
	         </div>
	         <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
	             <label for="image" class="control-label">Media</label>
                  <input type="hidden" value="{{$album->id}}" name="gallery_id" />  
                  <input id="image" type="file" class="form-control" name="image" value="{{ old('image') }}" required="required" placeholder="Please select image (in formate of jpg,png,bmp">

                 @if ($errors->has('image'))
                     <span class="help-block">
                         <strong>{{ $errors->first('image') }}</strong>
                     </span>
                 @endif
            </div>
			
          </div>
			<div class="card-footer">
				
				<div class="form-group">
					<a href="{{url('admin/gallery')}}" class="btn btn-default">Cancel</a>
	            <input type="submit" class="btn btn-primary" value="Save">
	         </div>
			</div>
		</form>
	</div>
	<table class="table table-hover">  
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Album Title</th>
                <th scope="col">Media Title</th>
                <th scope="col">Picture</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($media as $row)
            <tr>  
                <th scope="row">{{$loop->index + 1}}</th>
                <td>{{$row->gallery->title}}</td>
                <td>{{$row->title}}</td>
                <td><img src="{{URL::asset($row->picture)}}" style="height: 100px;" class="img img-thumnail"></td>
                <td>
                <form action="{{url('admin/media/'.$row->id)}}" method="post">
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
<div class="row">
      <div class="text-center">
        {{$media->links('pagination::bootstrap-4')}}
       </div>
</div>
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