@extends('layouts.app')
@section('pagename')
result
@endsection
@section('content')
<div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{ $results[0]->exam->type }}% Results for Subject "{{ $results[0]->exam->senf_subject->subject->name }}" of Class "{{ $results[0]->exam->senf_subject->senf->name }}" </h5>

        <!-- Table with stripped rows -->
        <table id="example1" class="table table-bordered table-condensed table-hover table-striped">
            <thead>

            <tr>
                <th>No</th>
                <th>Student Name</th>
                <th>Father Name</th>
                <th>Score</th>
            </tr>
            </thead>
            <tbody>
                @foreach($results as $result)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $result->student->name }}</td>
                        <td>{{ $result->student->father_name }}</td>
                        <td>{{ $result->score }}</td>

                    </tr>
                    @endforeach
            </tbody>
        </table>
        <!-- End Table with stripped rows -->
        <a href="{{ route("results.edit", $results[0]->exam)}}" style="display: inline; float: right" class="btn btn-primary col-lg-3">Edit the Result</a>
      </div>
    </div>
</div>


  @endsection
