<!doctype html>
<html lang="en">

<head>
    @include('frontend.layouts.header')
</head>
@include('frontend.layouts.navbar')

@yield('content_utama')


@include('frontend.layouts.footer')
<script src="{{ asset('assets/js/stellar.js')}}"></script>
<script src="{{ asset('assets/vendors/lightbox/simpleLightbox.min.js')}}"></script>
<script src="{{ asset('assets/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
<script src="{{ asset('assets/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{ asset('assets/vendors/isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{ asset('assets/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{ asset('assets/vendors/popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{ asset('assets/vendors/counter-up/jquery.waypoints.min.js')}}"></script>
<script src="{{ asset('assets/vendors/counter-up/jquery.counterup.js')}}"></script>
<script src="{{ asset('assets/js/mail-script.js')}}"></script>
<script src="{{ asset('assets/js/theme.js')}}"></script>
<script>
    var animateButton = function(e) {
        e.preventDefault;
        e.target.classList.remove('animate');
        e.target.classList.add('animate');
        setTimeout(function() {
            e.target.classList.remove('animate');
        }, 700);
    };

    var bubblyButtons = document.getElementsByClassName("bubbly-button");

    for (var i = 0; i < bubblyButtons.length; i++) {
        bubblyButtons[i].addEventListener('click', animateButton, false);
    }
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</body>

</html>