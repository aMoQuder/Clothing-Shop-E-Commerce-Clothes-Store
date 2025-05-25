<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>online shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <!-- Favicon -->
    <link href="Screenshot_13-8-2024_171225_127.0.0.1.jpeg" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- font ossam css  -->
    <!-- Font Awesome -->
    <link href="lib/all.min.css" rel="stylesheet">
    <link href="lib/css2.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .goog-te-gadget-simple {
            background-color: #FFF;
            font-size: 13pt;
            display: inline-block;
            padding-top: 2px;
            padding-bottom: 2px;
            cursor: pointer;
        }



        #google_translate_element {
            position: fixed;
            margin-top: 150px;
            z-index:99999999999999999999999999;
        }
    </style>
</head>


<body>

    <!-- welcome devolper -->
    <!-- ======================  -->
    <!-- ------------------------------------------------------------------------------------------------------------  -->
    <!-- start project -->

        <div id="app">
            @include('temp.navbarApp')

            <main class="">
                @yield('content')
            </main>
        </div>

    <!-- end project -->
    <!-- ------------------------------------------------------------------------------------------------------------- -->


<!-- مكان ظهور أداة الترجمة -->

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',  // لغة الموقع الأصلية
            includedLanguages: 'ar,en,fr,es',  // اللغات المتاحة
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE  // تخطيط الأداة
        }, 'google_translate_element');
    }
</script>

<!-- تحميل أداة ترجمة جوجل -->
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <!-- JavaScript Libraries -->
    <script src="lib/jquery-3.4.1.min.js"></script>
    <script src="lib/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <!-- font ossam js -->
    <script src="js/all.min.js "></script>
    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="translate/element.js"></script>

</body>

</html>
