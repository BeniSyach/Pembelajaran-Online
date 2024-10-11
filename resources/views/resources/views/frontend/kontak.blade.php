@extends('frontend.main')
@section('content_utama')
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="kontak bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="banner_content text-center">
                <h2 data-aos="fade-up" data-aos-duration="1600">Kontak</h2>
                <div data-aos="fade-up" data-aos-duration="1600" class="page_link">
                    <a href="{{ url('/') }}">Beranda</a>
                    <a href="{{ url('/kontak') }}">Kontak</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Contact Area =================-->
<section class="contact_area p_40">
    <div class="container">
        <div style="width: 100%"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.2412227334203!2d98.58482287392627!3d3.5316793506842856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303125f1eeb53b9b%3A0xd22278b035b8eeb6!2sGg.%20Mufakat%20No.31%2C%20Tj.%20Anom%2C%20Kec.%20Pancur%20Batu%2C%20Kabupaten%20Deli%20Serdang%2C%20Sumatera%20Utara%2020351!5e0!3m2!1sid!2sid!4v1690260617550!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div><br />
        <div class="row">
            <div class="col-lg-9">
                <div class="contact_info">
                    <div class="info_item">
                        <i class="lnr lnr-home"></i>
                        <h6>Jl. Perjuangan Gg. Mufakat No. 31, Desa Tanjung Selamat, Kecamatan. Medan Sunggal
                            Indonesia, Medan</h6>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="info_item">
                        <i class="lnr lnr-phone-handset"></i>
                        <h6><a href="#">
                            0812-6476-4390</a></h6>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="info_item">
                        <i class="lnr lnr-envelope"></i>
                        <h6><a href="#">pkbmmesra@gmail.com</a></h6>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Contact Area =================-->

@endsection