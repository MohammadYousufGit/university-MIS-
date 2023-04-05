@extends('layouts.public_master')
@section('style')

@endsection
@section('content')
<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>News & Events</h2>
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>News & Events</li>
          </ol>
        </div>
      </div>
    </section><!-- End Breadcrumbs -->
    <section id="event-list" class="event-list">
      <div class="container">
        <div class="section-title text-left">
          <h2 class="text-left">Events, Researches, and News</h2>
          <p>The Ashna University believe that "Knowledge can't be produced with out continous researches!".</p>        
        </div>
        <div class="row">
        @foreach($news as $row)
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
                <img src="{{URL::asset($row->picture)}}" alt="{{$row->title}}">
              </div>
              <div class="card-body">
                <h5 class="card-title">{{$row->title}}</h5>
                <p class="fst-italic text-center">{{$row->publish_date->toFormattedDayDateString()}}</p>
                <p class="card-text">{!!Str::limit($row->description,151)!!}</p>
                <a class="btn btn-primary btn-small" href="{{url('news-events/'.$row->id)}}">Read More</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
    <div class="row">
      <div class="text-center">
        <div class="text-center">
          {{$news->links('pagination::bootstrap-4')}}
        </div>
      </div>
    </div>
      </div>
    </section><!-- End Event List Section -->
@endsection