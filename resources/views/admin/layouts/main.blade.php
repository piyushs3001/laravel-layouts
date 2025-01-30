<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'AdminLTE')</title>
    <link rel="shortcut icon" href="{{ asset('admin_asset/dist/img/AdminLTELogo.png') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('admin_asset/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('admin_asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_asset/plugins/jqvmap/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_asset/dist/css/adminlte.min.css?v=3.2.0') }}">
    <link rel="stylesheet" href="{{ asset('admin_asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_asset/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_asset/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />

</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('admin_asset/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
        </div>

        @include('admin.layouts.header')
        @include('admin.layouts.sidebar')

        <div class="content-wrapper">
            
            {{-- Breadcrumb --}}
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-left">
                                @include('admin.components.breadcrumb')
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            @yield('section')
            
        </div>

        @include('admin.layouts.footer')
    </div>

    <script src="{{ asset('admin_asset/plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('admin_asset/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <script src="{{ asset('admin_asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/sparklines/sparkline.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('admin_asset/dist/js/adminlte.js?v=3.2.0') }}"></script>
    <script src="{{ asset('admin_asset/dist/js/demo.js') }}"></script>
    <script src="{{ asset('admin_asset/dist/js/pages/dashboard.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script type="text/javascript">

        @if (Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif

        @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @endif

        var currentUrl = window.location.href;
        var navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(function(link) {

            var linkUrl = link.href.replace(/\/$/, '');
            if (currentUrl === linkUrl) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
    </script>

    @yield('customeScript')

</body>
</html>