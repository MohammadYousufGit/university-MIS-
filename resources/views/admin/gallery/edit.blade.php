@extends('layouts.app')
@section('content')

	
	<div class="panel panel-primary">

        <div class="panel-heading">
                Edit Gallery
        </div>
		<form method="post" action="{{url('admin/gallery/'.$data->id)}}" enctype="multipart/form-data">
			<div class="panel-body">
				{{ csrf_field() }}
                {{ method_field('PUT') }}
	         <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
	             <label for="name" class="control-label">Title</label>
                 <input id="name" type="text" class="form-control" name="title" value="{{$data->title }}" required="required">
                 @if ($errors->has('title'))
                     <span class="help-block">
                         <strong>{{ $errors->first('title') }}</strong>
                     </span>
                 @endif
	         </div>

             <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
	             <label for="name" class="control-label">link</label>
                 <input id="name" type="text" class="form-control" name="link" value="{{$data->link }}">
                 @if ($errors->has('link'))
                     <span class="help-block">
                         <strong>{{ $errors->first('link') }}</strong>
                     </span>
                 @endif
	         </div>

	         <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
	             
                 <label for="image" class="control-label">Image</label>
                 <img src="{{URL::asset($data->picture)}}" class="img img-thumnail" style="width:100px;">   
                 <input id="image" type="file" class="form-control" name="image"  placeholder="Please select image (in formate of jpg,png,bmp" />

                 @if ($errors->has('image'))
                     <span class="help-block">
                         <strong>{{ $errors->first('image') }}</strong>
                     </span>
                 @endif
	         </div>

			</div>

			<div class="panel-footer">
				<div class="form-group">
					<a href="{{url('admin/gallery')}}" class="btn btn-default">Cancel</a>
	            <input type="submit" class="btn btn-primary" value="Save">
	         </div>
			</div>
		</form>
	</div>

@endsection
@section('script')

	
@endsection