<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- Mirrored from educhamp.themetrades.com/demo/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:08:15 GMT -->


<head>

    <!-- META ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />

    <!-- DESCRIPTION -->
    <meta name="description" content="EduChamp : Education HTML Template" />

    <!-- OG -->
    <meta property="og:title" content="EduChamp : Education HTML Template" />
    <meta property="og:description" content="EduChamp : Education HTML Template" />
    <meta property="og:image" content="" />
    <meta name="format-detection" content="telephone=no">

    <!-- FAVICONS ICON ============================================= -->
    <link rel="icon" href="../error-404.html" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="Screenshot_13-8-2024_171225_127.0.0.1.jpeg" />

    <!-- PAGE TITLE HERE ============================================= -->
    <title>online shop </title>

    <!-- MOBILE SPECIFIC ============================================= -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--[if lt IE 9]>
 <script src="admin/assets/js/html5shiv.min.js"></script>
 <script src="admin/assets/js/respond.min.js"></script>
 <![endif]-->


    <!-- All PLUGINS CSS ============================================= -->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/assets.css">
    <link rel="stylesheet" type="text/css" href="admin/assets/vendors/calendar/fullcalendar.css">
    <link rel="stylesheet" type="text/css" href="admin/assets/vendors/summernote/summernote.css">
    <link rel="stylesheet" type="text/css" href="admin/assets/vendors/file-upload/imageuploadify.min.css">

    <!-- TYPOGRAPHY ============================================= -->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/typography.css">

    <!-- SHORTCODES ============================================= -->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/shortcodes/shortcodes.css">

    <!-- STYLESHEETS ============================================= -->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="admin/assets/css/dashboard.css">
    <link class="skin" rel="stylesheet" type="text/css" href="admin/assets/css/color/color-1.css">
<script>
    function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'en',  // لغة الموقع الأصلية
        includedLanguages: 'ar,en,fr,es',  // اللغات المتاحة
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE  // تخطيط الأداة
    }, 'google_translate_element');
}
</script>
</head>


<body class="ttr-opened-sidebar ttr-pinned-sidebar" style="background-color: #f5f7fb;">

    <!-- welcome devolper -->
    <!-- ======================  -->
    <!-- ------------------------------------------------------------------------------------------------------------  -->
    <!-- start project -->

    <div id="appdashboard">
        <main class="">
            @yield('content')
        </main>
    </div>

    <!-- end project -->
    <!-- ------------------------------------------------------------------------------------------------------------- -->
    <!-- External JavaScripts -->
    <script src="admin/assets/js/jquery.min.js"></script>
    <script src="admin/assets/vendors/bootstrap/js/popper.min.js"></script>
    <script src="admin/assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="admin/assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="admin/assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
    <script src="admin/assets/vendors/magnific-popup/magnific-popup.js"></script>
    <script src="admin/assets/vendors/counter/waypoints-min.js"></script>
    <script src="admin/assets/vendors/counter/counterup.min.js"></script>
    <script src="admin/assets/vendors/imagesloaded/imagesloaded.js"></script>
    <script src="admin/assets/vendors/masonry/masonry.js"></script>
    <script src="admin/assets/vendors/masonry/filter.js"></script>
    <script src="admin/assets/vendors/owl-carousel/owl.carousel.js"></script>
    <script src='admin/assets/vendors/scroll/scrollbar.min.js'></script>
    <script src="admin/assets/js/functions.js"></script>
    <script src="admin/assets/vendors/chart/chart.min.js"></script>
    <script src="admin/assets/js/admin.js"></script>
    <script src="admin/assets/vendors/summernote/summernote.js"></script>
    <script src="admin/assets/vendors/file-upload/imageuploadify.min.js"></script>
    <script src='admin/assets/vendors/switcher/switcher.js'></script>
    <!-- include plugin -->
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300,
                tabsize: 2
            });

            $('input[type="file"]').imageuploadify();
        });
    </script>

    <script>
        // Pricing add
        function newMenuItem() {
            var newElem = $('tr.list-item').first().clone();
            newElem.find('input').val('');
            newElem.appendTo('table#item-add');
        }
        if ($("table#item-add").is('*')) {
            $('.add-item').on('click', function(e) {
                e.preventDefault();
                newMenuItem();
            });
            $(document).on("click", "#item-add .delete", function(e) {
                e.preventDefault();
                $(this).parent().parent().parent().parent().remove();
            });
        }
    </script>
    <script>
        let colorCounter = 1; // عداد لتتبع عدد العناصر
        document.getElementById('add-color-button').addEventListener('click', function() {
            colorCounter++;
            var container = document.getElementById('item-addd');
            var originalSelectRow = document.querySelector('.list-itemd');
            var newSelectRow = originalSelectRow.cloneNode(true);
            var newSelect = newSelectRow.querySelector('input');
            newSelect.id = 'color' + colorCounter; // إضافة معرف فريد
            newSelect.selectedIndex = -1; // إعادة تعيين القائمة المنسدلة للقيمة الافتراضية
            container.appendChild(newSelectRow);
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#image').change(function() {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                    $('#preview').show();
                }
                reader.readAsDataURL(this.files[0]);
            });
        });

        function previewFile() {
            var fileInput = document.getElementById('updateImage');
            var preview = document.getElementById('image_preview');

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                }

                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>

</body>

</html>
