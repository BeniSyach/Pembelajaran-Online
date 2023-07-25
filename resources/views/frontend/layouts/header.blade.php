

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="E - MesraMedia  dibuat ditujukan agar para siswa dan guru dapat terus belajar dan mengajar dimana saja dan kapan saja." name="Description" />
    <meta content="E - MesraMedia , E-learning, Open Source, github, programmer indonesia" name="keywords" />
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/png">
    <title>E - MesraMedia  - Belajar Dimana Saja & Kapan Saja !</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/lightbox/simpleLightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/nice-select/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate-css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/popup/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.4/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(() => {
            $("#nav{{ Request::segment(2); }}").addClass('active')
        })
    </script>

