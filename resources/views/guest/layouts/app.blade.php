<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge" /><![endif]-->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1"><!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="icon" href="favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet">
    <title>DashCore - Premium Software & Startup HTML</title><!-- themeforest:css -->
    <link rel="stylesheet" href="{{ asset('front-end/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/cookieconsent.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/odometer-theme-minimal.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/prism-okaidia.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/smart_wizard_all.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/dashcore.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/demo.css') }}">
    @yield('page-styles')
    <!-- endinject -->
</head>

<body>


    {{-- navbar --}}
    {{-- <h1>start</h1> --}}
    @include('guest.layouts.navbar')

    {{-- content --}}

    <main class="overflow-hidden">

        @yield('content')

        {{-- footer --}}
        @include('guest.layouts.footer')
    </main>


    <script src="{{ asset('front-end/js/jquery.js') }}"></script>
    <script src="{{ asset('front-end/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('front-end/js/card.js') }}"></script>
    <script src="{{ asset('front-end/js/counterup2.js') }}"></script>
    <script src="{{ asset('front-end/js/noise.js') }}"></script>
    <script src="{{ asset('front-end/js/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('front-end/js/odometer.js') }}"></script>
    <script src="{{ asset('front-end/js/prism.js') }}"></script>
    <script src="{{ asset('front-end/js/simplebar.js') }}"></script>
    <script src="{{ asset('front-end/js/swiper-bundle.js') }}"></script>
    <script src="{{ asset('front-end/js/jquery.easing.js') }}"></script>
    <script src="{{ asset('front-end/js/jquery.validate.js') }}"></script>
    <script src="{{ asset('front-end/js/jquery.smartWizard.js') }}"></script>
    <script src="{{ asset('front-end/js/feather.js') }}"></script>
    <script src="{{ asset('front-end/js/aos.js') }}"></script>
    <script src="{{ asset('front-end/js/typed.js') }}"></script>
    <script src="{{ asset('front-end/js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('front-end/js/cookieconsent.js') }}"></script>
    <script src="{{ asset('front-end/js/jquery.animatebar.js') }}"></script>
    <script src="{{ asset('front-end/js/common.js') }}"></script>
    <script src="{{ asset('front-end/js/form.js') }}"></script>
    <script src="{{ asset('front-end/js/stripe-bubbles.js') }}"></script>
    <script src="{{ asset('front-end/js/stripe-menu.js') }}"></script>
    <script src="{{ asset('front-end/js/credit-card.js') }}"></script>
    <script src="{{ asset('front-end/js/pricing.js') }}"></script>
    <script src="{{ asset('front-end/js/shop.js') }}"></script>
    <script src="{{ asset('front-end/js/svg.js') }}"></script>
    <script src="{{ asset('front-end/js/site.js') }}"></script>
    <script src="{{ asset('front-end/js/wizards.js') }}"></script>
    <script src="{{ asset('front-end/js/cookie-consent-util.js') }}"></script>
    <script src="{{ asset('front-end/js/cookie-consent-themes.js') }}"></script>
    <script src="{{ asset('front-end/js/cookie-consent-custom-css.js') }}"></script>
    <script src="{{ asset('front-end/js/cookie-consent-informational.js') }}"></script>
    <script src="{{ asset('front-end/js/cookie-consent-opt-out.js') }}"></script>
    <script src="{{ asset('front-end/js/cookie-consent-opt-in.js') }}"></script>
    <script src="{{ asset('front-end/js/cookie-consent-location.js') }}"></script>
    <script src="{{ asset('front-end/js/demo.js') }}"></script>
    <!-- endinject -->
</body>

</html>
