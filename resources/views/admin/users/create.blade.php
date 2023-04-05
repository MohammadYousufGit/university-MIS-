
@extends('layouts.app')
@section('pagename')
Register
@endsection
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Register New User</h5>

      <!-- Multi Columns Form -->
      <form class="row g-3" action="{{ route('users.store') }}" method="post">
        {{ csrf_field() }}
        <div class="col-md-6">
          <label for="inputName5" class="form-label">User Name</label>
          <input type="text" class="form-control" id="inputName5" name="name">
        </div>
        <div class="col-md-6">
          <label for="inputName5" class="form-label">Occupation</label>
          <input type="text" class="form-control" id="inputName5" name="occupation">
        </div>

        <div class="col-md-6">
          <label for="inputName5" class="form-label">Phone</label>
          <input type="text" class="form-control" id="inputName5" name="phone">
        </div>
        <div class="col-md-6">
          <label for="inputEmail5" class="form-label">Email</label>
          <input type="email" required class="form-control" id="inputEmail5" name="email">
        </div>
        <div class="col-md-6">
          <label for="inputPassword5" class="form-label">Password</label>
          <input type="password" class="form-control" id="inputPassword5" name="password">
        </div>
        <div class="col-3">

            @foreach($roles as $role)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck" name="role[]" value="{{ $role->id }}">
                <label class="form-check-label" for="gridCheck">
                    {{ $role->name }}
                </label>
              </div>
            @endforeach
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End Multi Columns Form -->

    </div>
  </div>
@stop








{{--@extends('admin.layouts.app')--}}

{{--@section('content')--}}
    {{--<div class="col-md-12">--}}
        {{--<div class="row">--}}
            {{--<div class="box box-warning">--}}
                {{--<div class="box-header with-border">--}}
                    {{--<h3 class="box-title">General Elements</h3>--}}
                {{--</div>--}}
                {{--<!-- /.box-header -->--}}
                {{--<div class="box-body">--}}

                    {{--<!-- text input -->--}}
                    {{--<form class="form-horizontal" action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">--}}
                        {{--<div class="row">--}}
                            {{--{{ csrf_field() }}--}}
                            {{--<div class="form-group col-md-6">--}}
                                {{--<label class="control-label col-sm-4" for="email">Name:</label>--}}
                                {{--<div class="col-sm-8">--}}
                                    {{--<input type="text" class="form-control" id="name" required name="name" placeholder="Enter the Collector Name">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group col-md-6">--}}
                                {{--<label class="control-label col-sm-4" for="email">Father Name:</label>--}}
                                {{--<div class="col-sm-8">--}}
                                    {{--<input type="text" class="form-control" name="father_name" required placeholder="Enter Father Name">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group col-md-6">--}}
                                {{--<label class="control-label col-sm-4" for="email">Last Name:</label>--}}
                                {{--<div class="col-sm-8">--}}
                                    {{--<input type="text" class="form-control" id="email" name="last_name" required placeholder="Enter Last Name">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group col-md-6">--}}
                                {{--<label class="control-label col-sm-4" for="email">Phone:</label>--}}
                                {{--<div class="col-sm-8">--}}
                                    {{--<input type="text" class="form-control" id="email" name="phone" required placeholder="Enter Phone">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group col-md-6">--}}
                                {{--<label class="control-label col-sm-4" for="email">Email:</label>--}}
                                {{--<div class="col-sm-8">--}}
                                    {{--<input type="email" class="form-control" id="email" name="email" placeholder="Enter the Collector's Email">--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group col-md-6">--}}
                                {{--<label class="control-label col-sm-4" for="email">Image:</label>--}}
                                {{--<div class="col-sm-8">--}}
                                    {{--<input type="file" id="email" name="image" style="margin-top: 4px" required >--}}
                                {{--</div>--}}
                            {{--</div>--}}


                            {{--<div class="form-group">--}}
                                {{--<div class="col-sm-offset-2 col-sm-10">--}}
                                    {{--<button type="submit" class="btn btn-default">Save</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
                {{--<!-- /.box-body -->--}}
            {{--</div>--}}
            {{--<!-- /.box-body -->--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endsection--}}
