@php
    $level = Auth::user()->level;
@endphp

@if($level=='2')
@extends('layouts.main')
@section('content')

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
                            <div class="one_text"><a href="">{{ $i }}</a></div>
                        </div>
                        <div class="col-sm-8">
                            <h1 class="software_text">{{$d->job_title}}</h1>
                            <p class="lorem_ipsum_text">{{$d->placement}}</p>
                        </div>
                        <div class="col-sm-2">
							<form action="/jobseeker/detail" method="post">
								@csrf
								<input type="hidden" name = "id" value="{{ $d->id }}">
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