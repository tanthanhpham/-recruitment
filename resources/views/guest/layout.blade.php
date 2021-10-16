<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('guest.layout.head')
    @stack('head')
</head>

<body>

    @include('guest.layout.header')

    @yield('main');
    
    @include('guest.layout.footer')

    <!-- Js Plugins -->
    <script src="{{asset('shop/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('shop/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('shop/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('shop/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('shop/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('shop/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('shop/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('shop/js/mixitup.min.js')}}"></script>
    <script src="{{asset('shop/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('shop/js/main.js')}}"></script>
    @stack('footer')
</body>

</html>