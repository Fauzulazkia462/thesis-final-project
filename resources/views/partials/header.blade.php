@php
    $level = Auth::user()->level;
@endphp

@if($level=='1')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="logo" href="/employer/home"><img src="{{ asset('images/logo-finpro.png') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                   <a class="nav-link" href="/employer/home">HOME</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="/employer/input-jobs">INPUT JOBS</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="/employer/applicants">APPLICANTS</a>
                </li>
                <!-- <li class="nav-item">
                   <a class="nav-link" href="/employer/your-vacancies">YOUR VACANCIES</a>
                </li> -->
                <li class="nav-item">
                   <a class="nav-link" href="">PROFILE</a>
                </li>
                
            </ul>
        </div>
        <form id="logout" action="/logout" method="post">
         @csrf
            <div class="login_text"><a href="javascript:;" onclick="document.getElementById('logout').submit();">LOGOUT</a></div>
        </form>
</nav>
@endif

@if($level=='2')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="logo" href="/jobseeker/home"><img src="{{ asset('images/logo-finpro.png') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                   <a class="nav-link" href="/jobseeker/home">HOME</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="/jobseeker/search-jobs">FIND JOBS</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="/jobseeker/notif">NOTIF</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="/jobseeker/profile">PROFILE</a>
                </li>
                
            </ul>
        </div>
        <form id="logout" action="/logout" method="post">
         @csrf
            <div class="login_text"><a href="javascript:;" onclick="document.getElementById('logout').submit();">LOGOUT</a></div>
        </form>
</nav>
@endif

@if($level == '3')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="logo" href=""><img src="{{ asset('images/logo-finpro.png') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                   <a class="nav-link" href="">HOME</a>
                </li>
            </ul>
        </div>
        <form id="logout" action="/logout" method="post">
         @csrf
            <div class="login_text"><a href="javascript:;" onclick="document.getElementById('logout').submit();">LOGOUT</a></div>
        </form>
</nav>
@endif