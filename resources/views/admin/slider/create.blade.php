@extends('layouts.app')
@section('content')

	
	<div class="panel panel-primary">

        <div class="panel-heading">
                Add New slider
        </div>
		<form method="post" action="{{url('admin/slider')}}" enctype="multipart/form-data">

			<div class="panel-body">
				{{ csrf_field() }}
	         <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
	             <label for="name" class="control-label">Title</label>

                 <input id="name" type="text" class="form-control" name="title" value="{{ old('title') }}">

                 @if ($errors->has('title'))
                     <span class="help-block">
                         <strong>{{ $errors->first('title') }}</strong>
                     </span>
                 @endif
	         </div>
             
             <div class="form-group{{ $errors->has('sub_title') ? ' has-error' : '' }}">
	             <label for="name" class="control-label">Sub Title</label>

                 <input id="name" type="text" class="form-control" name="sub_title" value="{{ old('sub_title') }}">

                 @if ($errors->has('sub_title'))
                     <span class="help-block">
                         <strong>{{ $errors->first('sub_title') }}</strong>
                     </span>
                 @endif
	         </div>


	         <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
	             <label for="image" class="control-label">Image</label>

                 <input id="image" type="file" class="form-control" name="image" value="{{ old('image') }}" required="required" placeholder="Please select image (in formate of jpg,png,bmp">

                 @if ($errors->has('image'))
                     <span class="help-block">
                         <strong>{{ $errors->first('image') }}</strong>
                     </span>
                 @endif
	         </div>
			</div>

			<div class="panel-footer">
				
				<div class="form-group">
					<a href="{{url('admin/slider')}}" class="btn btn-default">Cancel</a>
	            <input type="submit" class="btn btn-primary" value="Save">
	         </div>
			</div>
		</form>
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