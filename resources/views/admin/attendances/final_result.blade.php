@extends('layouts.app')
@section('pagename')
result
@endsection
@section('content')
<div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{ $results[0]->exam->type }} Results for Subject "{{ $results[0]->exam->senf_subject->subject->name }}" of Class "{{ $results[0]->exam->senf_subject->senf->name }}" </h5>

        <table id="example1" class="table table-condensed table-hover table-striped">
            <thead>

            <tr>
                <th>No</th>
                <th>Student Name</th>
                <th>Father Name</th>
                <th>20% Score</th>
                <th>Final Score</th>
                <th>Total Score</th>
            </tr>
            </thead>
            <tbody>
                @foreach($results as $key=>$result)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $result->student->name }}</td>
                        <td>{{ $result->student->father_name }}</td>
                        <td>{{ $first_results[$key]->score }}</td>
                        <td>{{ $result->score }}</td>
                        <td></td>

                    </tr>
                    @endforeach
            </tbody>
        </table>
        <a href="{{ route("results.edit", $results[0])}}" style="display: inline; float: right" class="btn btn-primary col-lg-3">Edit the Result</a>
      </div>
    </div>
</div>

<script>
    var rows = document.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

    for (var i = 0; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName("td");

        var num1 = parseInt(cells[3].innerHTML);
        var num2 = parseInt(cells[4].innerHTML);
        var sum = num1 + num2;
        cells[5].innerHTML = sum;
    }
</script>

  @endsection
