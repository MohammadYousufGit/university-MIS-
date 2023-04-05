@extends('layouts.public_master')
@section('style')

@endsection
@section('content')
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Facts & Figures</h2>
      <ol>
        <li><a href="{{url('/')}}">Home</a></li>
        <li>Facts & Figures</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Story Intro Section ======= -->
<section id="story-intro" class="story-intro">
  <div class="container">
    <div class="section-title">
      <h2>Facts & Figures</h2>
    </div>
    <div class="row">
    <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Total Graduated Students</h5>
              <!-- Pie Chart -->
              <div id="graduate"></div>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#graduate"), {
                    series: [77, 314, 63, 175],
                    chart: {
                      height: 350,
                      type: 'pie',
                      toolbar: {
                        show: true
                      }
                    },
                    labels: ['Female Law Faculty', 'Male Law Faculty', 'Female Economy Faculty', 'Male Economy Faculty']
                  }).render();
                });
              </script>
              <!-- End Pie Chart -->

            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Current Students Statistics</h5>
              <!-- Pie Chart -->
              <div id="current"></div>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#current"), {
                    series: [37, 100, 62, 175],
                    chart: {
                      height: 350,
                      type: 'pie',
                      toolbar: {
                        show: true
                      }
                    },
                    labels: ['Female Law Faculty', 'Male Law Faculty', 'Female Economy Faculty', 'Male Economy Faculty']
                  }).render();
                });
              </script>
              <!-- End Pie Chart -->

            </div>
          </div>
        </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Law & Polictical Science Graduated Students Statistics</h5>

            <!-- Column Chart -->
            <div id="law"></div>
            <script>
              document.addEventListener("DOMContentLoaded", () => {
                new ApexCharts(document.querySelector("#law"), {
                  series: [{
                    name: 'Male',
                    data: [28, 55, 17, 100, 11, 45, 6, 25, 5]
                  }, {
                    name: 'Female',
                    data: [4, 17, 7, 18, 2, 11, 8, 7, 25]
                  }],
                  chart: {
                    type: 'bar',
                    height: 350
                  },
                  plotOptions: {
                    bar: {
                      horizontal: false,
                      columnWidth: '55%',
                      endingShape: 'rounded'
                    },
                  },
                  dataLabels: {
                    enabled: false
                  },
                  stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                  },
                  xaxis: {
                    categories: ['First-Term-1397','Second-Term-1397', '3th-Term-1398','4th-Term-1398','5th-Term-1399','6th-Term-1399',
                    '7th-Term-1400','8th-Term-1400','9th-Term-1401'],
                  },
                  yaxis: {
                    title: {
                      text: ' (Students)'
                    }
                  },
                  fill: {
                    opacity: 1
                  },
                  tooltip: {
                    y: {
                      formatter: function(val) {
                        return " " + val + " Students"
                      }
                    }
                  }
                }).render();
              });
            </script>
            <!-- End Column Chart -->

          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Economics Graduated Students Statistics</h5>

            <!-- Column Chart -->
            <div id="economy"></div>
            <script>
              document.addEventListener("DOMContentLoaded", () => {
                new ApexCharts(document.querySelector("#economy"), {
                  series: [{
                    name: 'Male',
                    data: [47, 13, 50, 30, 12, 12, 11]
                  }, {
                    name: 'Female',
                    data: [13, 4, 16, 5, 3, 9, 13]
                  }],
                  chart: {
                    type: 'bar',
                    height: 350
                  },
                  plotOptions: {
                    bar: {
                      horizontal: false,
                      columnWidth: '55%',
                      endingShape: 'rounded'
                    },
                  },
                  dataLabels: {
                    enabled: false
                  },
                  stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                  },
                  xaxis: {
                    categories: ['Second-Term-1397', '3th-Term-1398','4th-Term-1398','6th-Term-1399',
                    '7th-Term-1400','8th-Term-1400','9th-Term-1401'],
                  },
                  yaxis: {
                    title: {
                      text: ' (Students)'
                    }
                  },
                  fill: {
                    opacity: 1
                  },
                  tooltip: {
                    y: {
                      formatter: function(val) {
                        return " " + val + " Students"
                      }
                    }
                  }
                }).render();
              });
            </script>
            <!-- End Column Chart -->

          </div>
        </div>
      </div>
    </div>

  </div>
</section><!-- End Story Intro Section -->


@endsection

@section('script')
  <script src="{{URL::asset('admin/vendor/apexcharts/apexcharts.min.js')}}"></script>
@endsection