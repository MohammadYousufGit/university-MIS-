
@extends('layouts.app')
@section('pagename')
user
@endsection
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Edit the User</h5>

      <!-- Multi Columns Form -->
      <form class="row g-3" action="{{ route('users.update', $user) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="col-md-6">
          <label for="inputName5" class="form-label">User Name</label>
          <input type="text" value="{{ $user->name }}" class="form-control" id="inputName5" name="name">
        </div>
        <div class="col-md-6">
          <label for="inputName5" class="form-label">Occupation</label>
          <input type="text" value="{{ $user->occupation }}"  class="form-control" id="inputName5" name="occupation">
        </div>

        <div class="col-md-6">
          <label for="inputName5" class="form-label">Phone</label>
          <input type="text" value="{{ $user->phone }}" class="form-control" id="inputName5" name="phone">
        </div>
        <div class="col-md-6">
          <label for="inputEmail5" class="form-label">Email</label>
          <input type="email" value="{{ $user->email }}" required class="form-control" id="inputEmail5" name="email">
        </div>
        <div class="col-md-6">
          <label for="inputPassword5" class="form-label">Password</label>
          <input type="password" value="{{ $user->password }}" class="form-control" id="inputPassword5" name="password">
        </div>
        <div class="col-3">

            @foreach($roles as $role)
            <div class="form-check">
                <input class="form-check-input"
                @foreach ( $user->roles as $user_role )
                @checked($role->id == $user_role->id)
                @endforeach
                type="checkbox" id="gridCheck" name="roles[]" value="{{ $role->id }}">
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





