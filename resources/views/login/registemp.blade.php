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
      <h1 class="services_text">REGISTER AS EMPLOYER</h1>
    </div>
  </div>
  <div class="login_section">
    <div class="container">
        <form class="form-signin" action="/register-create-employer" method="post">
            @csrf
            <div class="row box">
            <h5 class="text-center"></h5>
                <div class="col-md-6">
                    <div class="main">
                        <h1 class="what_text">Name of Company/Agency</h1>
                        <input type="text" class="form-control" name="fullname" placeholder="PT. XYZ">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="main">
                        <h1 class="what_text">Contact</h1>
                        <input type="text" class="form-control" name="phone" placeholder="+62 85270473206">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="main">
                        <h1 class="what_text">Username</h1>
                        <input type="text" class="form-control" name="username" placeholder="xyz123">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="main">
                        <h1 class="what_text">Password</h1>
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>

                <input type="hidden" name="level" value="1">

                <hr class="my-4">
                <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit">Sign Up</button>
            </div>
        </form>
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