<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ashna University</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{URL::asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{URL::asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <div class="header-top" style="max-height:45px">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-5 hidden-xs">
            </div>
            <div class="col-lg-5 col-md-6 col-sm-7 col-xs-12" style="max-height:45px">
                <div class="header-top-right">
                    <div class="content"><a href="{{url('/login')}}">Login</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<header id="header" class="">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="{{url('/')}}">Ashna University</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active" href="{{url('/')}}">Home</a></li>
          <li class="dropdown"><a href="#"><span>About Us</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{url('/history')}}">Our History</a></li>
              <li><a href="{{url('/president-message')}}">President Message</a></li>
              <li><a href="{{url('/facts-figures')}}">Facts & Figures</a></li>
              <!-- <li><a href="{{url('/strategic-plan')}}">Strategic Plan</a></li> -->
              <li><a href="{{url('/university-organogram')}}">University Organogram</a></li>
               <li><a href="{{url('/our-team')}}">Ashna Leadership team</a></li>
            </ul>
          </li>

          <li class="dropdown"><a href="#"><span>Academic</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{url('/academic-deputy')}}">Deputy Academic Affairs</a></li>
              <li class="dropdown"><a href="#"><span>Faculties</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="{{url('/economy-faculty')}}">Economics</a></li>
                  <li><a href="{{url('/law-faculty')}}">Law & Polictics</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Students</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{url('/student-deputy')}}">Deputy of Students Affairs</a></li>
              <li><a href="{{url('how-to-apply')}}">How to Apply</a></li>
              <li><a href="{{url('apply-process')}}">Application Process</a></li>

            </ul>
          </li>
          <li><a href="{{url('/university-services')}}">University Services</a></li>
          <li><a href="{{url('/news-events')}}">Events & News</a></li>
          <li><a href="{{url('/gallery')}}">Media & Gallery</a></li>
          <li><a href="{{url('/contact')}}">Contact Us</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


  @section('slider')
  @show


  <main id="main">

    @section('content')
    @show

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Ashna University</h3>
      <p>Ashna is a symbol of commitment, expertise and dynamism</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="https://facebook.com/ashnauniversity" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Ashna University</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Developed by <a href="https://idevelopgroup.com/">iDevelop</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{URL::asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{URL::asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{URL::asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{URL::asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{URL::asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{URL::asset('assets/js/main.js')}}"></script>
  @section('script')
  @show

</body>

</html>
