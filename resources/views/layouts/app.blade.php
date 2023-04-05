<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ashna University</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{URL::asset('admin/img/favicon.png')}}" rel="icon">
  <link href="{{URL::asset('admin/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{URL::asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('admin/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{URL::asset('admin/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('admin/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{URL::asset('admin/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{URL::asset('admin/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{URL::asset('admin/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{URL::asset('admin/css/style.css')}}" rel="stylesheet">

@yield('style')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('includes.header')
<!-- End Header -->

  <!-- ======= Sidebar ======= -->

  @foreach (Auth::user()->roles as $role)

  @if ($role->id == 3)

  @include("includes.student-left-sidebar")

  @else

  @include("includes.left-sidebar")

  @endif
  @endforeach
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>@yield('pagename')</h1>
      <nav>
          <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">@yield('pagename')</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    {{-- {{ Auth::user()->name }}asdasdsad --}}
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif
@if (session('success'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif

    @section('content')
    @show

</main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>iDevelop</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        Designed by <a href="https://idevelopgroup.com/">iDevelop</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{URL::asset('admin/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{URL::asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{URL::asset('admin/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{URL::asset('admin/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{URL::asset('admin/vendor/quill/quill.min.js')}}"></script>
  <script src="{{URL::asset('admin/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{URL::asset('admin/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{URL::asset('admin/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{URL::asset('admin/js/main.js')}}"></script>

</body>

</html>
