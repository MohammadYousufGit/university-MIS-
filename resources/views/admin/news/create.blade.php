@extends('layouts.app')
@section('pagename')
News & Events
@endsection
@section('content')

	
	<div class="panel panel-primary">

        <div class="panel-heading">
                News&  Research Event
        </div>
		<form method="post" action="{{url('admin/news')}}" enctype="multipart/form-data">
			<div class="panel-body">
				{{ csrf_field() }}
	         
	         <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
	             <label for="name" class="control-label">Select Publish Type</label>

                 <select id="type" class="form-control" name="type" required="required">
                     <option value="0">News</option>
                     <option value="1">Event or Research</option>
                </select>     

                 @if ($errors->has('type'))
                     <span class="help-block">
                         <strong>{{ $errors->first('type') }}</strong>
                     </span>
                 @endif
	         </div>
	         
	         <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
	             <label for="name" class="control-label">Title</label>

                 <input id="name" type="text" class="form-control" name="title" value="{{ old('title') }}" required="required">

                 @if ($errors->has('title'))
                     <span class="help-block">
                         <strong>{{ $errors->first('title') }}</strong>
                     </span>
                 @endif
	         </div>

	         <div class="form-group{{ $errors->has('publish_date') ? ' has-error' : '' }}">
	             <label for="publish_date" class="control-label"> Publish Date</label>

                 <input id="publish_date" type="text" class="form-control" name="publish_date" readonly value="{{ date('Y-m-d') }}" required="required" placeholder="Year-Month-Day">

                 @if ($errors->has('publish_date'))
                     <span class="help-block">
                         <strong>{{ $errors->first('publish_date') }}</strong>
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

               <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
	             <label for="description" class="control-label">Description</label>

                 <textarea name="description" class="form-control " id="myTextarea"  required="required">{!!old('description')!!}              	
                 </textarea>

                 @if ($errors->has('description'))
                     <span class="help-block">
                         <strong>{{ $errors->first('description') }}</strong>
                     </span>
                 @endif
	         </div>
			</div>

			<div class="panel-footer">
				
				<div class="form-group">
					<a href="{{url('admin/news')}}" class="btn btn-default">Cancel</a>
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