<!DOCTYPE html>
<html lang="en">
<head>
    @include('candidate.layout.head')
</head>

<body>
<!-- Header Section Start -->
    @include('candidate.layout.header')

    @yield('main')

<!-- Footer Section Start -->
    @include('candidate.layout.footer')
<!-- Footer Section End -->

<!-- Go To Top Link -->
    <a href="#" class="back-to-top">
        <i class="ti-arrow-up"></i>
    </a>

<script type="text/javascript" src="{{asset('/jobboard/assets/js/jquery-min.js')}}"></script>
<script type="text/javascript" src="{{asset('/jobboard/assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/jobboard/assets/js/material.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/jobboard/assets/js/material-kit.js')}}"></script>
<script type="text/javascript" src="{{asset('/jobboard/assets/js/jquery.parallax.js')}}"></script>
<script type="text/javascript" src="{{asset('/jobboard/assets/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/jobboard/assets/js/jquery.slicknav.js')}}"></script>
<script type="text/javascript" src="{{asset('/jobboard/assets/js/main.js')}}"></script>
<script type="text/javascript" src="{{asset('/jobboard/assets/js/jquery.counterup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/jobboard/assets/js/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/jobboard/assets/js/jasny-bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/jobboard/assets/js/bootstrap-select.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/jobboard/assets/js/form-validator.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/jobboard/assets/js/contact-form-script.js')}}"></script>
<script type="text/javascript" src="{{asset('/jobboard/assets/js/jquery.themepunch.revolution.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/jobboard/assets/js/jquery.themepunch.tools.min.js')}}"></script>

</body>
</html>
