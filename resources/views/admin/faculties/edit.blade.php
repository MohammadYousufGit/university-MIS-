@extends('admin.layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">General Elements</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <!-- text input -->
                    <form class="form-horizontal" action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        <div class="row" style="border: 1px solid red">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group col-md-6">
                                <label class="control-label col-sm-4" for="">User Name:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="name" required name="name" value="{{ $user->name }}">
                                </div>
                            </div>
                            {{--<div class="form-group col-md-6">--}}
                                {{--<label class="control-label col-sm-4" for="">Phone:</label>--}}
                                {{--<div class="col-sm-8">--}}
                                    {{--<input type="text" class="form-control" id="email" name="phone" required value="{{ $user->phone }}">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group col-md-6">
                                <label class="control-label col-sm-4" for="email">Email:</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-md-6">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-sm-8">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6" >
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-sm-8">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            {{--<div class="form-group col-md-6">--}}
                                {{--<label class="control-label col-sm-4" for="">Image:</label>--}}
                                {{--<div class="col-sm-8">--}}
                                    {{--<input type="file" id="email" name="image" style="margin-top: 4px"  value="{{ $user->image }}">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group col-md-6" >
                                <label for="password-confirm" class="col-md-4 control-label">Select Roles:</label>
                                {{--<div class=" row" style="border: 1px solid red" >--}}
                                    @foreach( $roles as $role)
                                        <div class="checkbox col-sm-push-4 col-sm-8" style="display: inline-table; margin-right: 15px">
                                            <label><input type="checkbox" name="roles[]"
                                                @foreach($user->roles as $user_role)
                                                @if($role->id == $user_role->id )
                                                    checked
                                                          @endif
                                                        @endforeach
                                                     value="{{ $role->id }}">{{ $role->name }}</label>
                                        </div>
                                    @endforeach
                                {{--</div>--}}
                            </div>


                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box-body -->
        </div>
    </div>
@endsection
