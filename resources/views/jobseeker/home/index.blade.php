@php
    $level = Auth::user()->level;
@endphp

@if($level=='2')
@extends('layouts.main')
@section('content')
<!-- header section start-->
	<!-- banner section start-->
	<div class="banner_section layout_padding">
		<div class="container">
			<h1 class="best_taital">Welcome to this FinPro Job Portal</h1>
			<!-- <div class="box_main">
			    <input type="" class="email_bt" placeholder="Search Job Fast" name="">
				<button class="subscribe_bt"><a href="#">Search</a></button>
		    </div> -->
		    <p class="there_text"></p>
		    <div class="bt_main">
		    	<div class="discover_bt"><a href="/jobseeker/search-jobs">Find More Jobs</a></div>
		    </div>
		</div>
	</div>

	@if($jobsData)
		<!-- banner section end-->
		<h1 class="best_taital" style="color:#2ca6d1;">Jobs related to your skills, experience, and education</h1>
		<form action="/jobseeker/home" method="get">
			@csrf
			<div class="col-md-6">
				<div class="main">
					<h1 class="what_text" style="color:black;">Filter</h1>
					<select type="text" name="filter" class="form-control">
						<option value="" selected hidden>--</option>
						<option value="49">50% or less</option>
						<option value="50">50% or above</option>
						<option value="60">60% or above</option>
						<option value="70">70% or above</option>
						<option value="80">80% or above</option>
						<option value="90">90% or above</option>
						<option value="100">100% matched</option>
					</select>
				</div>
				<div class="col-md-6">
					<button class="apply_now">Go</button>
				</div>
			</div>
		</form>
	@endif
	
	@php
		$i=0;
	@endphp
	@foreach($jobsData as $jr)
		@php
			$i++;
		@endphp
		<div class="Recurments_section_2">
			<div class="container">
				<div class="product_section">
					<div class="row padding_top_0">
						<div class="col-sm-2">
							<div class="one_text"><a href="" >{{ $i }}</a></div>
						</div>
						<div class="col-sm-8">
							<h1 class="software_text">{{$jr->job_title}}</h1>
							<p class="lorem_ipsum_text">{{$jr->placement}}</p>
							<p class="lorem_ipsum_text">Match Score : {{$jr->score}}%</p>
						</div>
						<div class="col-sm-2">
							<form action="/jobseeker/detail" method="post">
								@csrf
								<input type="hidden" name = "id" value="{{ $jr->id }}">
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