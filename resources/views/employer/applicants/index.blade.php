@php
    $level = Auth::user()->level;
@endphp

@if($level=='1')
@extends('layouts.main')
@section('content')
<!-- Recurments  section start-->
<div class="services_section">
        <div class="container">
            <h1 class="services_text">Applicants</h1>
        </div>
    </div>

    @foreach($data as $d)
      <div class="Recurments_section_2">
        <div class="container">
          <div class="product_section">
            <div class="row padding_top_0">
              <div class="col-sm-2">
                <div class="one_text"><a href="#" class="active">01</a></div>
              </div>
              <div class="col-sm-8">
                <h1 class="software_text">{{ $d->job_title }}</h1>
                <p class="lorem_ipsum_text">{{ $d->email }}</p>
              </div>
              <div class="col-sm-2">
                <form action="/employer/view-applicants" method="post">
                  @csrf
                  <input type="hidden" name="jobid" value="{{ $d->job_id }}">
                  <input type="hidden" name="userid" value="{{ $d->user_id }}">
                  <button class="apply_now">View</button>
                </form>
              </div>
            </div>
        </div>
      </div>
    @endforeach

@endsection
@section('script')

@endsection
@endif