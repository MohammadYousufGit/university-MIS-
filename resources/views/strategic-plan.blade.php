@extends('layouts.public_master')
@section('style')

@endsection
@section('content')
<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Strategic Plan</h2>
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>Strategic Plan</li>
          </ol>
        </div>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Story Intro Section ======= -->
    <section id="story-intro" class="story-intro">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2">
            <img src="assets/img/intro.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Strategic Plan Page</h3>
            <p>Content will be added soon!
            </p>
            
          </div>
        </div>

      </div>
    </section><!-- End Story Intro Section -->


@endsection