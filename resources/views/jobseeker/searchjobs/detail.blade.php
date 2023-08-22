@php
    $level = Auth::user()->level;
@endphp

@if($level=='2')
@extends('layouts.main')
@section('content')



    <div class="services_section">
        <div class="container">
            @foreach($jobData as $j)
                <h1 class="services_text">{{ $j->job_title }}</h1>
                <h1 class="services_text">{{ $j->fullname }}</h1>
            @endforeach
        </div>
    </div>

    <div class="marketing_section layout_padding">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="job_section_2">
					    <h1 class="jobs_text">Requirements</h1>
					    <ul class="dummy_text">
                            @foreach($req as $r)
                                <li>{{ $r->req }}</li>
                            @endforeach
                        </ul>
					</div>
				</div>

                <div class="col-md-6">
					<div class="job_section_2">
					    <h1 class="jobs_text">Description</h1>
					    <ul class="dummy_text">
                            @foreach($desc as $d)
                                <li>{{ $d->description }}</li>
                            @endforeach
                        </ul>
					</div>
				</div>

                
                <form action="/jobseeker/form-application" id="form" method="post">
                    @csrf
                    <input type="hidden" name = "id" value="{{ $r->job_id }}">
                    <div class="apply_bt" style="margin-left:20%; width:100px;">
                        <a href="javascript:;" onclick="document.getElementById('form').submit();">Apply now</a>
                    </div>
                </form>
                
			</div>
		</div>
	</div>

@endsection
@section('script')

@endsection

@endif