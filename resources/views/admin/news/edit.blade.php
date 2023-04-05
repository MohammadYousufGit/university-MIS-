@extends('layouts.app')
@section('content')

	
	<div class="panel panel-primary">

        <div class="panel-heading">
                Edit News
        </div>
		<form method="post" action="{{url('admin/news/'.$data->id)}}" enctype="multipart/form-data">
			<div class="panel-body">
				{{ csrf_field() }}
                {{ method_field('PUT') }}
	         
	        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
	             <label for="name" class="control-label">Title</label>

                 <select id="type" class="form-control" name="type" required="required">
                     <option value="0" @if ($data->type == 0) selected @endif>News</option>
                     <option value="1" @if ($data->type == 1) selected @endif>Event or Research</option>
                </select>     

                 @if ($errors->has('type'))
                     <span class="help-block">
                         <strong>{{ $errors->first('type') }}</strong>
                     </span>
                 @endif
	         </div>
	         
	         <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
	             <label for="name" class="control-label">News Title</label>

                 <input id="name" type="text" class="form-control" name="title" value="{{$data->title }}" required="required">

                 @if ($errors->has('title'))
                     <span class="help-block">
                         <strong>{{ $errors->first('title') }}</strong>
                     </span>
                 @endif
	         </div>


	         <div class="form-group{{ $errors->has('publish_date') ? ' has-error' : '' }}">
	             <label for="publish_date" class="control-label"> Start Date</label>

                 <input id="publish_date" type="text" class="form-control" name="publish_date" value="{{ $data->publish_date }}" required="required" placeholder="Year-Month-Day">

                 @if ($errors->has('publish_date'))
                     <span class="help-block">
                         <strong>{{ $errors->first('publish_date') }}</strong>
                     </span>
                 @endif
	         </div>



	         <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
	             
                 <label for="image" class="control-label">Image</label>
                 <img src="{{URL::asset($data->picture)}}" class="img img-thumnail" style="width:100px;">   
                 <input id="image" type="file" class="form-control" name="image"  placeholder="Please select image (in formate of jpg,png,bmp">

                 @if ($errors->has('image'))
                     <span class="help-block">
                         <strong>{{ $errors->first('image') }}</strong>
                     </span>
                 @endif
	         </div>

               <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
	             <label for="description" class="control-label">Description</label>
                 <textarea name="description" id="myTextarea" class="form-control tinymce-editor"  required="required">{!!$data->description!!}              	
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
            width: 850,
            height: 300
        });
</script>
	
@endsection