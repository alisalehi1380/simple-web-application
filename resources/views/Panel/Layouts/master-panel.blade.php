<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>@yield('title' , 'پنل مدیریت')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/Assets/Website/images/yourCompanyLogo.png') }}">
    <link rel="stylesheet" href="{{ asset('Assets/Panel/Assets/style.css') }}">

    @yield('style')

</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <div id="ctn-preloader" class="ont-preloader">
        <div class="animation-preloader">
            <div class="spinner"></div>
            <div class="txt-loading">
                <span data-text-preloader="" class="letters-loading" style="color:#ff2d20;">
                    لاراول
                 </span>
            </div>
        </div>

        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="ecaps-page-wrapper">
    @include('Panel.Layouts.SideNav.Nav')
    <div class="ecaps-page-content">
        @include('Panel.Layouts.Header.header')
        <div class="main-content">
            @include('Panel.Layouts.BreadCrumb.breadcrumb')
            <div class="dashboard-area">
                <div class="container-fluid">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Must needed plugins to the run this Template -->
<script src="{{ asset('Assets/Panel/Assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('Assets/Panel/Assets/js/popper.min.js') }}"></script>
<script src="{{ asset('Assets/Panel/Assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('Assets/Panel/Assets/js/bundle.js') }}"></script>
<script src="{{ asset('Assets/Panel/Assets/js/default-assets/date-time.js') }}"></script>
<script src="{{ asset('Assets/Panel/Assets/js/default-assets/setting.js') }}"></script>
<script src="{{ asset('Assets/Panel/Assets/js/default-assets/fullscreen.js') }}"></script>
<script src="{{ asset('Assets/Panel/Assets/js/default-assets/bootstrap-growl.js') }}"></script>

<!-- Active JS -->
<script src="{{ asset('Assets/Panel/Assets/js/default-assets/active.js') }}"></script>

<!-- These plugins only need for the run this page -->
<script src="{{ asset('Assets/Panel/Assets/js/default-assets/peity.min.js') }}"></script>
<script src="{{ asset('Assets/Panel/Assets/js/default-assets/peity-demo.js') }}"></script>
<script src="{{ asset('Assets/Panel/Assets/js/default-assets/gauge.js') }}"></script>
<script src="{{ asset('Assets/Panel/Assets/js/default-assets/serial.js') }}"></script>
<script src="{{ asset('Assets/Panel/Assets/js/default-assets/light.js') }}"></script>
<script src="{{ asset('Assets/Panel/Assets/js/default-assets/ammap.min.js') }}"></script>
<script src="{{ asset('Assets/Panel/Assets/js/default-assets/worldlow.js') }}"></script>
<script src="{{ asset('Assets/Panel/Assets/js/default-assets/radar.js') }}"></script>
<script src="{{ asset('Assets/Panel/Assets/js/default-assets/dashboard-2.js') }}"></script>
@include('sweetalert::alert')

@yield('js')
</body>
</html>
