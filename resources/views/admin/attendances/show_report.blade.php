@extends('layouts.app')
@section('pagename', 'Attendance / Attendance Report')
@section('content')
<div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Attendance of {{ $students[0]->senf->name }} for {{ $attendances[0]->senf_subject->subject->name }}</h5>
            <table id="example1" class="table table-bordered table-condensed table-hover table-striped">
                <thead>

                <tr>
                    <th>No</th>
                    <th>Full Name</th>
                    <th>father Name</th>
                    <th>Present</th>
                    <th>Present Dates</th>
                    <th>Ubsent</th>
                    <th>Ubsent Dates</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
    {{--                            <td><img src="{{ Storage::disk('local')->url($student->image) }}" style="max-height: 60px;border-radius: 10%;max-width: 70px"></td>--}}
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->father_name }}</td>
                            <td>{{ $attendances->where('student_id', $student->id)->where('is_present', true)->count() }} hours</td>
                            <td>
                                @foreach($attendances->where('student_id', $student->id)->where('is_present', true) as $attendance)
                                <p>{{ $attendance->created_at->format('m/d/Y') }} | &nbsp; <i>L {{ $attendance->lesson }}</i></p>
                                @endforeach
                            </td>
                            <td>{{ $attendances->where('student_id', $student->id)->where('is_present', false)->count() }} hours</td>
                            <td>
                                @foreach($attendances->where('student_id', $student->id)->where('is_present', false) as $attendance)
                                <p>{{ $attendance->created_at->format('m/d/Y') }} | &nbsp; <i>L {{ $attendance->lesson }}</i></p>
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>

          </div>
    </div>

</div>


  @endsection



