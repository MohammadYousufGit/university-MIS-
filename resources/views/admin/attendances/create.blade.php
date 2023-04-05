@extends('layouts.app')
@section('pagename')
Attendance
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Attendance of {{ $senf_subject->senf->name }} year {{ $senf_subject->senf->year }}</h5>
        <form action="{{ route('attendances.store') }}" method="post">
<div class="row">
        <div class="col-md-6">
            <label for="inputName5" class="form-label">Lesson Time</label>
            <input type="number" required class="form-control" id="inputName5" name="lesson">
          </div>
        <div class="col-md-6">
            <label for="inputName5" class="form-label">Attendance Date</label>
            <input type="date" required class="form-control" id="inputName5" name="date">
          </div>
</div>
        <div class="container mt-5">

                {{ csrf_field() }}

                        <table class="table table-responsif table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>Father Name</th>
                                    <th>Present</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <input value="{{ $senf_subject->id }}" type="hidden" class="form-control noborder" name="senf_subject_id" required>
                                @foreach ($senf_subject->senf->students as $student)

                        <tr>
                            <td>
                                <input value="{{ $student->id }}" type="hidden" class="form-control noborder" name="student_id[]" required>
                                {{ $loop->index+1 }}
                            </td>

                                    <td><input type="text" readonly class="form-control noborder" value="{{ $student->name }}" name="student_name[]" required></td>
                                    <td><input type="text" readonly class="form-control noborder" value="{{ $student->father_name }}" name="fahter_name[]" required></td>
                                    <td><input type="checkbox"  name="is_present[]" class="form-check-input" style="margin-left: 30%; margin-top: 12%; border-radius: 5%; transform: scale(3); -webkit-transform: scale(3);"></td>
                                    <td><input type="text" class="form-control noborder final-score"  name="status[]"></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </div>
                </form>



    </div>
</div>
@stop

