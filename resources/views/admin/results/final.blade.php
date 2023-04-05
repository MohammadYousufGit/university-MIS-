@extends('layouts.app')
@section('pagename')
Result
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Add Exam Result</h5>



        <div class="container mt-5">

            <form action="{{ route('results.store') }}" method="post">
                {{ csrf_field() }}
<div class="row">

    <div class="col-7">

        <table class="table table-responsif">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Father Name</th>
                </tr>
            </thead>
            <tbody>
                <input value="{{ $exam->id }}" type="hidden" class="form-control noborder" name="exam_id" required>
                <input value="{{ $exam->type }}" type="hidden" class="form-control noborder" name="exam_type" required>


                @foreach ($exam->senf_subject->senf->students as $student)

        <tr>
            <td>
                <input value="{{ $student->id }}" type="hidden" class="form-control noborder" name="student_id[]" required>
                {{ $loop->index+1 }}
            </td>

            <td><input type="text" class="form-control noborder" value="{{ $student->name }}" name="student_name[]" required></td>
            <td><input type="text" class="form-control noborder" value="{{ $student->father_name }}" name="fahter_name[]" required></td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="col-5">
        <table class="table table-responsif">
            <thead>
                <tr>
                    <th>20% Score</th>
                    <th>Final Score</th>
                    <th>Total Score</th>
                </tr>
            </thead>
            <tbody>
                <input value="{{ $exam->id }}" type="hidden" class="form-control noborder" name="exam_id" required>
                <input value="{{ $exam->type }}" type="hidden" class="form-control noborder" name="exam_type" required>


                @foreach ($mid_exam_results as $result)

        <tr>
                    <td><input type="number" class="form-control noborder mid-term-score" readonly value="{{ $result->score }}" name="mid_term_score[]"></td>
                    <td><input type="number" class="form-control noborder final-score"  name="final_score[]"></td>
                    <td><input type="number" class="form-control noborder total-score" readonly></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>

                <!-- Add Bootstrap JS -->
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

                <script>
                    $('.mid-term-score, .final-score').on('keyup change', function() {
                        // Get the current row of the input field
                        var currentRow = $(this).closest('tr');
                        // Get the mid-term and final score input fields for the current row
                        var midTermScore = currentRow.find('.mid-term-score').val();
                        var finalScore = currentRow.find('.final-score').val();
                        var totalScore = '';
                        if (midTermScore || finalScore) {
                            totalScore = parseInt(midTermScore || 0) + parseInt(finalScore || 0);
                        }
                        // Set the total score input field value for the current row
                        currentRow.find('.total-score').val(totalScore);
                    });
                </script>





    </div>
</div>
@stop
