@extends('layouts.public_master')
@section('style')

@endsection
@section('content')
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Students Application Process</h2>
      <ol>
        <li><a href="{{url('/')}}">Home</a></li>
        <li>Students Application Process</li>
      </ol>
    </div>
  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Story Intro Section ======= -->
<section id="story-intro" class="story-intro">
  <div class="container">
    <div class="section-title">
      <h2>The Students Application Process</h2>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <p class="text-justified">The Ashna University is one of committed University for higher education in academic society the Afghanistan.  Ashna University is a place to provide educational services with high quality by ware professors and lecturers. You can explore our academic programs thorugh getting broture from our help desk of our office or from our website.

Students can apply to our undergraduate programs which were established by Ministry of Higher Education as per requirements of educational system of country.

The admission requirement in Ashna University is to pass the entry exam of Kankor, before applying to specific faculty; please review each faculty’s information precisely.

Admission to Ashna university is competitive, strict, discipline and excellence based.</p>
      </div>
      <div class="col-lg-6 text-center">
        <img src="assets/img/intro.jpg" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6 content">
          <h4>Bachelor of Business Administration BBA:</h4>
        <p class="text-justify"><strong>A Bachelor’s in Business Administration degree from Ashna University will provide students with the academic credentials, practical insights and business experience they require to transform their interests, and passions into a rewarding career. The department uses Experiential Learning and Student-Centered Learning which are the best approaches of teaching and learning in the world, to ensure high-quality student learning. Our BBA graduates have gone to establish their own businesses, manage firms, obtain Master’s and Doctoral degrees, and lead major national and international organizations.</strong></p>
    
      </div>
    </div>

  </div>
</section><!-- End Story Intro Section -->


@endsection