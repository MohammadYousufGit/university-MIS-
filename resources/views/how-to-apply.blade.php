@extends('layouts.public_master')
@section('style')

@endsection
@section('content')
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>How to Apply</h2>
      <ol>
        <li><a href="{{url('/')}}">Home</a></li>
        <li>How to Apply</li>
      </ol>
    </div>
  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Story Intro Section ======= -->
<section id="story-intro" class="story-intro">
  <div class="container">
    <div class="section-title">
      <h2>How to Apply</h2>
    </div>
    <div class="row">
      <div class="col-lg-6 text-center">
        <img src="{{URL::asset('assets/img/ashna-kankor.jpg')}}" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6 content pt-1">
        <p class="text-justify"><strong> The Ashna University is committed to disclose and implement new ways of teaching, new disciplines of study and new learting methods. Your gift enriches the experience of all students by supporting efforts to recruit top faculty, expand academic programs and respond to the emerging needs of our academic campus and Ashna University environment.</strong></p>
        
        <p><strong>Besides of it, the Ashna University provide you the practical skills that is necessary to transition seamlessly into the workforce upon your graduation, but we also make sure that you will have a good sense of social justice so that you make the transition responsibly.</strong></p>
        <h4>To enroll to  Ashna:</h4>
        <ol>
            <li><strong>Visit our office and get information brochures.</strong></li>
            <li><strong>Select your interested faculty and department.
</strong></li>
            <li><strong>Fill the student admission form
</strong></li>
<li><strong>Submit the filled form of students with required identical documents and 4 passport size photo.
</strong></li>
<li><strong>Receive your Kankor Exam entry card.
</strong></li>
<li><strong>Pass the Kankor entry Exam.
</strong></li>
<li><strong>Register yourself in your choosen faculty and department
</strong></li>
<li><strong>Start your studeny!
</strong></li>



        </ol>
        
      </div>
    </div>

  </div>
</section><!-- End Story Intro Section -->


@endsection