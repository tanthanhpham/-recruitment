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
    @stack('footer')
</body>
</html>


