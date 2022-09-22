<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>IhyaulQuran | Indonesia - {{ $title }}</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo/customlogo.png') }}" />

    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/animated-headline.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/barfiller.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/gijgo.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/slicknav.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
</head>

<body>
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('img/logo/customlogo.png') }}" height="30px" alt="" />
                </div>
            </div>
        </div>
    </div>

    <!-- header -->
    <header>
        <div class="header-area header-transparent">
            <div class="main-header">
                <div class="header-bottom header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="{{ route('home') }}"><img src="{{ asset('img/logo/customlogo.png') }}" height="30px" alt="" /></a>
                                    <div class="canvas__open text-white" data-toggle="offcanvas">
                                        <i class="fa fa-bars"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper d-flex align-items-center justify-content-end">
                                    <div class="main-menu d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">
                                                <li class="{{ $title == 'Beranda' ? 'active' : '' }}"><a href="{{ route('home') }}">Beranda</a></li>
                                                <li class="{{ $title == 'Tentang Kami' ? 'active' : '' }}"><a href="{{ route('about') }}">Tentang Kami</a></li>
                                                <!-- <li class="{{ $title == 'Program' ? 'active' : '' }}">
                                                    <a href="javascript:void(0);">Program</a>
                                                    <ul class="submenu">
                                                        <li><a href="{{ route('program') }}">Sekolah Balita</a></li>
                                                        <li>
                                                            <a href="{{ route('program') }}">Tahfidz Quran</a>
                                                        </li>
                                                        <li><a href="{{ route('program') }}">Amma</a></li>
                                                    </ul>
                                                </li> -->
                                                @if(\App\Models\Program::find(1)->status == 'Dibuka')
                                                <li class="button-header margin-left {{ $title == 'Daftar Program' ? 'active' : '' }}">
                                                    <a href="{{ route('program-detail', \App\Models\Program::find(1)) }}" class="btn">Daftar</a>
                                                    <!-- <ul class="submenu">
                                                        <li><a href="{{ route('daftar-program') }}">Sekolah Balita</a></li>
                                                        <li>
                                                            <a href="{{ route('daftar-program') }}">Tahfidz Quran</a>
                                                        </li>
                                                        <li><a href="{{ route('daftar-program') }}">Amma</a></li>
                                                    </ul> -->
                                                </li>
                                                @endif
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item {{ $title == 'Beranda' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                                    </li>
                                    <li class="nav-item {{ $title == 'Tentang Kami' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('about') }}">Tentang Kami</a>
                                    </li>
                                    <!-- <li class="nav-item dropdown {{ $title == 'Program' ? 'active' : '' }}">
                                        <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Program</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                                            <a class="dropdown-item" href="{{ route('program') }}">Sekolah Balita</a>
                                            <a class="dropdown-item" href="{{ route('program') }}">Tahfidz Quran</a>
                                            <a class="dropdown-item" href="{{ route('program') }}">Amma</a>
                                        </div>
                                    </li> -->
                                    @if(\App\Models\Program::find(1)->status == 'Dibuka')
                                    <li class="nav-item dropdown button-header margin-left {{ $title == 'Daftar Program' ? 'active' : '' }}">
                                        <a href="{{ route('program-detail', \App\Models\Program::find(1)) }}" class="btn nav-link dropdown-toggle" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Daftar</a>
                                        <!-- <ul class="dropdown-menu" aria-labelledby="dropdown02">
                                            <li><a class="dropdown-item" href="{{ route('daftar-program') }}">Sekolah Balita</a></li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('daftar-program') }}">Tahfidz Quran</a>
                                            </li>
                                            <li><a class="dropdown-item" href="{{ route('daftar-program') }}">Amma</a></li>
                                        </ul> -->
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- content -->
    <main class="content">
        @yield('content')
    </main>

    <!-- footer -->
    <footer>
        <div class="footer-wrappper footer-bg">
            <div class="footer-area footer-padding">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-xl-4 col-lg-5 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-30">
                                    <div class="footer-logo mb-25">
                                        <a href="{{ route('home') }}"><img src="{{ asset('img/logo/customlogo.png') }}" height="24px" alt="" class="mr-3" />
                                            <span class="footer-tittle">
                                                <h4 class="m-0" style="display: inline-block">
                                                    Ihyaul Quran Indonesia
                                                </h4>
                                            </span></a>
                                    </div>
                                    <div class="footer-tittle">
                                        <div class="footer-pera">
                                            <p>
                                                Bersama Pondok Pesantren Ihyaul Quran, mari kita bersama-sama mewujudkan generasi yang Qur’ani, Berkarakter & Visioner.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="footer-social">
                                        <a href="https://instagram.com/ihyaulquranorid?igshid=YmMyMTA2M2Y=" target="_blank"><i class="fab fa-instagram"></i></a>
                                        <a href="https://wa.me/6281335462833" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                        <a href="https://www.youtube.com/channel/UCTh8e-yMaeQYVR1D5vctWOA" target="_blank"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle mb-25">
                                    <h4 class="m-0">
                                        AMMA
                                    </h4>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p>Ayo Menghafal dan Memahami Al-Quran (AMMA) - menghafal Al-Quran dengan mudah dan menyenangkan</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Lokasi</h4>
                                    <ul>
                                        <li><a href="https://goo.gl/maps/3Ry1ZxSWRC7ZPvUY7" target="_blank"><i class="fas fa-map-marker-alt"></i> Perum M Regency A 2 Tunggulwulung | Malang Jatim | Indonesia</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom-area">
                <div class="container">
                    <div class="footer-border">
                        <div class="row d-flex align-items-center">
                            <div class="col-xl-12">
                                <div class="footer-copy-right text-center">
                                    <p>
                                        Copyright &copy;
                                        <script>
                                            document.write(new Date().getFullYear());
                                        </script>
                                        | Ihyaul Quran Indonesia
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div id="back-top">
        <a title="Go to Top" href="javascript:void(0);"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- SCRIPT -->
    <script src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/animated.headline.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('js/gijgo.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('js/jquery.barfiller.js') }}"></script>
    <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.js') }}"></script>
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/snake.min.js') }}"></script>
    <script src="{{ asset('js/contact.js') }}"></script>
    <script src="{{ asset('js/jquery.form.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/mail.js') }}"></script>
    <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('js/plugin.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>

    <!-- <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "UA-23581568-13");
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"7302b59b38b34810","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.6.0","si":100}' crossorigin="anonymous"></script> -->

    <section class="script">
        @yield('script')
    </section>
</body>

</html>