<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}"> --}}
    <!-- Theme style -->
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">


    <link rel="stylesheet" href="{{ asset('custom/style.css') }}">

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }} "></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
</head>

<body class="sidebar-mini layout-fixed control-sidebar-slide-open layout-navbar-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
        </div> --}}

        @include('_shared.p_navbar')

        @include('_shared.p_sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('contents')
        </div>
        <!-- /.content-wrapper -->

        @include('_shared.p_footer')

        <!-- Control Sidebar -->
        {{-- <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside> --}}
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    {{-- <script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script> --}}
    <!-- Sparkline -->
    {{-- <script src="{{ asset('assets/plugins/sparklines/sparkline.js') }}"></script> --}}
    <!-- JQVMap -->
    {{-- <script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script> --}}
    <!-- jQuery Knob Chart -->
    {{-- <script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script> --}}
    <!-- daterangepicker -->
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/moment/moment-with-locales.js') }}"></script>
    <script src="{{ asset('assets/plugins/moment/locale/az.js') }}"></script>
    <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {{-- <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script> --}}

    <!-- Custom js scripts -->
    <script src="{{ asset('custom/script.js') }}"></script>
    <script src="{{ asset('custom/upload.js') }}"></script>
    <script src="{{ asset('custom/forms.js') }}"></script>
    @yield('js')
    <script>
        $(function() {
            $("[data-bootstrap-switch]").bootstrapSwitch();
            $(".select2").select2();
            // $(".summernote").summernote();
            $('.summernote').summernote({
                height: 200,
                codemirror: {
                    mode: 'text/html',
                    htmlMode: true,
                    lineNumbers: true,
                    theme: 'monokai'
                },
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol']],
                ]
            });
            $('.date').datetimepicker({
                format: 'MM/DD/YYYY',
                locale: 'az'
            });

            $('.datetime').datetimepicker({
                icons: { time: 'far fa-clock' },
                format: 'DD MMMM YYYY HH:mm',
                locale: 'az',
                sideBySide: true,
            });
        });
    </script>
    @if(\Illuminate\Support\Facades\Session::has('success'))
        <script>
            toastr.success("{!! \Illuminate\Support\Facades\Session::get('success') !!}")
        </script>
    @endif
    @if(\Illuminate\Support\Facades\Session::has('error'))
        <script>
            toastr.error("{!! \Illuminate\Support\Facades\Session::get('error') !!}")
        </script>
    @endif
    @if(\Illuminate\Support\Facades\Session::has('info'))
        <script>
            toastr.info("{!! \Illuminate\Support\Facades\Session::get('info') !!}")
        </script>
    @endif
    @if(\Illuminate\Support\Facades\Session::has('warning'))
        <script>
            toastr.warning("{!! \Illuminate\Support\Facades\Session::get('warning') !!}")
        </script>
    @endif
</body>

</html>
