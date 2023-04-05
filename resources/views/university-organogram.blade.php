@extends('layouts.public_master')
@section('style')

@endsection
@section('content')
<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>University Organogram</h2>
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>University Organogram</li>
          </ol>
        </div>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Story Intro Section ======= -->
    <section id="story-intro" class="story-intro">
      <div class="container">
     
        <div class="row">
            <div class="col-lg-12">
            <img src="{{URL::asset('assets/img/organogram.jpg')}}" class="img-fluid" alt="">
          </div>
        </div>

      </div>
    </section><!-- End Story Intro Section -->


@endsection