@php
    $level = Auth::user()->level;
@endphp

@if($level=='1')
@extends('layouts.main')
@section('content')
<!-- Recurments  section start-->
<div class="services_section">
        <div class="container">
            <h1 class="services_text">Your Vacancies</h1>
        </div>
</div>

@php
    $i=0;
@endphp
@foreach($data as $d)
    @php
        $i++;
    @endphp
    <div class="Recurments_section_2">
    	<div class="container">
    		<div class="product_section">
    			<div class="row padding_top_0">
    				<div class="col-sm-2">
    					<div class="one_text"><a href="#" class="active">{{ $i }}</a></div>
    				</div>
    				<div class="col-sm-8">
    					<h1 class="software_text">{{ $d->job_title }}</h1>
    					<p class="lorem_ipsum_text">{{ $d->placement }}</p>
    				</div>
    				<div class="col-sm-2">
    					<button class="apply_now">Edit</button>
    				</div>
    			</div>
    	</div>
    </div>
@endforeach

@endsection
@section('script')

@endsection
@endif