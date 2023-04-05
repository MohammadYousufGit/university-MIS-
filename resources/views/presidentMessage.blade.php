@extends('layouts.public_master')
@section('style')

@endsection
@section('content')
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>President Message</h2>
      <ol>
        <li><a href="{{url('/')}}">Home</a></li>
        <li>President Message</li>
      </ol>
    </div>
  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Story Intro Section ======= -->
<section id="story-intro" class="story-intro">
  <div class="container">
    <div class="section-title">
      <h2>The President's Message</h2>
    </div>
    <div class="row">
      <div class="col-lg-6 text-center">
        <img src="assets/img/team/rahib.jpg" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6 content pt-1">
        <p class="text-justify"><strong> Ashna Institute of Higher Education is one of the trusted Afghanistan higher Education Institutes which started its bachelor activities in the year 2014 in two (Economics, Law & Political Science,) faculties. As compare the access to facilities, Ashna crossed qualitative and quantitative paths of expansion and growth in some way that has a good reputation among the academic Institutions of Afghanistan.</strong></p>
        <p class="text-justify"><strong>Building on our success, we are strengthening our programs and services, emphasizing innovative approaches towards excellence in education, including the introduction of career development initiatives, and accreditation of our Academic programs.</strong></p>
        <p class="text-justify"><strong>Ashna Institute of Higher Education with its eligible education conditions, professional executive team, and expert academic team tries to accomplish objectives and raise the quality of education and researches to achieve a national reputation. The Institute is obligated to create excellence in education and update the educational system among society of Universities, we are honestly trying to standardize the education system and increase the quality of higher education.</strong></p>
        <p class="text-justify"><strong> suggest applicants visit our campus to know how ASHNA brings Expertise and knowledge in their life.</strong></p>
        <strong>Sincerly/ Abdul Qadeer Rahib Doost</strong>
      </div>
    </div>

  </div>
</section><!-- End Story Intro Section -->


@endsection