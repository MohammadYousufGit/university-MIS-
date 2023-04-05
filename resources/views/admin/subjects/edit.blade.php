@extends('layouts.app')
@section('pagename')
subjects
@endsection
@section('content')


          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Subjects</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3" action="{{ route('subjects.update',$subject->id) }}" method="post" >
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="col-8">
                    <label for="name" class="form-label">subject Title</label>
                    <input type="text" class="form-control" value="{{ $subject->name }}" id="name" name="name" placeholder="Enter title">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>
@stop
