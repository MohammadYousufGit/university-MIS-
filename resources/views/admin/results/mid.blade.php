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

                        <table class="table table-responsif table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>Father Name</th>
                                    <th>20% Score</th>
                                    <th>Final Score</th>
                                    <th>Total Score</th>
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
                                    <td><input type="number" class="form-control noborder mid-term-score" name="mid_term_score[]"></td>
                                    <td><input type="number" class="form-control noborder final-score" readonly name="final_score[]"></td>
                                    <td><input type="number" class="form-control noborder total-score" readonly></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

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





 {{-- <!DOCTYPE html>
 <html>
 <head>
     <title>Exam Scores Form</title>
     <!-- Add Bootstrap CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 </head>
 <body>

     <div class="container mt-5">
         <h1>Exam Scores Form</h1>

         <form>
             <table class="table table-bordered">
                 <thead>
                     <tr>
                         <th>Student Name</th>
                         <th>Mid-Term Exam Score</th>
                         <th>Final Exam Score</th>
                         <th>Total Score</th>
                     </tr>
                 </thead>
                 <tbody>
                     <!-- Add rows for each student -->
                     <tr>
                         <td><input type="text" class="form-control" name="student_name[]" required></td>
                         <td><input type="number" class="form-control mid-term-score" name="mid_term_score[]"></td>
                         <td><input type="number" class="form-control final-score" name="final_score[]"></td>
                         <td><input type="number" class="form-control total-score" readonly></td>
                     </tr>
                     <tr>
                         <td><input type="text" class="form-control" name="student_name[]" required></td>
                         <td><input type="number" class="form-control mid-term-score" name="mid_term_score[]"></td>
                         <td><input type="number" class="form-control final-score" name="final_score[]"></td>
                         <td><input type="number" class="form-control total-score" readonly></td>
                     </tr>
                     <!-- Repeat for each student up to 10 -->
                 </tbody>
             </table>

             <button type="submit" class="btn btn-primary">Submit</button>
         </form>

     </div>

     <!-- Add Bootstrap JS -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

     <script>
         // Add event listener to all mid-term and final score input fields
         $('.mid-term-score, .final-score').on('keyup change', function() {
             // Get the current row of the input field
             var currentRow = $(this).closest('tr');
             // Get the mid-term and final score input fields for the current row
             var midTermScore = currentRow.find('.mid-term-score').val();
             var finalScore = currentRow.find('.final-score').val();
             // Calculate the total score by adding the mid-term and final scores if at least one of them has a value
             var totalScore = '';
             if (midTermScore || finalScore) {
                 totalScore = parseInt(midTermScore || 0) + parseInt(finalScore || 0);
             }
             // Set the total score input field value for the current row
             currentRow.find('.total-score').val(totalScore);
         });
     </script>

 </body>
 </html> --}}
