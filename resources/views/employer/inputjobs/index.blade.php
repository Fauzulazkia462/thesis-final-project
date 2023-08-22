@php
    $level = Auth::user()->level;
@endphp

@if($level=='1')
@extends('layouts.main')
@section('content')
    <div class="search_section layout_padding">
        <div class="container">
            <form action="/employer/input-jobs" method="post">
                @csrf
                <div class="row box">
                    <div class="col-md-6">
                        <div class="main"> 
                            <h1 class="what_text">Job Title</h1>
                            <input type="text" class="form-control" name="job_title" placeholder="PHP Developer (Laravel)">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="main">
                            <h1 class="what_text">Placement</h1>
                            <input type="text" class="form-control" name="placement" placeholder="Aceh">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="main">
                            <h1 class="what_text">Salary starts from</h1>
                            <input type="text" class="form-control" name="salary" placeholder="8000000">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="main">
                            <h1 class="what_text">Job Description</h1>
                            <input type="text" name="job_desc[]" class="form-control" placeholder="To develop website for the company">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="main">
                            <h1 class="what_text">Requirements/Qualifications</h1>
                            <input type="text" name="job_req[]" class="form-control" placeholder="Bachelor Degree">
                        </div>
                    </div>

                    <div class="fields"></div>

                    <div class="col-md-6">
                        <div class="main">
                            <a class="find_bt addfindings">+</a>
                        </div>
                    </div>

                    <!-- <div class="added row box">
                        <div class="col-md-6">
                            <div class="main">
                                <h1 class="what_text">Job Description</h1>
                                <input type="text" name="job_desc[]" class="form-control" placeholder="To develop website for the company">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="main">
                                <h1 class="what_text">Requirements/Qualifications</h1>
                                <input type="text" name="job_req[]" class="form-control" placeholder="Bachelor Degree">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="main">
                                <button class="find_bt remove">x</button>
                            </div>
                        </div>    
                    </div> -->


                </div>
                <div class="">
                    <button class="find_bt">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript">
    $('.addfindings').on('click', function(){
        addFinding();
    });

    function addFinding() {
        var field = '<div class="added row box"><div class="col-md-6"><div class="main"><h1 class="what_text">Job Description</h1><input type="text" name="job_desc[]" class="form-control" placeholder="To develop website for the company"></div></div><div class="col-md-6"><div class="main"><h1 class="what_text">Requirements/Qualifications</h1><input type="text" name="job_req[]" class="form-control" placeholder="Bachelor Degree"></div></div><div class="col-md-6"><div class="main"><a class="find_bt remove">x</a></div></div></div>';
        $('.fields').append(field);
    };

    $('.remove').live('click', function(){
        $(this).parent().parent().parent().remove();
    })
</script>
@endsection

@endif