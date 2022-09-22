@extends('app')

@section('content')
<section class="slider-area">
    <div class="slider-active">
        <div class="single-slider slider-height d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 col-md-12">
                        <div class="hero__caption">
                            <h1 data-animation="fadeInLeft" data-delay="0.2s">
                                {{ $amma->title }}
                            </h1>
                            <p data-animation="fadeInLeft" data-delay="0.4s">
                                {{ $amma->concept }}
                            </p>
                            @if($amma->status == 'Dibuka')
                            <a href="{{ route('program-detail', $amma) }}" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.7s">Daftar Program</a>
                            <h3 class="mt-3">Batch {{ $amma->batch->last()->batch }} akan ditutup pada <b>{{ \Carbon\Carbon::parse($amma->batch->last()->closed_date)->isoFormat('dddd, D MMMM Y') }}</b></h3>
                            @else
                            <a href="javascript:void(0);" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.7s">Sedang Ditutup</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="services-area">
    <div class="container">
        <div class="row justify-content-sm-center">
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="single-services mb-30">
                    <div class="features-icon">
                        <img src="{{ asset('img/icon/icon1.svg') }}" alt="" />
                    </div>
                    <div class="features-caption">
                        <h3>Program Unggulan</h3>
                        <p>Program terstruktur didampingi fasilitator</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="single-services mb-30">
                    <div class="features-icon">
                        <img src="{{ asset('img/icon/icon2.svg') }}" alt="" />
                    </div>
                    <div class="features-caption">
                        <h3>Fasilitator Ahli</h3>
                        <p>Pembimbing yang terpilih dengan kualitas terbaik</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="single-services mb-30">
                    <div class="features-icon">
                        <img src="{{ asset('img/icon/icon3.svg') }}" alt="" />
                    </div>
                    <div class="features-caption">
                        <h3>Circle Qur'ani</h3>
                        <p>Menerapkan Al Quran dalam kehidupan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="about-area3 fix">
    <div class="support-wrapper align-items-center">
        <div class="right-content3">
            <div class="right-img">
                <img src="{{ asset('img/gallery/muslem2.png') }}" width="220px" alt="" />
            </div>
        </div>
        <div class="left-content3">
            <div class="section-tittle section-tittle2 mb-20">
                <div class="front-text">
                    <h2 class="">Mengapa harus ikut AMMA?</h2>
                </div>
            </div>
            {!! $amma->superiority !!}
        </div>
    </div>
</section>

<div class="courses-area section-padding40 fix" style="background-color: #f0f0ff;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="section-tittle text-center mb-30">
                    <h2 class="mb-0">Bagaimana pelaksanaan Program AMMA?</h2>
                    <p>AMMA dilaksanakan secara:</p>
                </div>
            </div>
        </div>
        {!! $amma->program_implementation !!}
    </div>
</div>
<section class="about-area3 fix mb-4">
    <div class="support-wrapper align-items-center">
        <div class="right-content3">
            <div class="right-img">
                <img src="{{ asset('img/gallery/muslem8.png') }}" alt="">
            </div>
        </div>
        <div class="left-content3">
            <div class="section-tittle section-tittle2 mb-20">
                <div class="front-text">
                    <h2 class="">Siapa saja yang bisa bergabung AMMA?</h2>
                </div>
            </div>
            {!! $amma->requirement !!}
        </div>
    </div>
</section>

<section class="team-area section-padding40 fix">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="section-tittle text-center mb-55">
                    <h2>Testimonial Alumni</h2>
                </div>
            </div>
        </div>
        <div class="team-active single-post-area">
            <div class="blog-author mx-5">
                <div class="media align-items-center">
                    <img src="{{ asset('img/gallery/female-testimonial.png') }}" alt="">
                    <div class="media-body">
                        <a href="javascript:void(0);">
                            <h4 class="mb-1">Tri Rochana Agustin, 60 Tahun</h4>
                            <small class="text-warning">Malang</small>
                        </a>
                        <p>Setelah mengikuti program AMMA saya menjadi lebih menjiwai isi surah yang dihafalkan. Saya menjadi takut bila menemukan ayat yang tentang ancaman Allah dan ada harapan jika mendapati surah tentang kabar gembira yang dijanjikan Allah SWT.</p>
                    </div>
                </div>
            </div>
            <div class="blog-author mx-5">
                <div class="media align-items-center">
                    <img src="{{ asset('img/gallery/female-testimonial.png') }}" alt="">
                    <div class="media-body">
                        <a href="javascript:void(0);">
                            <h4 class="mb-1">Rita Sofiani, 58 Tahun</h4>
                            <small class="text-warning">Kabupaten Solok</small>
                        </a>
                        <p>Dengan metode yang diterapkan oleh fasilitator yaitu membaca ayat, artinya dan tadabur, memberikan pemahaman dan hafalan yang kuat bagi peserta. Ustadzah fasilitator memberikan bimbingan intensif kepada peserta. Murojaah yang rutin akan lebih memperkuat hafalan dan mudah-mudahan akan hafal lebih lama. InsyaAllah..</p>
                    </div>
                </div>
            </div>
            <div class="blog-author mx-5">
                <div class="media align-items-center">
                    <img src="{{ asset('img/gallery/male-testimonial.png') }}" alt="">
                    <div class="media-body">
                        <a href="javascript:void(0);">
                            <h4 class="mb-1">Eko Sunarto, 45 Tahun</h4>
                            <small class="text-warning">Surabaya</small>
                        </a>
                        <p>Alhamdulillah, Allah memberikan kemudahan dalam menghafal surah An-Naba beserta artinya. Terima kasih kepada fasilitator dan semua pihak.<br>Jazakumullahu Khoiron. Semoga Allah memberikan balasan yang lebih baik.</p>
                    </div>
                </div>
            </div>
            <div class="blog-author mx-5">
                <div class="media align-items-center">
                    <img src="{{ asset('img/gallery/male-testimonial.png') }}" alt="">
                    <div class="media-body">
                        <a href="javascript:void(0);">
                            <h4 class="mb-1">Asmayulis, 46 Tahun</h4>
                            <small class="text-warning">Pekanbaru</small>
                        </a>
                        <p>Saya sangat bersyukur sekali kepada Allah yang telah mempertemukan saya dengan program AMMA. Sudah begitu lama saya ingin menghafal Surat An-Naba' terhenti sampai pada ayat 5 saja. Alhamdulillah dengan adanya program AMMA saya diberi kemudahan oleh Allah sehinga bisa menuntaskan sampai 40 ayat. Terimakasih kepada fasilitator dan ustadz ustadzah ihyaul Quran. Saya merasakan manfaat yang sangat besar sekali dengan program AMMA ini. Jazakallah Khairan...</p>
                    </div>
                </div>
            </div>
            <div class="blog-author mx-5">
                <div class="media align-items-center">
                    <img src="{{ asset('img/gallery/female-testimonial.png') }}" alt="">
                    <div class="media-body">
                        <a href="javascript:void(0);">
                            <h4 class="mb-1">Rusmiati, 42 Tahun</h4>
                            <small class="text-warning">Pekanbaru</small>
                        </a>
                        <p>Masya Allah. Tabarakallah. Alhamdulillah, Saya sangat bersyukur dengan adanya grup program AMMA ini, yang sudah menyediakan wadah bagi saya yang agak susah untuk mengingat dan menghafal dikarenakan faktor usia juga. Semoga menjadi keberkahan dan diberikan kemudahan bagi dakwah Al-Quran di seluruh penjuru negeri. Aamiin.</p>
                    </div>
                </div>
            </div>
            <div class="blog-author mx-5">
                <div class="media align-items-center">
                    <img src="{{ asset('img/gallery/female-testimonial.png') }}" alt="">
                    <div class="media-body">
                        <a href="javascript:void(0);">
                            <h4 class="mb-1">Lutfiyah Fatmawati, 26 Tahun</h4>
                            <small class="text-warning">Batu</small>
                        </a>
                        <p>Alhamdulillah, program ini sangat memberi banyak manfaat bagi umat, terkhusus saya pribadi. Saya menjadi lebih semangat dalam menghafal Al-Qur'an, merasa banyak teman berjuang dan tidak merasa berjuang sendiri. Alhamdulillah, bersyukur kepada ALlah Subhanahu wa Ta'ala. Ustadzah pembimbing sangat sabar dalam mendampingi kami selama proses menghafal. Kepada pihak AMMA yang telah menyelenggarakan program ini, terimakasih banyak :')<br>Semoga selalu dilimpahkan keberkahan. Aamiin Allahumma Aamiin</p>
                    </div>
                </div>
            </div>
            <div class="blog-author mx-5">
                <div class="media align-items-center">
                    <img src="{{ asset('img/gallery/female-testimonial.png') }}" alt="">
                    <div class="media-body">
                        <a href="javascript:void(0);">
                            <h4 class="mb-1">Rina Silvia, 22 Tahun</h4>
                            <small class="text-warning">Jambi</small>
                        </a>
                        <p>Alhamdulillah Masyaallah ana sangat bersyukur dan bahagia sekali bisa hafal Surah An-Naba beserta tarjimnya. Dengan sistem dan metode belajar yang sangat memudahkan, sehingga tidak ada rasa bosan dan beban dalam menghafal Al-Qur'an.<br>Ustadzah pengajarnya sangat berkompeten dan penuh kesabaran dalam mengajarkan dan membimbing kami. Syukron jazakillahu khayran katsiran, Amma</p>
                    </div>
                </div>
            </div>
            <div class="blog-author mx-5">
                <div class="media align-items-center">
                    <img src="{{ asset('img/gallery/female-testimonial.png') }}" alt="">
                    <div class="media-body">
                        <a href="javascript:void(0);">
                            <h4 class="mb-1">Adinda Putri Iffatuz Z, 17 Tahun</h4>
                            <small class="text-warning">Surabaya</small>
                        </a>
                        <p>Alhamdulillah, Dengan mengikuti Program AMMA ini saya bisa memahai kandungan surat dan mengetahui kosa kata dalam bahasa Arab. Semoga saya bisa istiqamah dalam menghafal dan mengamalkan perlahan-lahan ayat yang telah saya hafalkan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="facts-area section-gap mb-55" id="facts-area">
    <div class="container">
        <div class="row text-center text-white">
            <div class="col-lg-4 col-md-6 single-fact">
                <h1 class="counter text-white">10</h1>
                <p class="text-white">Fasilitator Ahli</p>
            </div>
            <div class="col-lg-4 col-md-6 single-fact">
                <h1 class="counter text-white">3000</h1>
                <p class="text-white">Alumni</p>
            </div>
            <div class="col-lg-4 col-md-6 single-fact">
                <h1 class="counter text-white">4</h1>
                <p class="text-white">Batch Telah Terlaksana</p>
            </div>
        </div>
    </div>
</section>

<section class="about-area2 fix pb-padding">
    <div class="support-wrapper align-items-center">
        <div class="right-content2">
            <div class="right-img">
                <img src="{{ asset('img/gallery/muslem3.png') }}" width="230px" alt="" />
            </div>
        </div>
        <div class="left-content2">
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
                    <h2 class="">Meningkatkan Ketaqwaan Melalui AMMA</h2>
                    <p>
                        Kami menyadari, cita-cita besar ini tidak akan dapat kami emban sendiri. Kami mengajak Anda semua, mari kita bersama-sama menyatukan langkah untuk mengembalikan kejayaan Islam ini melalui putra putri kita. Melalui generasi yang berpegang teguh pada Al Qur’an dan Sunnah Nabi dengan semangat Qur’ani, Berkarakter & Visioner.
                    </p>
                </div>
            </div>
            <div class="single-features">
                <div class="features-icon">
                    <img src="{{ asset('img/icon/right-icon.svg') }}" alt="" />
                </div>
                <div class="features-caption">
                    <p>
                        Mampu dan cinta untuk membaca Al Quran dengan baik dan benar.
                    </p>
                </div>
            </div>
            <div class="single-features">
                <div class="features-icon">
                    <img src="{{ asset('img/icon/right-icon.svg') }}" alt="" />
                </div>
                <div class="features-caption">
                    <p>
                        Memahami kandungan Al Quran & menerapkan Al-Quran dalam kehidupan.
                    </p>
                </div>
            </div>
        </div>
        <div class="right-content1">
            <div class="right-img">
                <img src="{{ asset('img/gallery/muslem.png') }}" width="250px" alt="" />
                <div class="video-icon">
                    <a class="popup-video btn-icon" href="https://www.youtube.com/watch?v=SPaIHEBSWH8"><i class="fas fa-play"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection