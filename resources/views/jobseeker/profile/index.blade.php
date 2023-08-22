@php
    $level = Auth::user()->level;
@endphp

@if($level=='2')
@extends('layouts.main')
@section('content')

<div class="services_section">
        <div class="container">
            <h1 class="services_text">Your Profile</h1>
        </div>
</div>

<div class="Recurments_section_2">
    <div class="container">
        <div class="product_section">
            <div class="row padding_top_0">
                <div class="col-sm-8">
                    <h1 class="software_text">Your Education</h1>
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
                        <h1 class="software_text">Your Experience</h1>
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
                        <h1 class="software_text">Your Skill</h1>
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
                        @foreach($person as $p)
                            <a href="{{ 'http://127.0.0.1:8000/uploads/profile_photo/'. $p->filename .''}}" target="_blank" class="software_text">View Your Photo</a>
                        @endforeach
    				</div>
    			</div>
    	</div>
    </div>

<div class="search_section layout_padding">
        <div class="container">
            <form action="/jobseeker/insert-profile" method="post" enctype="multipart/form-data">
                @csrf

                <div class="col-md-6">
                    <div class="main">
                        <h1 class="what_text">Upload Foto</h1>
                        <input type="file" name="file" accept=".jpg" class="form-control">
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="main">
                        <h1 class="what_text">Education</h1>
                        <input type="text" name="edu[]" class="form-control" placeholder="SMK/SMA, S1/Bachelor">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="main">
                        <h1 class="what_text">Experience</h1>
                        <input type="text" name="exp[]" class="form-control" placeholder="1 Year as Full Stack">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="main">
                        <h1 class="what_text">Skill</h1>
                        <input type="text" name="skill[]" class="form-control" placeholder="Can use PHP">
                    </div>
                </div>

                <div class="fields"></div>

                <div class="col-md-6">
                    <div class="main">
                        <a class="find_bt addfindings">+</a>
                    </div>
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
        var field = '<div class="added row box"><div class="col-md-6"><div class="main"><h1 class="what_text">Education</h1><input type="text" name="edu[]" class="form-control" placeholder="SMK/SMA, S1/Bachelor"></div></div><div class="col-md-6"><div class="main"><h1 class="what_text">Experience</h1><input type="text" name="exp[]" class="form-control" placeholder="1 Year as Full Stack"></div></div><div class="col-md-6"><div class="main"><h1 class="what_text">Skill</h1><input type="text" name="skill[]" class="form-control" placeholder="Can use PHP"></div></div><div class="col-md-6"><div class="main"><button class="find_bt remove">x</button></div></div></div>';
        
        $('.fields').append(field);
    };

    $('.remove').live('click', function(){
        $(this).parent().parent().parent().remove();
    })
</script>
@endsection

@endif