@extends('layouts.public_master')
@section('style')

@endsection
@section('content')
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>{{$gallery->title}}</h2>
      <ol>
        <li><a href="{{url('/')}}">Home</a></li><li><a href="{{url('/gallery')}}">Gallery & Media</a></li>
        <li>{{$gallery->title}}</li>
      </ol>
    </div>
  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Story Intro Section ======= -->
<!-- ======= Gallery Section ======= -->
<section id="gallery" class="gallery">
  <div class="container">
    <!-- 
        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="gallery-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-home">Home</li>
              <li data-filter=".filter-beach">Beach</li>
              <li data-filter=".filter-vacation">Vacation</li>
            </ul>
          </div>
        </div> -->

    <div class="section-title">
      <h2>{{$gallery->title}}</h2>
    </div>
    <div class="row gallery-container">
      @foreach($gallery->media as $row)
      <div class="col-lg-4 col-md-6 gallery-item filter-home">
        <h4 class="text-center">{{$row->title}}</h4>
        <div class="gallery-wrap">
          <img src="{{URL::asset($row->picture)}}" class="img-fluid" alt="">
          <div class="gallery-info">
            <div class="gallery-links">
              <a href="{{URL::asset($row->picture)}}" class="glightbox" title="{{$row->title}}"><i class="bx bx-plus"></i></a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</section><!-- End Gallery Section -->


@endsection