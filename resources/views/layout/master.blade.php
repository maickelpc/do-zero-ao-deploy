<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Travelo</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="/travelo/css/bootstrap.min.css">
    <link rel="stylesheet" href="/travelo/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/travelo/css/magnific-popup.css">
    <link rel="stylesheet" href="/travelo/css/font-awesome.min.css">
    <link rel="stylesheet" href="/travelo/css/themify-icons.css">
    <link rel="stylesheet" href="/travelo/css/nice-select.css">
    <link rel="stylesheet" href="/travelo/css/flaticon.css">
    <link rel="stylesheet" href="/travelo/css/gijgo.css">
    <link rel="stylesheet" href="/travelo/css/animate.css">
    <link rel="stylesheet" href="/travelo/css/slick.css">
    <link rel="stylesheet" href="/travelo/css/slicknav.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">

    <link rel="stylesheet" href="/travelo/css/style.css">
    <!-- <link rel="stylesheet" href="/travelo/css/responsive.css"> -->
</head>

<body>
    <div id="app">

        @include('layout.header')
        @yield('content')
        @include('layout.footer')


        <!-- Modal -->
        <div class="modal fade custom_search_pop" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="serch_form">
                        <input type="text" placeholder="Search">
                        <button type="submit">search</button>
                    </div>
                </div>
            </div>
        </div>


        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->


        <!-- link that opens popup -->
        <!--     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script> -->
        <!-- JS here -->
        <script src="/travelo/js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="/travelo/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="/travelo/js/popper.min.js"></script>
        <script src="/travelo/js/bootstrap.min.js"></script>
        <script src="/travelo/js/owl.carousel.min.js"></script>
        <script src="/travelo/js/isotope.pkgd.min.js"></script>
        <script src="/travelo/js/ajax-form.js"></script>
        <script src="/travelo/js/waypoints.min.js"></script>
        <script src="/travelo/js/jquery.counterup.min.js"></script>
        <script src="/travelo/js/imagesloaded.pkgd.min.js"></script>
        <script src="/travelo/js/scrollIt.js"></script>
        <script src="/travelo/js/jquery.scrollUp.min.js"></script>
        <script src="/travelo/js/wow.min.js"></script>
        <script src="/travelo/js/nice-select.min.js"></script>
        <script src="/travelo/js/jquery.slicknav.min.js"></script>
        <script src="/travelo/js/jquery.magnific-popup.min.js"></script>
        <script src="/travelo/js/plugins.js"></script>
        <script src="/travelo/js/gijgo.min.js"></script>
        <script src="/travelo/js/slick.min.js"></script>



        <!--contact js-->
        {{-- <script src="/travelo/js/contact.js"></script>
        --}}
        <script src="/travelo/js/jquery.ajaxchimp.min.js"></script>
        <script src="/travelo/js/jquery.form.js"></script>
        <script src="/travelo/js/jquery.validate.min.js"></script>
        <script src="/travelo/js/mail-script.js"></script>


        <script src="/travelo/js/main.js"></script>
        <script>
            $('#datepicker').datepicker({
                iconsLibrary: 'fontawesome',
                icons: {
                    rightIcon: '<span class="fa fa-caret-down"></span>'
                }
            });

        </script>

        {{-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        --}}

        <script src="/js/app.js"></script>
        @yield('scripts')


    </div>


</body>

</html>
