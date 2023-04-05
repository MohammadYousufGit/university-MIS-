@extends('layouts.public_master')
@section('style')

@endsection
@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Our Story</h2>
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

    <div class="row">
      <div class="col-lg-6 order-1 order-lg-2">
        <img src="{{URL::asset('assets/img/intro.jpg')}}" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
        <h3>Our History</h3>
        <p text-justified>
          Ashna Private Higher Education Institute was established with the official license serial number 95 and registration number
          1118 on Sep-2014; after passing the first entrance exam, the Ashna Institute of Higher Education officially started its academic and teaching activities in the Faculties of Law and Economics.
          Since it's establishment until now, within the framework of two faculties, a suitable academic platform has been provided for the development of top talents and the empowerment of the useful forces of the country in order to develop the field of academic, political, social, economic , and cultural leadership & management that the future of the country is looking forward to.
          Fortunately, during this period of academic activities, Ashna Institute of Higher Education offered specialized student to society by 3 times graduation.
        </p>
        <p>
          Having professors with doctorate and master's degrees and serious attention to the growth and improvement of academic quality and a transparent approach to scientific values made Ashna University a trusted brand and popular among the students and young people who seek knowledge.</p>
      </div>
    </div>

  </div>
</section><!-- End Story Intro Section -->

<!-- ======= Featured Members Section ======= -->
<section id="featured-members" class="featured-members">
  <div class="container">

    <div class="row content">
      <div class="col-lg-6">
        <img src="assets/img/intro2.jpg" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6 pt-3 pt-lg-0">
        <h3>Our Vision:</h3>
        <p class="fst-italic">
          The Vision of Ashna Institute of Higher Education is determined to strengthen, develop and implement a quality education system based on cultural, Islamic and national values ​​that meets the needs of the society and the country, and also by hiring professional and expert staff who provide valuable academic services. to present.
        </p>
        <h3>Our Mission:</h3>
        <p class="fst-italic">
          The Mission of Ashna Institute of Higher Education is currently familiar with the training of scientific, professional, qualified and expert staff in accordance with high cultural, Islamic and national values, which is led by experienced scientific, professional, specialist and academic staff. He is busy and is actively involved in raising the quality of professional knowledge and in the development of higher education in his beloved country.
        </p>
      </div>
    </div>
  </div>
</section><!-- End Featured Members Section -->


    <!-- ======= Members Section ======= -->
    <section id="members" class="members">
      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="{{URL::asset('assets/img/team/rahib.jpg')}}" class="img-fluid img-rounded" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Abdul Qadeer Rahib Doost</h4>
                <span>Founder & Advisor</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="{{URL::asset('assets/img/team/academic.jpg')}}" class="img-fluid img-rounded" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Mr.Ghulam Dawood Shaeeq</h4>
                <span>Deputy of Academic Affairs</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/student.jpg" class="img-fluid img-rounded" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Mr.Omar Mukhtar Nikzad</h4>
                <span>Deputy of Students Affairs</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/finance.jpg" class="img-fluid img-rounded" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Mr.Habibullah Hussaini</h4>
                <span>Deputy of Finance & Administrative Affairs</span>
                </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Members Section -->


@endsection