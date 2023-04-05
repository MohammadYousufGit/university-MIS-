@extends('layouts.app')
@section('pagename')
Exams
@endsection
@section('content')
<div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Exams List</h5>

        <!-- Table with stripped rows -->
        <table id="example1" class="table table-bordered table-condensed table-hover table-striped">
            <thead>

            <tr>
                <th>No</th>
                <th>Subject</th>
                <th>Class Name</th>
                <th>Credit</th>
                <th>Type</th>
                <th>Taken Date</th>
                <th>Manipulate</th>
            </tr>
            </thead>
            <tbody>
                @foreach($exams as $Exam)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
{{--                            <td><img src="{{ Storage::disk('local')->url($Exam->image) }}" style="max-height: 60px;border-radius: 10%;max-width: 70px"></td>--}}

                        <td>{{ $Exam->senf_subject->subject->name }}</td>
                        <td>{{ $Exam->senf_subject->senf->name }}</td>
                        <td>{{ $Exam->senf_subject->credit }}</td>
                        <td>{{ $Exam->type }}</td>
                        <td>{{ $Exam->taken_date }}</td>
                        <td>
                                    <a class="btn btn-dark" href="{{ route('results.show',$Exam->id) }}"><span class="glyphicon glyphicon-edit"></span>Check Result</a>

                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        <!-- End Table with stripped rows -->
        <a href="{{ route("exams.create")}}" style="display: inline; float: right" class="btn btn-primary col-lg-3">Add New Exam</a>
      </div>
    </div>
</div>


  @endsection
