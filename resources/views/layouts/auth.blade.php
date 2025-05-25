<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Spica Admin</title>
    <!-- base:css -->
    <link rel="stylesheet" href="auth/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="auth/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="auth/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="auth/images/favicon.png" />
</head>

<body>

    <!-- welcome devolper -->
    <!-- ======================  -->
    <!-- ------------------------------------------------------------------------------------------------------------  -->
    <!-- start project -->

    <div id="auth">
        <main class="">
            @yield('content')
        </main>
    </div>




    <!-- end project -->
    <!-- ------------------------------------------------------------------------------------------------------------- -->

    <!-- base:js -->
    <script src="auth/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="auth/js/off-canvas.js"></script>
    <script src="auth/js/hoverable-collapse.js"></script>
    <script src="auth/js/template.js"></script>
</body>

</html>









