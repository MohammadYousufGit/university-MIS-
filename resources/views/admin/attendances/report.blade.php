@extends('layouts.app')
@section('pagename', 'Attendance / Attendance Report')
@section('content')
<div class="container">
  <div class="row">
    @foreach ($senf_subjects as $senf_subject)
    <div class="col-12 col-md-6 col-lg-4 mb-4">
      <a href="{{ route('attendances.show', $senf_subject->id) }}" class="card rounded-0 border-0 bg-light text-dark">
        <div class="card-body">
            <h5 class="card-title text-uppercase" style="font-family: 'Montserrat', sans-serif; font-size: 20px; font-weight: bold; color: #333333;">Class {{ $senf_subject->senf->name }}</h5>
            <p class="card-text" style="font-family: 'Roboto', sans-serif; font-size: 16px; color: #666666;"><i class='bx bx-folder'></i> {{ $senf_subject->senf->department->name }}, Year {{ $senf_subject->senf->year }}</p>
            <p class="card-text" style="font-family: 'Roboto', sans-serif; font-size: 16px; color: #666666;"><i class='bx bx-book-alt'></i> {{ $senf_subject->subject->name }}</p>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</div>
@endsection

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/remixicon/remixicon.css">
<style>
  body {
      font-family: 'Montserrat', sans-serif;
      font-size: 16px;
      color: #333333;
      background-color: #fafafa ;
    }

    .card {
    background-color: white !important ;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    transition: transform 0.2s ease-in-out;
  }

  .card:hover {
    transform: scale(1.05);
  }

  .card-title {
    font-size: 24px;
    line-height: 1.2;
  }

  .card-text {
    font-size: 16px;
    line-height: 1.5;
  }

  .ri-building-2-line,
  .ri-calendar-line,
  .ri-book-2-line {
    display: inline-block;
    width: 24px;
    height: 24px;
    margin-right: 10px;
    vertical-align: middle;
    color: #007bff;
  }

  /* Custom styles */
  .card {
    border-radius: 10px;
  }

  .card-title {
    color: #007bff;
  }

  .card-text i {
    color: #333333;
  }

  /* Media queries */
  @media (max-width: 576px) {
    .card-title {
      font-size: 20px;
    }

    .card-text {
      font-size: 14px;
    }

    .ri-building-2-line,
    .ri-calendar-line,
    .ri-book-2-line {
      width: 20px;
      height: 20px;
    }
  }
</style>
@endsection
