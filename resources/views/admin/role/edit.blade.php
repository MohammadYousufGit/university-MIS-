@extends('layouts.app')
@section('pagename')
Roles
@endsection
@section('content')


          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Roles</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3" action="{{ route('roles.update',$role->id) }}" method="post" >
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="col-12">
                    <label for="name">Role Title</label>
                    <input type="text" class="form-control" value="{{ $role->name }}" id="name" name="name" placeholder="Enter title">
                </div>
                <div class="row">
                    @foreach($permissions as $permission)
                    <div class="col-3">
                    {{-- @if($permission->for == 'students') --}}
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="permission[]"
                        @foreach($role->permissions as $role_permit)
                        @if($role_permit->id == $permission->id)
                        checked
                      @endif
                      @endforeach
                       value="{{ $permission->id }}">
                        <label class="form-check-label" for="gridCheck">
                            {{ $permission->name }}
                        </label>
                      </div>
                    </div>
                    {{-- @endif --}}
                    @endforeach
                </div>
                {{-- <div class="col-3">

                    @foreach($permissions as $permission)
                    @if($permission->for == 'managment')
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="permission[]" value="{{ $permission->id }}">
                        <label class="form-check-label" for="gridCheck">
                            {{ $permission->name }}
                        </label>
                      </div>

                    @endif
                    @endforeach
                </div>
                <div class="col-3">
                    @foreach($permissions as $permission)
                    @if($permission->for == 'finance')
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="permission[]" value="{{ $permission->id }}">
                        <label class="form-check-label" for="gridCheck">
                            {{ $permission->name }}
                        </label>
                      </div>

                    @endif
                    @endforeach
                </div>
                <div class="col-3">
                    @foreach($permissions as $permission)
                    @if($permission->for == 'exams')
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="permission[]" value="{{ $permission->id }}">
                        <label class="form-check-label" for="gridCheck">
                            {{ $permission->name }}
                        </label>
                      </div>

                    @endif
                    @endforeach
                </div>
                <div class="col-3">
                    @foreach($permissions as $permission)
                    @if($permission->for == 'announce')
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="permission[]" value="{{ $permission->id }}">
                        <label class="form-check-label" for="gridCheck">
                            {{ $permission->name }}
                        </label>
                      </div>

                    @endif
                    @endforeach
                </div>
                <div class="col-3">
                    @foreach($permissions as $permission)
                    @if($permission->for == 'attendance')
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="permission[]" value="{{ $permission->id }}">
                        <label class="form-check-label" for="gridCheck">
                            {{ $permission->name }}
                        </label>
                      </div>

                    @endif
                    @endforeach
                </div>
                <div class="col-3">
                    @foreach($permissions as $permission)
                    @if($permission->for == 'teacher')
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="permission[]" value="{{ $permission->id }}">
                        <label class="form-check-label" for="gridCheck">
                            {{ $permission->name }}
                        </label>
                      </div>

                    @endif
                    @endforeach
                </div>
                <div class="col-3">
                    @foreach($permissions as $permission)
                    @if($permission->for == 'user')
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="permission[]" value="{{ $permission->id }}">
                        <label class="form-check-label" for="gridCheck">
                            {{ $permission->name }}
                        </label>
                      </div>

                    @endif
                    @endforeach
                </div> --}}
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>
@stop
