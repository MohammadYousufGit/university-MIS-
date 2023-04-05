@extends('layouts.public_master')
@section('style')

@endsection
@section('content')
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2></h2>
            <ol>
                <li><a href="{{url('/')}}">Home</a></li>
                <li>{{$news->title}}</li>
            </ol>
        </div>
    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Story Intro Section ======= -->
<section id="story-intro" class="story-intro">
    <div class="container">
        <div class="section-title">
            <h2>{{$news->title}}</h2>
        </div>
        <div class="row">
            <div class="col-lg-8">

                <img src="{{URL::asset($news->picture)}}" class="img-fluid" alt="">
                <div class=>
                    {!!$news->description!!}
                </div>
                
                <br>
                <p><strong>More Medias:</strong></p>
                <section id="gallery" class="gallery">
                    <div class="container">
                        <div class="row gallery-container">
                            @foreach($news->media as $row)
                            <div class="col-lg-4 col-md-6 gallery-item filter-home">
                                <div class="gallery-wrap">
                                    <img src="{{URL::asset($row->picture)}}" class="img-fluid" alt="">
                                    <div class="gallery-info">
                                        <h4>{{$news->title}}</h4>
                                        <p>Home</p>
                                        <div class="gallery-links">
                                            <a href="{{URL::asset($row->picture)}}" class="glightbox" title="Home 1"><i class="bx bx-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </section><!-- End Gallery Section -->
            </div>
            <div class="col-lg-4 text-center">
                <section id="event-list" class="event-list">
                    <div class="container">
                        <div class="section-title text-left">
                            <h5 class="text-left">You may also read</h5>
                        </div>
                        <div class="row">
                            @foreach($also as $row)
                            <div class="col-md-12 d-flex align-items-stretch">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="{{URL::asset($row->picture)}}" alt="...">
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
            </div>
        </div>

    </div>
</section><!-- End Story Intro Section -->



@endsection