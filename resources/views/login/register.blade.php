<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>FinPro Job Portal</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">	
<!-- bootstrap css -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<!-- Responsive-->
<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
<!-- fevicon -->
<link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif" />
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
<!-- Tweaks for older IEs-->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<!-- owl stylesheets --> 
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
<link rel="stylesoeet" href="{{ asset('css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

</head>
<body>

<div class="services_section">
    <div class="container">
      <h1 class="services_text">REGISTER PAGE</h1>
    </div>
  </div>
  <div class="login_section">
     <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign Up</h5>
            <form class="form-signin" action="/register-employer" method="get">
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign Up As Employer</button>
                <hr class="my-4">
            </form>
            <form class="form-signin" action="/register-jobseeker" method="get">
                <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit">Sign Up As JobSeeker</button>
            </form>  
        </div>
        </div>
      </div>
    </div>
  </div>
    </div>
  </div>


<!-- Javascript files-->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
<script src="{{ asset('js/plugin.js') }}"></script>
<!-- sidebar -->
<script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<!-- javascript --> 
<script src="{{ asset('js/owl.carousel.js') }}"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script>
$(document).ready(function(){
$(".fancybox").fancybox({
    openEffect: "none",
    closeEffect: "none"
    })
});
</script>

</body>
</html>