@php
    $level = Auth::user()->level;
@endphp

@if($level=='2')
@extends('layouts.main')
@section('content')
<div class="marketing_section layout_padding">
    <div class="container-fluid">
        <form action="/jobseeker/submit" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <input type="hidden" name="job_id" value="{{$id}}">
                <div class="col-md-6">
                    <h1 class="">Email</h1>
                    <input type="text" class="form-control" name="email" placeholder="">
                </div>
                <div class="col-md-6">
                    <h1 class="">CV</h1>
                    <input type="file" class="form-control" name="file" accept=".pdf" placeholder="">
                </div>
                <div class="col-md-6">
                    <button>Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@section('script')

@endsection

@endif  