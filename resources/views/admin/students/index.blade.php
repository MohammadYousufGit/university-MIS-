@extends('layouts.app')
@section('pagename')
student
@endsection
@section('content')
<div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Students From All Classes</h5>

            <!-- Accordion without outline borders -->
            <div class="accordion accordion-flush" id="accordionFlushExample">
                @foreach ( $senfs as $senf)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading{{ $senf->id }}">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $senf->id }}" aria-expanded="false" aria-controls="flush-collapse{{ $senf->id }}">
                        Students of {{ $senf->name }} Year {{ $senf->year }}
                      </button>
                    </h2>
                    <div id="flush-collapse{{ $senf->id }}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{ $senf->id }}" data-bs-parent="#accordionFlushExample" style="">
                      <div class="accordion-body row">
                        <div class="form-inline col-3">
                            <select class="form-select col-3" id="senf-select">
                                @foreach($senfs as $senfchange)
                                    <option value="{{ $senfchange->id }}">{{ $senfchange->name }} Year {{ $senfchange->year }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-outline-info" id="bulk-change-senf">Change Class</button>
                        <table id="example1" class="table table-bordered table-condensed table-hover table-striped">
                            <thead>

                            <tr>
                                <th><input type="checkbox"  class="select-all"></th>
                                <th>No</th>
                                <th>Full Name</th>
                                <th>father Name</th>
                                <th>Tazkera no</th>
                                <th>Current Address</th>
                                <th>Permenent Address</th>
                                <th>gender</th>
                                {{-- <th>Email Address</th> --}}
                                <th>Date of Birth</th>
                                <th>join year</th>
                                {{-- <th>graduated_at</th> --}}
                                <th>Manipulate</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($students->where('current_senf_id', $senf->id) as $student)
                                    <tr>
                                        <td><input type="checkbox" class="select-checkbox" data-senf="{{ $senf->id }}" value="{{ $student->id }}"></td>
                                        <td>{{ $loop->index+1 }}</td>
                        {{--                            <td><img src="{{ Storage::disk('local')->url($student->image) }}" style="max-height: 60px;border-radius: 10%;max-width: 70px"></td>--}}
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->father_name }}</td>
                                        <td>{{ $student->tazkera_no }}</td>
                                        <td>{{ $student->current_address }}</td>
                                        <td>{{ $student->permenent_address }}</td>
                                        <td>{{ $student->gender }}</td>
                                        {{-- <td>{{ $student->email }}</td> --}}
                                        <td>{{ $student->dob }}</td>
                                        <td>{{ $student->join_year }}</td>
                                        {{-- <td>{{ $student->graduated_at }}</td> --}}
                                        <td>
                                            <form id="del-form-{{ $student->id }}" action="{{ route('students.destroy',$student) }}" method="post">
                                                {{csrf_field()}}
                                                {{method_field('delete')}}
                                                <div class="btn-group btn-group-sm" role="group">

                                                    {{-- @can('students.update',Auth::user()) --}}

                                                    <a class="btn btn-info" href="{{ route('students.edit',$student) }}"><span class="glyphicon glyphicon-edit"></span>edit</a>
                                                    <a class="btn btn-info" href="{{ route('payments.show', $student) }}"><span class="glyphicon glyphicon-edit"></span>payment</a>
                                                    {{-- @endcan --}}

                                                    {{-- @can('students.delete',Auth::user()) --}}

                                                        {{--<input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger delete-btn" value="delete" />--}}
                                                    <a href="#" onclick="
                                                            if(confirm('Are you sure to delete')){
                                                            event.preventDefault();
                                                            document.getElementById('del-form-{{ $student->id }}').submit();
                                                            }
                                                            else event.preventDefault();

                                                            " class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Delete</a>
                                                     {{-- @endcan --}}

                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>

                      </div>
                    </div>
                  </div>
                @endforeach

            </div><!-- End Accordion without outline borders -->

        <a href="{{ route("students.create")}}" style="display: inline; float: right" class="btn btn-primary col-lg-3">Add New student</a>
          </div>
    </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(function() {
    // Uncheck all checkboxes initially
    $('input.select-checkbox').prop('checked', false);

    // Handle select-all checkbox
    $('.select-all').on('change', function() {
      var isChecked = $(this).prop('checked');
      $('input.select-checkbox').prop('checked', isChecked);
    });

    // Handle bulk-change-senf button
    $('#bulk-change-senf').on('click', function() {
      var newSenfId = $('#senf-select').val();
      var selectedStudents = $('input.select-checkbox:checked');
      selectedStudents.each(function() {
        var studentId = $(this).val();
        var studentSenf = $(this).data('senf');
        if (studentSenf != newSenfId) {
          // Send AJAX request to update student's SENF
          $.ajax({
            url: '/senf/change-student-senf',
            type: 'POST',
            data: {
              _token: '{{ csrf_token() }}',
              student_id: studentId,
              new_senf_id: newSenfId,
            },
            success: function(response) {
              // Update current SENF and reload page
              $('#flush-collapse' + studentSenf).collapse('hide');
              $('#flush-collapse' + newSenfId).collapse('show');
              location.reload();
            },
            error: function(xhr, status, error) {
              alert('Error: ' + error);
            }
          });
        }
      });
    });
  });

</script>
  @endsection



