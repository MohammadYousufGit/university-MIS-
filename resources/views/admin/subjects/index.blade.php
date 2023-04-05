@extends('layouts.app')
@section('pagename')
    subjects
@endsection
@section('content')
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Subjects List</h5>

                <!-- Table with stripped rows -->
                <table id="example1" class="table table-bordered table-condensed table-hover table-striped">
                    <thead>

                        <tr>
                            <th>Subject Name</th>
                            <th>
                              <table style="width: 100%;">
                              <tbody >
                                <tr class="col-12 row" >
                                <td class="col-6" >Class Name </td>
                                <td class="col-2">Credit</td>
                                <td class="col-2">Teach</td>
                                <td class="col-2">Edit</td>
                                </tr>

                              </tbody>
                              </table>
                            </th>
                            <th>Manipulate</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $subject)
                            <tr>
                                <td>{{ $subject->name }}</td>
                                <td>
                                    <table id="tbl2" class="table table-condensed table-hover table-striped">

                                        <tbody>
                                            @foreach ($senf_subjects->where('subject_id', $subject->id) as $senf_subject)
                                                <tr>
                                                    <td>{{ $senf_subject->senf->name }}</td>
                                                    <td>{{ $senf_subject->credit }}</td>
                                                    <td>{{ $senf_subject->teacher->name }}</td>
                                                    <td>
                                                        <form id="ss-del-form-{{ $senf_subject->id }}"
                                                            action="{{ route('senf-subjects.destroy', $senf_subject) }}"
                                                            method="post">
                                                        <div class="btn-group btn-group-sm" role="group">
                                                            <a class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#senfsubjectmodel{{ $senf_subject->id }}"
                                                                href="{{ route('senf-subjects.edit', $senf_subject) }}"><span
                                                                    class="bx bxs-edit-alt"></span></a>
                                                                {{ csrf_field() }}
                                                                {{ method_field('delete') }}

                                                                <a href="#"
                                                                    onclick="
                                                                            if(confirm('Are you sure to delete')){
                                                                            event.preventDefault();
                                                                            document.getElementById('ss-del-form-{{ $senf_subject->id }}').submit();
                                                                            }
                                                                            else event.preventDefault();

                                                                            "
                                                                    class="btn btn-danger"><span
                                                                        class="bx bxs-trash"></span></a>
                                                                {{-- @endcan --}}

                                                              </div>
                                                            </form>
                                                    </td>

                                        <div class="modal fade" id="senfsubjectmodel{{ $senf_subject->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit the {{ $subject->name }} Subject for Class of {{ $senf_subject->senf->name }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form class="row g-3" action="{{ route('senf-subjects.update', $senf_subject) }}"
                                                            method="post">
                                                            {{ csrf_field() }}
                                                            {{ method_field('PUT') }}
                                                            <div class="row">
                                                            <div class="col-6">
                                                                <label for="inputName5" class="form-label">Credit</label>
                                                                <input type="text" required value="{{ $senf_subject->credit }}"
                                                                    class="form-control" id="inputName5" name="credit">
                                                                <input type="hidden" value="{{ $senf_subject->id }}"
                                                                    class="form-control" id="inputName5" name="senf_subject_id">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="inputState" class="form-label">Teacher of the
                                                                    Subject</label>
                                                                <select name="teacher" required id="inputState"
                                                                    class="form-select">
                                                                    <option >Choose Teacher</option>
                                                                    @foreach ($teachers as $teacher)
                                                                        <option @selected($teacher->id == $senf_subject->teacher_id) value="{{ $teacher->id }}">
                                                                            {{ $teacher->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            </div>
                                                            <div class="text-center" style="padding: 5px;">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Edit</button>
                                                            </div>
                                                        </form><!-- End Multi Columns Form -->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                                <td>


                                    {{-- <button type="button" class="btn btn-success rounded-pill"><i class="bi bi-pencil-square"></i></button> --}}


                                    {{-- @can('subjects.update', Auth::user()) --}}

                                    <div class="btn-group btn-group-sm" role="group">
                                        <a class="btn rounded-pill btn-dark"
                                            href="{{ route('subjects.edit', $subject) }}"><span
                                                class="bx bxs-edit-alt"></span></a>
                                        <a class="btn btn-info rounded-pill btn-shadow" data-bs-toggle="modal"
                                            data-bs-target="#basicModal{{ $subject->id }}"><span
                                                class="bi bi-person-lines-fill"></span></a>


                                        {{-- @endcan --}}

                                        {{-- @can('subjects.delete', Auth::user()) --}}

                                        {{-- <input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger delete-btn" value="delete" /> --}}

                                        <form id="del-form-{{ $subject->id }}"
                                            action="{{ route('subjects.destroy', $subject) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}

                                            <a href="#"
                                                onclick="
                                            if(confirm('Are you sure to delete')){
                                            event.preventDefault();
                                            document.getElementById('del-form-{{ $subject->id }}').submit();
                                            }
                                            else event.preventDefault();

                                            "
                                                class="btn btn-danger rounded-pill btn-shadow"><span
                                                    class="bx bxs-trash"></span></a>
                                            {{-- @endcan --}}

                                        </form>
                                        <div class="modal fade" id="basicModal{{ $subject->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Assign Teacher and Class to the Subject</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form class="row g-3" action="{{ route('subjects.assign') }}"
                                                            method="post">
                                                            {{ csrf_field() }}
                                                            <div class="col-md-8">
                                                                <label for="inputName5" class="form-label">Subject
                                                                    Name</label>
                                                                <input type="text" value="{{ $subject->name }}" readonly
                                                                    class="form-control" id="inputName5" name="name">
                                                                <input type="hidden" value="{{ $subject->id }}" readonly
                                                                    class="form-control" id="inputName5" name="subject_id">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="inputName5" class="form-label">Credit for
                                                                    Class</label>
                                                                <input type="text" required class="form-control" id="inputName5"
                                                                    name="credit">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="inputState" class="form-label">Class of the
                                                                    Subject</label>
                                                                <select name="senf" required id="inputState"
                                                                    class="form-select">
                                                                    <option selected="">Choose Class</option>
                                                                    @foreach ($senfs as $senf)
                                                                        <option value="{{ $senf->id }}">
                                                                            {{ $senf->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="inputState" class="form-label">Teacher of the
                                                                    Subject</label>
                                                                <select name="teacher" required id="inputState"
                                                                    class="form-select">
                                                                    <option selected="">Choose Teacher</option>
                                                                    @foreach ($teachers as $teacher)
                                                                        <option value="{{ $teacher->id }}">
                                                                            {{ $teacher->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="text-center">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Submit</button>
                                                                <button type="reset" data-bs-dismiss="modal"
                                                                    class="btn btn-secondary">Reset</button>
                                                            </div>
                                                        </form><!-- End Multi Columns Form -->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->
                <a href="{{ route('subjects.create') }}" style="display: inline; float: right"
                    class="btn btn-primary col-lg-3">Add New subject</a>
            </div>
        </div>
    </div>
@endsection
