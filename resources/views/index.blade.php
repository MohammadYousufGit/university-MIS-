@extends('layouts.public_master')
@section('style')

@endsection

@section('slider')
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        @if(count($slider)>1)
        <div class="carousel-item active" style="background-image: url({{$slider[0]->picture}})">
        </div>
        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url({{$slider[1]->picture}})">
        </div>
        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url({{$slider[2]->picture}})">
        </div>
        @endif
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->


@endsection
@section('content')
 <!-- ======= My & Family Section ======= -->
 <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>Short about Ashna University</h2>
          <p>Ashna University was established with the official license serial number 95 and registration number
          1118 on Sep-2014; after passing the first entrance exam, the Ashna Institute of Higher Education officially started its academic and teaching activities in the Faculties of Law and Economics.
          Since it's establishment until now, within the framework of two faculties, a suitable academic platform has been provided for the development of top talents and the empowerment of the useful forces of the country in order to develop the field of academic, political, social, economic , and cultural leadership & management that the future of the country is looking forward to.
          Fortunately, during this period of academic activities, Ashna Institute of Higher Education offered specialized student to society by 3 times graduation.</p>
        </div>
        <div class="row content">
          <div class="col-lg-6">
            <img src="assets/img/intro2.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              We currenty have two Faculties with following Departments:
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i>Law & Political Science </li>
                <ol>
                  <li>Prgression (LLB) Department </li>
                  <li>LLP Department</li>
                </ol>
              <li><i class="ri-check-double-line"></i> Economy</li>
                <ol>
                  <li>Business Administartion Department (BBA) </li>
                </ol>
            </ul>
            <p>The Ashna University Since 2014 has provided a sustainable, and standard platform for over 700 Students in faculties of Law & Economy. Besides of it we currently launched our Short term courses program that more than 8000 students took different short term capacity building, skill building programs.</p>
            <a href="{{url('/history')}}" class="btn-learn-more">Read More...</a>
          </div>
        </div>
      </div>
    </section><!-- End My & Family Section -->
    <!-- ======= Event List Section ======= -->
    <section id="event-list" class="event-list">
      <div class="container">
        <div class="section-title text-left">
          <h2 class="text-left">Recent Events, Researches, and News</h2>
          <p>The Ashna University believe that "Knowledge can't be produced with out continous researches!".</p>        
        </div>
        <div class="row">
          @foreach($event as $row)
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
                <img src="{{URL::asset($row->picture)}}" alt="{{$row->title}}">
              </div>
              <div class="card-body">
                <h5 class="card-title">{{$row->title}}</h5>
                <p class="fst-italic text-center">{{$row->publish_date->toFormattedDayDateString()}}</p>
                <p class="card-text">{!!Str::limit($row->description,151)!!}</p><br>
                <a class="btn btn-primary btn-small" href="{{url('news-events/'.$row->id)}}">Read More</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section><!-- End Event List Section -->


    
    <!-- ======= Event List Section ======= -->
    <section id="event-list" class="event-list">
      <div class="container">
        <div class="row">
          @foreach($news as $row)
          <div class="col-md-4 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
                <img src="{{URL::asset($row->picture)}}" alt="{{$row->title}}">
              </div>
              <div class="card-body">
                <h5 class="card-title">{{$row->title}}</h5>
                <p class="fst-italic text-center">{{$row->publish_date->toFormattedDayDateString()}}</p>
                <p class="card-text">{!!Str::limit($row->description,100)!!}</p>
                <a class="btn btn-primary btn-small" href="{{url('news-events/'.$row->id)}}">Read More</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Event List Section -->




    <!-- ======= Recent Photos Section ======= -->
    <section id="recent-photos" class="recent-photos">
      <div class="container">

        <div class="section-title">
          <h2 class="text-align-left">Our Partners</h2>
          <p>Thank you for being our top partners. Your support for Ashna University is above and beyond of words.</p>
        </div>

        <div class="recent-photos-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><a href="assets/img/recent-photos/1.jpg" class="glightbox"><img src="assets/img/recent-photos/1.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="assets/img/recent-photos/2.jpg" class="glightbox"><img src="assets/img/recent-photos/2.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="assets/img/recent-photos/3.jpg" class="glightbox"><img src="assets/img/recent-photos/3.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="assets/img/recent-photos/4.jpg" class="glightbox"><img src="assets/img/recent-photos/4.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="assets/img/recent-photos/5.jpg" class="glightbox"><img src="assets/img/recent-photos/5.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="assets/img/recent-photos/6.jpg" class="glightbox"><img src="assets/img/recent-photos/6.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="assets/img/recent-photos/6.jpg" class="glightbox"><img src="assets/img/recent-photos/7.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="assets/img/recent-photos/6.jpg" class="glightbox"><img src="assets/img/recent-photos/8.jpg" class="img-fluid" alt=""></a></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Recent Photos Section -->

@endsection