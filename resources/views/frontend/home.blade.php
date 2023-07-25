@extends('frontend.main')
@section('content_utama')

<!--================Home Banner Area =================-->
<section class="home_banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="">
		</div>
		<div class="container">
			<div class="banner_content text-center">
				<h3 data-aos="fade-up" data-aos-duration="1600">Belajar Dimana Saja & Kapan Saja <br /> Mudah Dengan E - MesraMedia </h3>
				<p data-aos="fade-up" data-aos-duration="1900">Dengan E - MesraMedia kemudahan kegiatan belajar mengajar dapat terpenuhi. Para guru dan siswa dapat
					belajar meski banyak halangan atau rintangan. Nikmati Pembelajaran terstruktur dan efektif menggunakan E - MesraMedia serta kemudahan belajar dengan menggunakan aplikasi kami. </p>
				<a data-aos="fade-up" data-aos-duration="2000" class="main_btn" href="{{ url('user/registration') }}">Bergabung Sekarang <span class="lnr lnr-arrow-right"></span></a>
			</div>
		</div>
	</div>
</section>
<!-- ================End Home Banner Area ================= -->

<!--================Finance Area =================-->
<section class="finance_area">
	<div class="container">
		<div class="finance_inner row">
			<div class="col-lg-3 col-sm-6">
				<div class="finance_item">
					<div data-aos="fade-right" data-aos-duration="1600" class="media">
						<div class="d-flex">
							<i class="lnr lnr-users"></i>
						</div>
						<div class="media-body">
							<h5>Admin, User & Guru Data Management</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="finance_item">
					<div data-aos="fade-right" data-aos-duration="1800" class="media">
						<div class="d-flex">
							<i class="lnr lnr-file-empty"></i>
						</div>
						<div class="media-body">
							<h5>Dokumentasi lengkap & Jelas</h5>
						</div>
					</div>
				</div>
			</div>
			<div data-aos="fade-right" data-aos-duration="2000" class="col-lg-3 col-sm-6">
				<div class="finance_item">
					<div class="media">
						<div class="d-flex">
							<i class="lnr lnr-camera-video"></i>
						</div>
						<div class="media-body">
							<h5>E-Learning Berbasis Video dan Disqus</h5>
						</div>
					</div>
				</div>
			</div>
			<div data-aos="fade-right" data-aos-duration="2200" class="col-lg-3 col-sm-6">
				<div class="finance_item">
					<div class="media">
						<div class="d-flex">
							<i class="lnr lnr-tag"></i>
						</div>
						<div class="media-body">
							<h5>Lorem ipsum dolor sit amet, consectetur</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Finance Area =================-->

<!--================ Illustrations Area =================-->
<section class="E - MesraMedia -for-indonesia p_20">
	<div class="container">
		<div class="row">
			<div class="col-md-6 mx-auto">
				<img data-aos="fade-up" data-aos-duration="1800" src=" {{ asset('assets/img/illustrations/index-study.svg') }}" alt="" srcset="">
			</div>
		</div>
		<div class="row">
			<div class="col-md-7 mx-auto">
				<div class="main_title">
					<h2 data-aos="fade-up" data-aos-duration="2000">E - MesraMedia Dibuat Untuk Meningkatkan Kualitas Pembelajaran Di Indonesia</h2>
					<p data-aos="fade-up" data-aos-duration="2200">Merciful revaluation burying love ultimate value inexpedient ubermensch. Holiest madness victorious morality hope endless christian madness. Love dead fearful transvaluation marvelous. Oneself right ideal abstract endless faith deceptions zarathustra grandeur law ubermensch free.</p>
					<a href="#"><button data-aos="fade-up" data-aos-duration="2400" class="bubbly-button">Download Panduan E - MesraMedia <span class="lnr lnr-arrow-right"></span></button></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Illustrations Area =================-->

<!--================Courses Area =================-->
<section class="courses_area p_40">
	<div class="container">
		<div class="main_title">
			<h2 data-aos="fade-up" data-aos-duration="1600">Pelajaran Yang Tersedia di E - MesraMedia </h2>
			<p data-aos="fade-up" data-aos-duration="1800">Merciful revaluation burying love ultimate value inexpedient ubermensch. Holiest madness victorious morality hope endless christian madness. Love dead fearful transvaluation marvelous. Oneself right ideal abstract endless faith deceptions zarathustra grandeur law ubermensch free.</p>
		</div>
		<div class="row courses_inner">
			<div class="col-lg-9">
				<div class="grid_inner">
					<div class="grid_item wd55">
						<div class="courses_item" data-aos="fade-right" data-aos-duration="1800">
							<img src=" {{ asset('assets/img/courses/course-1.jpg') }}" alt="">
							<div class="hover_text">
								
								<a href="javaScript:void(0);">
									<h4>Kelas Matematika </h4>
								</a>
								<ul class="list">
									<li><a href="#"><i class="lnr lnr-users"></i>54</a></li>
									<li><a href="#"><i class="lnr lnr-bubble"></i> 0</a></li>
									<li><a href="#"><i class="lnr lnr-user"></i>Guru Matematika E - MesraMedia</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="grid_item wd44">
						<div class="courses_item" data-aos="fade-down" data-aos-duration="1800">
							<img src=" {{ asset('assets/img/courses/course-2.jpg') }}" alt="">
							<div class="hover_text">
								
								<a href="javaScript:void(0);">
									<h4>Kelas IPA </h4>
								</a>
								<ul class="list">
									<li><a href="#"><i class="lnr lnr-users"></i> 34</a></li>
									<li><a href="#"><i class="lnr lnr-bubble"></i> 0</a></li>
									<li><a href="#"><i class="lnr lnr-user"></i> Guru IPA E - MesraMedia</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="grid_item wd44">
						<div class="courses_item" data-aos="fade-right" data-aos-duration="1800">
							<img src=" {{ asset('assets/img/courses/course-4.jpg') }}" alt="">
							<div class="hover_text">
								
								<a href="javaScript:void(0);">
									<h4>Kelas Bahasa Inggris </h4>
								</a>
								<ul class="list">
									<li><a href="#"><i class="lnr lnr-users"></i> 63</a></li>
									<li><a href="#"><i class="lnr lnr-bubble"></i> 0</a></li>
									<li><a href="#"><i class="lnr lnr-user"></i> Guru English E - MesraMedia</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="grid_item wd55">
						<div class="courses_item" data-aos="fade-up" data-aos-duration="1800">
							<img src=" {{ asset('assets/img/courses/course-5.jpg') }}" alt="">
							<div class="hover_text">
								
								<a href="javaScript:void(0);">
									<h4>Kelas Bahasa Indonesia </h4>
								</a>
								<ul class="list">
									<li><a href="#"><i class="lnr lnr-users"></i> 24</a></li>
									<li><a href="#"><i class="lnr lnr-bubble"></i> 0</a></li>
									<li><a href="#"><i class="lnr lnr-user"></i> Guru Indonesia E - MesraMedia</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="course_item" data-aos="fade-left" data-aos-duration="1800">
					<img src=" {{ asset('assets/img/courses/course-3.jpg') }}" alt="">
					<div class="hover_text">
						
						<a href="javaScript:void(0);">
							<h4>Kelas Pendidikan Agama Islam </h4>
						</a>
						<ul class="list">
							<li><a href="#"><i class="lnr lnr-users"></i> 35</a></li>
							<li><a href="#"><i class="lnr lnr-bubble"></i> 0</a></li>
							<li><a href="#"><i class="lnr lnr-user"></i> Guru Agama E - MesraMedia</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Courses Area =================-->

<!--================Team Area =================-->
<section class="team_area p_20">
	<div class="container">
		<div class="main_title">
			<h2 data-aos="fade-up" data-aos-duration="1800">Testimonial Para Siswa E - MesraMedia </h2>
			<p data-aos="fade-up" data-aos-duration="2000">Merciful revaluation burying love ultimate value inexpedient ubermensch. Holiest madness victorious morality hope endless christian madness. Love dead fearful transvaluation marvelous. Oneself right ideal abstract endless faith deceptions zarathustra grandeur law ubermensch free.</p>
		</div>
		<section class="testimonials_area p_20">
			<div class="container">
				<div class="testi_slider owl-carousel">
					<div class="item">
						<div class="testi_item">
							<img src=" {{ asset('assets/user-profile/default.png') }}" alt="" width="25%" height="80px">
							<h4>Beni</h4>
							<ul class="list">
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
							</ul>
							<p>Merciful revaluation burying love ultimate value inexpedient ubermensch. Holiest madness victorious morality hope endless christian madness. Love dead fearful transvaluation marvelous. Oneself right ideal abstract endless faith deceptions zarathustra grandeur law ubermensch free. Abstract chaos snare play truth ultimate good self. God overcome sexuality pious abstract good decieve revaluation aversion good. Virtues chaos overcome society holiest truth.</p>
						</div>
					</div>
					<div class="item">
						<div class="testi_item">
							<img src=" {{ asset('assets/user-profile/default.png') }}" alt="" width="25%" height="80px">
							<h4>Beni Syach</h4>
							<ul class="list">
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
							</ul>
							<p>Merciful revaluation burying love ultimate value inexpedient ubermensch. Holiest madness victorious morality hope endless christian madness. Love dead fearful transvaluation marvelous. Oneself right ideal abstract endless faith deceptions zarathustra grandeur law ubermensch free. Abstract chaos snare play truth ultimate good self. God overcome sexuality pious abstract good decieve revaluation aversion good. Virtues chaos overcome society holiest truth.</p>
						</div>
					</div>
					<div class="item">
						<div class="testi_item">
							<img src=" {{ asset('assets/user-profile/default.png') }}" alt="" width="25%" height="80px">
							<h4>beni Ketaren</h4>
							<ul class="list">
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
								<li><a href="#"><i class="fa fa-star"></i></a></li>
							</ul>
							<p>Merciful revaluation burying love ultimate value inexpedient ubermensch. Holiest madness victorious morality hope endless christian madness. Love dead fearful transvaluation marvelous. Oneself right ideal abstract endless faith deceptions zarathustra grandeur law ubermensch free. Abstract chaos snare play truth ultimate good self. God overcome sexuality pious abstract good decieve revaluation aversion good. Virtues chaos overcome society holiest truth.
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</section>
<!--================End Team Area =================-->

<!--================Impress Area =================-->
<section class="impress_area p_120">
	<div class="container">
		<div class="impress_inner text-center">
			<h2 data-aos="fade-up" data-aos-duration="1800">LOGIN SEBAGAI GURU DAN UPLOAD MATERI & VIDEO SEKARANG</h2>
			<p data-aos="fade-up" data-aos-duration="2000">Merciful revaluation burying love ultimate value inexpedient ubermensch. Holiest madness victorious morality hope endless christian madness. Love dead fearful transvaluation marvelous. Oneself right ideal abstract endless faith deceptions zarathustra grandeur law ubermensch free. Abstract chaos snare play truth ultimate good self. God overcome sexuality pious abstract good decieve revaluation aversion good. Virtues chaos overcome society holiest truth.
			</p>
			<a data-aos="fade-up" data-aos-duration="2200" class="main_btn" href=" {{ url('welcome/guru') }}">Login Sebagai Guru <span class="lnr lnr-arrow-right text-black"></span></a>
		</div>
	</div>
</section>
<!--================End Impress Area =================-->
@endsection