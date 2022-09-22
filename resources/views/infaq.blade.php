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
                                Formulir Infaq
                            </h1>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Beranda</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Formulir Infaq</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container about-area1 fix pt-10">
    <div class="row support-wrapper align-items-center">
        <div class="col-md-6 col-12">
            <form action="" id="infaqForm" class="mt-3 mb-5">
                <div class="mb-3">
                    <label class="form-label" for="name">Nama</label>
                    <input type="text" name="name" id="name" placeholder="Nama Lengkap" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Lengkap'" required class="single-input">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="name">Email</label>
                    <input type="text" name="email" id="email" placeholder="contoh@gmail.com" onfocus="this.placeholder = ''" onblur="this.placeholder = 'contoh@gmail.com'" required class="single-input">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="name">No Wa Aktif</label>
                    <input type="text" name="phone" id="phone" placeholder="081234567890" onfocus="this.placeholder = ''" onblur="this.placeholder = '081234567890'" required class="single-input">
                </div>
                <div class="mb-4">
                    <label class="form-label" for="name">Nominal Infaq</label>
                    <input type="number" name="infaq" id="infaq" placeholder="10000" onfocus="this.placeholder = ''" onblur="this.placeholder = '10000'" required class="single-input" min="10000">
                    <small id="infaqHelp" class="form-text text-muted">Transfer nominal yang anda masukkan ke rekening BSM/BSI 711 910 7207 an. INFAQ YAYASAN IHYAUL serta kirimkan bukti transfer kepada <a href="https://wa.me/6281335462833" class="text-primary">Admin (+6281335462833)</a></small>
                </div>
                <div class="mb-3" id="infaq-form-response">

                </div>
                <div class="mb-3">
                    <input type="submit" class="button button-infaqForm boxed-btn" value="KIRIM">
                </div>
            </form>
        </div>
        <div class="col-md-6 col-12 d-flex justify-content-center align-items-center">
            <img src="{{ asset('img/gallery/muslem5.png') }}" class="img-fluid" alt="">
        </div>
    </div>
</section>
@endsection

@section('script')
<script src="{{ asset('js/page/infaq.js') }}"></script>
@endsection