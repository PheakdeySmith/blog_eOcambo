<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords">

    <title>Admin Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/core/core.css">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/flatpickr/flatpickr.min.css">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/demo2/style.css">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.png" />
    <!-- Include SweetAlert2 CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Include Bootstrap DateTimePicker -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
</head>

<body>
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        @include('backend.partials.sidebar')
        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            @include('backend.partials.header')
            <!-- partial -->

            <div class="page-content">
                @yield('content')
            </div>

            <!-- partial:partials/_footer.html -->
            @include('backend.partials.footer')
            <!-- partial -->

        </div>
    </div>

    <!-- core:js -->
    <script src="{{ asset('assets') }}/vendors/core/core.js"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="{{ asset('assets') }}/vendors/flatpickr/flatpickr.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/apexcharts/apexcharts.min.js"></script>
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{ asset('assets') }}/vendors/feather-icons/feather.min.js"></script>
    <script src="{{ asset('assets') }}/js/template.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script src="{{ asset('assets') }}/js/dashboard-dark.js"></script>
    <!-- End custom js for this page -->

    <!-- Yielded section for additional scripts -->
    @yield('scripts')
</body>

</html>
