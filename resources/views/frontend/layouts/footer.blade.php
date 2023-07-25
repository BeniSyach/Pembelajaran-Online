<!--================ Start footer Area  =================-->
<footer class="footer-area p_60">
    <div class="container">
        <div class="row">
            <div class="col-lg-2  col-md-6 col-sm-6">
                <div class="single-footer-widget tp_widgets">
                    <h6 class="footer_title">Tentang Kami</h6>
                    <ul class="list">
                        <li><a href="{{ url('welcome/tentang') }}">Tentang</a></li>
                        <li><a href="{{ url('welcome/materi') }}">Materi</a></li>
                        <li><a href="{{ url('welcome/kontak') }}">Kontak</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2  col-md-6 col-sm-6">
                <div class="single-footer-widget tp_widgets">
                    <h6 class="footer_title">Masuk - Sign in</h6>
                    <ul class="list">
                        <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter">Untuk Siswa</a></li>
                        <li><a href="{{ url('welcome/guru') }}">Untuk Guru</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2  col-md-6 col-sm-6">
                <div class="single-footer-widget tp_widgets">
                    <h6 class="footer_title">Pelajaran - Materi</h6>
                    <ul class="list">
                        <li><a href="javaScript:void(0);">IPA</a></li>
                        <li><a href="javaScript:void(0);">Matematika</a></li>
                        <li><a href="javaScript:void(0);">Bahasa Inggris</a></li>
                        <li><a href="javaScript:void(0);">Bahasa Indonesia</a></li>
                        <li><a href="javaScript:void(0);">Pendidikan Agama Islam</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2  col-md-6 col-sm-6">
                <div class="single-footer-widget tp_widgets">
                    <h6 class="footer_title">Tentang Developer</h6>
                    <ul class="list">
                        <li>Perfectionist Web Developer with one years of experience as a Web Developer and Web Designer. Skilled at Designing and developing Websites. Excellent written and oral communication skills; capable of explaining complex software issues in easy-to-understand terms.</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <h4 class="footer_title">Tentang E - MesraMedia </h4>
                <p>
                    Web Edukasi Open Source. E - MesraMedia adalah Web edukasi yang dilengkapi video, materi dan sistem ujian yang tersedia secara . E - MesraMedia dibuat ditujukan agar para siswa dan guru dapat terus belajar dan mengajar dimana saja dan kapan saja.
                </p>
            </div>
        </div>
        <div class="row footer-bottom d-flex justify-content-between align-items-center">
            <p class="col-lg-8 col-md-8 footer-text m-0">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                </script>E - MesraMedia | All rights reserved
                <br>  
            </p>
            <div class="col-lg-4 col-md-4 footer-social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-behance"></i></a>
                <a href="#"><i class="fa fa-github"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>
<!--================ End footer Area  =================-->

<script src="{{ asset('assets/js/stellar.js') }}"></script>
<script src="{{ asset('assets/vendors/lightbox/simpleLightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendors/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/vendors/popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('assets/vendors/counter-up/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/vendors/counter-up/jquery.counterup.js') }}"></script>
<script src="{{ asset('assets/js/mail-script.js') }}"></script>
<script src="{{ asset('assets/js/theme.js') }}"></script>
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