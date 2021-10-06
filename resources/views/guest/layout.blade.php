<!DOCTYPE html>
<html lang="en">

<head>
    @include('guest.layout.head')
    @stack('head')
</head>

<body>
    @include('guest.layout.header')
<!-- ========================= SECTION MAIN ========================= -->
<!-- ========================= SECTION MAIN END// ========================= -->

<!-- ========================= SECTION  ========================= -->
<section class="section-name padding-y-sm">
    <div class="container">
        @yield('main')
    </div><!-- container // -->
</section>
<!-- ========================= SECTION  END// ========================= -->

<!-- ========================= FOOTER ========================= -->
    @include('guest.layout.footer')
<!-- ========================= FOOTER END // ========================= -->
    <script src="{{asset('ecommerce/js/script.js')}}" type="text/javascript"></script>
    <script src="{{asset('ecommerce/js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('ecommerce/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
    @stack('footer')
</body>
</html>


