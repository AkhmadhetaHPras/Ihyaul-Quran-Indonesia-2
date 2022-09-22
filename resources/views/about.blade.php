@extends('app')

@section('content')
<section class="slider-area slider-area2">
    <div class="slider-active">
        <div class="single-slider slider-height2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-11 col-md-12">
                        <div class="hero__caption hero__caption2">
                            <h1 data-animation="bounceIn" data-delay="0.2s">
                                Tentang Kami
                            </h1>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Beranda</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Tentang Kami</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-area1 fix pt-10">
    <div class="support-wrapper align-items-center">
        <div class="left-content1">
            <div class="about-icon">
                <img src="{{ asset('img/icon/about.svg') }}" alt="" />
            </div>

            <div class="section-tittle section-tittle2 mb-55">
                <div class="front-text">
                    <h2 class="">Profil Ihyaul Quran Indonesia</h2>
                    <p>
                        Yayasan Ihyaul Quran Indonesia mempunyai harapan besar untuk ikut mencetak generasi Indonesia yang mempunyai akhlaq yang baik, Beriman dan Berilmu dengan membangun lembaga Rudhatul Quran, Kuttab Ibadurahman dan Lembaga Wakaf untuk mensupport semua kegiatan mampu berjalan mandiri dan jauh lebih bermanfaat buat sesama.
                    </p>
                </div>
            </div>
        </div>
        <div class="right-content1">
            <div class="right-img">
                <img src="assets/img/gallery/about.png" alt="" />
                <div class="video-icon">
                    <iframe width="570" height="320" src="https://www.youtube.com/embed/9cek3o7MXto">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-area3 fix">
    <div class="support-wrapper align-items-center">
        <div class="right-content3">
            <div class="right-img">
                <img src="{{ asset('img/gallery/muslem.png') }}" alt="" />
            </div>
        </div>
        <div class="left-content3">
            <div class="section-tittle section-tittle2 mb-20">
                <div class="front-text">
                    <h2 class="">Visi Ihyaul Quran Indonesia</h2>
                </div>
            </div>
            <div class="single-features">
                <div class="features-icon">
                    <img src="{{ asset('img/icon/right-icon.svg') }}" alt="" />
                </div>
                <div class="features-caption">
                    <p>
                        Menyiapkan gerenasi qur`ani yang berkontribusi dalam pembangunan bangsa dan peradaban ummat.
                    </p>
                </div>
            </div>
            <div class="section-tittle section-tittle2 mb-20 mt-5">
                <div class="front-text">
                    <h2 class="">Misi Ihyaul Quran Indonesia</h2>
                </div>
            </div>
            <div class="single-features">
                <div class="features-icon">
                    <img src="{{ asset('img/icon/right-icon.svg') }}" alt="" />
                </div>
                <div class="features-caption">
                    <p>
                        Membangun keluarga yang bervisi qur`ani.
                    </p>
                </div>
            </div>
            <div class="single-features">
                <div class="features-icon">
                    <img src="{{ asset('img/icon/right-icon.svg') }}" alt="" />
                </div>
                <div class="features-caption">
                    <p>
                        Menyiapkan generasi yang memiliki kekuatan spiritual, moral, intelektulal, dan sosial berbasis Al Qur`an.
                    </p>
                </div>
            </div>
            <div class="single-features">
                <div class="features-icon">
                    <img src="{{ asset('img/icon/right-icon.svg') }}" alt="" />
                </div>
                <div class="features-caption">
                    <p>
                        Membangun masyarakat rabbani yang berbasis ilmu dan pengetahuan qur`ani.
                    </p>
                </div>
            </div>
            <div class="single-features">
                <div class="features-icon">
                    <img src="{{ asset('img/icon/right-icon.svg') }}" alt="" />
                </div>
                <div class="features-caption">
                    <p>
                        Memasyaratkan kajian Al Quran dan ilmu Islam melalui media informasi.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-area2 fix pb-padding pb-0">
    <div class="support-wrapper align-items-center">
        <div class="right-content2">
            <div class="section-tittle section-tittle2 mb-20">
                <div class="front-text">
                    <h2 class="">
                        Mari bergabung dengan kami.
                    </h2>
                    <p>
                        Kami percaya bahwa anak adalah investasi terbesar dunia dan akhirat bagi kedua orangtuanya, maka dari itu kami siap memandu tumbuh kembang anak anda dibawah naungan Al-Qur’an dan Sunnah.
                    </p>
                    <a href="{{ route('infaq') }}" class="btn">Ayo Berinfaq</a>
                </div>
            </div>
        </div>
        <div class="left-content2">
            <iframe width="570" height="320" src="https://www.youtube.com/embed/-nM6RB4Dv90">
            </iframe>
        </div>
    </div>
</section>

<section class="team-area section-padding40 fix">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="section-tittle text-center mb-55">
                    <h2>Lokasi Kami</h2>
                </div>
            </div>
        </div>
        <div class="d-none d-sm-block mb-5 pb-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d987.9213485744514!2d112.6133786!3d-7.9278905!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7882042329edc7%3A0xdb723cb18674c9a3!2sPerumahan%20M-Regency!5e0!3m2!1sid!2sid!4v1658907534668!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Kirimkan email anda disini</h2>
            </div>
            <div class="col-lg-8">
                <form class="form-contact contact_form" method="post" id="contactForm" novalidate>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Pesan'" placeholder=" Masukkan Pesan"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan nama'" placeholder="Masukkan nama" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan alamat email'" placeholder="Email" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Subjek'" placeholder="Masukkan Subjek" />
                            </div>
                        </div>
                        <div class="col-12" id="contact-us-response">

                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="button button-contactForm boxed-btn">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>Perum M Regency A 2 Tunggulwulung.</h3>
                        <p>Malang, Jawa Timur, 65143</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                    <div class="media-body">
                        <h3><a href="https://wa.me/6281335462833" target="_blank">0813 3546 2833</a></h3>
                        <p>Senin s/d Jumat 9am - 6pm</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><em class="ti-email"></em></span>
                    <div class="media-body">
                        <h3>
                            <a href="mailto:contoh10@gmail.com" target="_blank">ihyaulquran@gmail.com</a>
                        </h3>
                        <p>Kirimkan email anda kapan saja!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection