<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport" />
    <title>@yield('title')</title>

    @stack('before-style')
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/modules/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/modules/fontawesome/css/all.min.css') }}" />

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('admin/modules/jqvmap/dist/jqvmap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/modules/summernote/summernote-bs4.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/components.css') }}" />

    @stack('after-style')

    {{-- Favicon --}}
    <link href="{{ asset('admin/img/logopcn.png') }}" rel="icon">
    <!-- Start GA -->
    <script async src="{{ url('https://www.googletagmanager.com/gtag/js?id=UA-94034622-3') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "UA-94034622-3");
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            @include('dashboard.partials.header')

            @include('dashboard.partials.sidebar')

            <!-- Main Content -->
            @yield('container')

            @include('dashboard.partials.footer')

        </div>
    </div>

    @stack('before-script')

    <!-- General JS Scripts -->
    <script src="{{ asset('admin/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/modules/popper.js') }}"></script>
    <script src="{{ asset('admin/modules/tooltip.js') }}"></script>
    <script src="{{ asset('admin/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('admin/modules/moment.min.js') }}"></script>
    <script src="{{ asset('admin/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('admin/modules/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('admin/modules/chart.min.js') }}"></script>
    <script src="{{ asset('admin/modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('admin/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('admin/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('admin/js/page/index.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('admin/js/scripts.js') }}"></script>
    <script src="{{ asset('admin/js/custom.js') }}"></script>

    @stack('after-script')
</body>

</html>
