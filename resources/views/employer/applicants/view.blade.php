@php
    $level = Auth::user()->level;
@endphp

@if($level=='1')
@extends('layouts.main')
@section('content')
<div class="services_section">
        <div class="container">
            <h1 style="color:black;" class="services_text">Applicant Profile</h1>
            @foreach($jobtitle as $a)
                <h1 class="services_text">{{ $a->job_title }}</h1>
            @endforeach
        </div>
</div>

<div class="Recurments_section_2">
    <div class="container">
        <div class="product_section">
            <div class="row padding_top_0">
                <div class="col-sm-8">
                    <h1 class="software_text">Education</h1>
                    <ul class="lorem_ipsum_text">
                            @foreach($edu as $e)
                                <li>{{$e->edu}}</li>
                            @endforeach    
                        </ul>
    				</div>
    			</div>
    	</div>
    </div>
    <div class="Recurments_section_2">
        <div class="container">
            <div class="product_section">
                <div class="row padding_top_0">
                    <div class="col-sm-8">
                        <h1 class="software_text">Experience</h1>
    					<ul class="lorem_ipsum_text">
                            @foreach($exp as $xp)
                                <li>{{$xp->exp}}</li>
                            @endforeach
                        </ul>
    				</div>
    			</div>
    	</div>
    </div>

    <div class="Recurments_section_2">
        <div class="container">
            <div class="product_section">
                <div class="row padding_top_0">
                    <div class="col-sm-8">
                        <h1 class="software_text">Skills</h1>
    					<ul class="lorem_ipsum_text">
                            @foreach($skill as $s)
                                <li>{{$s->skill}}</li>
                            @endforeach
                        </ul>
    				</div>
    			</div>
    	</div>
    </div>

    <div class="Recurments_section_2">
        <div class="container">
            <div class="product_section">
                <div class="row padding_top_0">
                    <div class="col-sm-8">
                        @foreach($app as $p)
                            <a href="{{ 'http://127.0.0.1:8000/uploads/cv/'. $p->filename .''}}" target="_blank" class="software_text">View CV</a>
                        @endforeach
    				</div>
    			</div>
    	</div>
    </div>

    @foreach($app as $a)
        @php
            $status = $a->status;
        @endphp

        @if($status == '0')
            <form action="/employer/proceed" method="post">
                @csrf
                @foreach($personaldata as $p)
                    <input type="hidden" name="user_id" value="{{ $p->user_id }}">
                @endforeach
                @foreach($jobtitle as $j)
                    <input type="hidden" name="job_id" value="{{ $j->id }}">
                @endforeach
                <div class="col-sm-12">
                    <button class="apply_now">Proceed</button>
                </div>
            </form>
        @else
            <div class="col-sm-12">
                <h1 class="text-center">You are proceeding for the applicants</h1>
                <form action="/employer/dismiss-process" method="post">
                    @csrf
                    @foreach($personaldata as $p)
                    <input type="hidden" name="user_id" value="{{ $p->user_id }}">
                    @endforeach
                    @foreach($jobtitle as $j)
                        <input type="hidden" name="job_id" value="{{ $j->id }}">
                    @endforeach
                    <div class="col-sm-12">
                        <button class="apply_now" style="background-color:red;">Dismiss the process</button>
                    </div>
                </form>
            </div>
        @endif

    @endforeach
    
@endsection
@section('script')

@endsection
@endif