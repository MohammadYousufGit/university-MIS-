@extends('layouts.app')
@section('content')

	
	<div class="panel panel-primary">

        <div class="panel-heading">
                Create Album
        </div>
		<form method="post" action="{{url('admin/gallery')}}" enctype="multipart/form-data">

			<div class="panel-body">
				{{ csrf_field() }}
	         <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
	             <label for="name" class="control-label">Album Title</label>
                 <input id="name" type="text" class="form-control" name="title" value="{{ old('title') }}" required="required">
                 @if ($errors->has('title'))
                     <span class="help-block">
                         <strong>{{ $errors->first('title') }}</strong>
                     </span>
                 @endif
	         </div>


	         <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
	             <label for="image" class="control-label">Picture</label>
                 <input id="image" type="file" class="form-control" name="image" value="{{ old('image') }}" required="required" placeholder="Please select image (in formate of jpg,png,bmp">

                 @if ($errors->has('image'))
                     <span class="help-block">
                         <strong>{{ $errors->first('image') }}</strong>
                     </span>
                 @endif
	         </div>

			 <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
	             <label for="name" class="control-label">Album link</label>
                 <input id="name" type="text" class="form-control" name="link" value="{{ old('link') }}">
                 @if ($errors->has('link'))
                     <span class="help-block">
                         <strong>{{ $errors->first('link') }}</strong>
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