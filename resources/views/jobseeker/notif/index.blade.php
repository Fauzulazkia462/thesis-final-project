@php
    $level = Auth::user()->level;
@endphp

@if($level=='2')
@extends('layouts.main')
@section('content')
<div class="services_section">
        <div class="container">
            <h1 class="services_text">Notification from employers</h1>
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
                <p class="lorem_ipsum_text">{{ $d->placement }}</p>
                <p class="lorem_ipsum_text">{{ $d->fullname }}</p>
              </div>
              <div class="col-sm-2">
                <button class="apply_now" style="background-color:green;">On Process</button>
              </div>
            </div>
        </div>
      </div>
    @endforeach

@endsection
@section('script')

@endsection

@endif