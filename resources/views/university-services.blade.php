@extends('layouts.public_master')
@section('style')

@endsection
@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>University Services</h2>
      <ol>
        <li><a href="{{url('/')}}">Home</a></li>
        <li>Our Story</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Story Intro Section ======= -->
<section id="story-intro" class="story-intro">
  <div class="container">
    <div class="section-title">
      <h2>Why ASHNA University?</h2>
    </div>
    <p>The Ashna University has provided a standard platform of education for youth generation of Afghanistan. The leading of Ashna University know that improving of students in a standard academic environment can be easily achieved; the leading team beside of implementing all principle, law and rules of quality control of MoHE (Ministry of Higher Education) they costantly belive that environment of University also should calm, and standard.With reading following points, you will know why Ashna University become most trusted and popular among academic society of Afghanistan.</p>
    <div class="row">
      <div class="col-lg-6 order-1 order-lg-2">
        <img src="{{URL::asset('assets/img/team.jpg')}}" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
        <h3>Professional leading team & Expert Lecturers!</h3>
        <p text-justified>
          Ashna University is committed to the principle of professionalism; the Ashna leading team knows that only professionalism can sustain transparency and development in an organization. The Ashna University team either leading team and academic team day & night try to be better from one day before.
        </p>
        <p>Currently, All of our lecturers has Master's and Doctorate degrees; they are expert in their fields of knowledge. The Human Resource (HR) that works under-supervision of Academic deputy of University; always focus on standards regarding hiring of lecturers in University</p>
      </div>
    </div>

  </div>
</section><!-- End Story Intro Section -->

<!-- ======= Featured Members Section ======= -->
<section id="featured-members" class="featured-members">
  <div class="container">
    <div class="row content">
      <div class="col-lg-6">
        <img src="{{URL::asset('assets/img/library.jpg')}}" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6 pt-3 pt-lg-0">
        <h3>Library & Digital Resource Center!</h3>
        <p class="fst-italic">
          Library of Ashna University aims to prepare a place for the purpose of research studies of students, professors and staff who play the key role in knowledge development. Our library include Books, Magazines, Daily newspaper and other printed materials. Students can use library from 8:00 AM to 5:00 PM.
        </p>
        <p class="fst-italic">
          The digital resource center of Ashna University is a center witha high speed of internet and IT support to students, they can research, and access all online materials, books, journals and papers.
        </p>
      </div>
    </div>
  </div>
</section><!-- End Featured Members Section -->
<section id="story-intro" class="story-intro">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 order-1 order-lg-2">
        <img src="{{URL::asset('assets/img/location.jpg')}}" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
        <h3>Best Location in City!</h3>
        <p text-justified>The Ashna University regarding location is located in a best place; it helps students to reach on-time and prevent transportation expenses.
        </p>
        <p>Ashna University currently covers morethan 5 districts and located in center of these districts of city; everyone can reach it through one line bus stop. In future we want to active our branches in another provinces of Afghanistan and we will definitly consider this point.</p>
      </div>
    </div>

  </div>
</section><!-- End Story Intro Section -->

<!-- ======= Featured Members Section ======= -->
<section id="featured-members" class="featured-members">
  <div class="container">
    <div class="row content">
      <div class="col-lg-6">
        <img src="assets/img/practical.jpg" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6 pt-3 pt-lg-0">
        <h3>Theory & Practical learning methods!</h3>
        <p class="fst-italic">The academic team of Ashna University which is responsible for providing and implementation better teaching and learning methods, believe that only theories can't be enough for knowldege of students about a topic; therefor, the Ashna University hold practical sessions and side visits for students of Ashna University.
        </p>
        <p class="fst-italic">
          The Ashna University hold many Law clinics, Crime Clinics, Judiciary clinics, Side visit for companies and research tours for students.
        </p>
      </div>
    </div>
  </div>
</section><!-- End Featured Members Section -->


@endsection