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
                                Formulir AMMA Batch #{{ $program->batch->last()->batch }}
                            </h1>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Beranda</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Formulir AMMA</a></li>
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
    <form action="" method="POST" id="registrationform">
        <h2 class="border-bottom mt-4">Data Diri</h2>
        <div class="row support-wrapper align-items-center">
            <div class="col-md-6 col-12">
                <div class="mb-3">
                    <label class="form-label" for="name">Nama</label>
                    <input type="text" name="name" id="name" placeholder="Nama Lengkap" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Lengkap'" required class="single-input-primary">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="">Jenis Kelamin</label>
                    <div class="row input">
                        <div class="col-sm-6 col-12">
                            <div class="switch-wrap d-flex align-items-center justify-content-start mb-0">
                                <div class="primary-radio">
                                    <input class="form-check-input" type="radio" name="gender" id="akhwat" value="Akhwat">
                                    <label for="akhwat"></label>
                                </div>
                                <label for="akhwat" class="ml-3">Akhwat</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="switch-wrap d-flex align-items-center justify-content-start mb-0">
                                <div class="primary-radio">
                                    <input class="form-check-input" type="radio" name="gender" id="ikhwan" value="ikhwan">
                                    <label for="ikhwan"></label>
                                </div>
                                <label for="ikhwan" class="ml-3">Ikhwan</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <label class="form-label" for="city">Kota/Kab. Tinggal</label>
                            <input type="text" name="city" id="city" placeholder="Kota/Kab. Tinggal" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Kota/Kab. Tinggal'" required class="single-input-primary">
                        </div>
                        <div class="col-sm-6 col-12">
                            <label class="form-label" for="birth">Tanggal Lahir</label>
                            <input type="date" name="birth" id="birth" required class="single-input-primary">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input type="text" name="email" id="email" placeholder="contoh@gmail.com" onfocus="this.placeholder = ''" onblur="this.placeholder = 'contoh@gmail.com'" required class="single-input-primary">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="phone">No Wa Aktif</label>
                    <input type="text" name="phone" id="phone" placeholder="081234567890" onfocus="this.placeholder = ''" onblur="this.placeholder = '081234567890'" required class="single-input-primary">
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <label class="form-label" for="job">Pekerjaan</label>
                            <input type="text" name="job" id="job" placeholder="Pekerjaan" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Pekerjaan'" required class="single-input-primary">
                        </div>
                        <div class="col-sm-6 col-12">
                            <label class="form-label" for="skill">Keahlian</label>
                            <input type="text" name="skill" id="skill" placeholder="Memasak, Public Speaking" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Memasak, Public Speaking'" required class="single-input-primary">
                            <small id="skillHelp" class="form-text text-muted">Gunakan karakter koma (,) untuk sebagai pemisah</small>
                        </div>
                    </div>
                </div>
                <!-- <div class="mb-3" id="biodata-response">
                    <div class="alert alert-success" role="alert">hayoloooooo, rusakkk</div>
                </div> -->
            </div>
            <div class="col-md-6 col-12 d-flex justify-content-center align-items-center">
                <img src="{{ asset('img/gallery/muslem6.png') }}" class="img-fluid" alt="">
            </div>
        </div>

        <!-- Self Assesment -->
        <h2 class="border-bottom mt-4 mb-3">Penilaian Diri</h2>
        <div class="row support-wrapper align-items-center">
            <div class="col-md-6 col-12 self-assesment">
                <div class="mb-4 a1">
                    <label class="form-label" for="">Bisa membaca Al Quran dengan benar dan lancar (Makhorijul Huruf, Panjang Pendek, Tajwid)?</label>
                    <div class="row input">
                        <div class="col-sm-6 col-12">
                            <div class="switch-wrap d-flex align-items-center justify-content-start mb-0">
                                <div class="primary-radio">
                                    <input class="form-check-input" type="radio" name="a1" id="a1yes" value="true">
                                    <label for="a1yes"></label>
                                </div>
                                <label for="a1yes" class="ml-3">Bisa</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="switch-wrap d-flex align-items-center justify-content-start mb-0">
                                <div class="primary-radio">
                                    <input class="form-check-input" type="radio" name="a1" id="a1no" value="false">
                                    <label for="a1no"></label>
                                </div>
                                <label for="a1no" class="ml-3">Tidak</label>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="mb-4">
                    <label class="form-label" for="">Sudah pernah sebelumnya menghafal Juz 30 dengan mutqin?</label>
                    <div class="row input">
                        <div class="col-sm-6 col-12">
                            <div class="switch-wrap d-flex align-items-center justify-content-start mb-0">
                                <div class="primary-radio">
                                    <input class="form-check-input" type="radio" name="b1" id="b1yes" value="true">
                                    <label for="b1yes"></label>
                                </div>
                                <label for="b1yes" class="ml-3">Sudah</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="switch-wrap d-flex align-items-center justify-content-start mb-0">
                                <div class="primary-radio">
                                    <input class="form-check-input" type="radio" name="b1" id="b1no" value="false">
                                    <label for="b1no"></label>
                                </div>
                                <label for="b1no" class="ml-3">Belum</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4 input">
                    <label class="form-label" for="b2">Jika sudah pernah menghafal juz 30 dengan mutqin, maukah mengivestasikan ilmu dan waktunya untuk mengajarkan kepada orang yang belum pernah menghafal juz 30 melalui program AMMA?</label>
                    <div class="input-group-icon mt-10">
                        <div class="icon"><i class="fa fa-bullhorn" aria-hidden="true"></i></div>
                        <div class="form-select" id="default-select">
                            <select id="b2" name="b2">
                                <option value="">Pilih Jawaban</option>
                                <option value="Insyaallah siap">Insyaallah siap</option>
                                <option value="Ingin memantapkan lagi hafalan juz 30">Ingin memantapkan lagi hafalan juz 30</option>
                                <option value="Ingin menambah hafalan">Ingin menambah hafalan</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Commitment  -->
        <h2 class="border-bottom mt-4 mb-3">Komitmen</h2>
        <div class="row support-wrapper align-items-center">
            <div class="col-md-6 col-12 d-flex justify-content-center align-items-center">
                <img src="{{ asset('img/gallery/muslem7.png') }}" class="img-fluid" alt="">
            </div>
            <div class="col-md-6 col-12">
                <div class="mb-4 class">
                    <label class="form-label" for="">Berkomitmen mengikuti kelas AMMA secara :</label>
                    <div class="row input">
                        <div class="col-sm-6 col-12">
                            <div class="switch-wrap d-flex align-items-center justify-content-start mb-0">
                                <div class="primary-radio">
                                    <input class="form-check-input" type="radio" name="class" id="offline" value="Offline">
                                    <label for="offline"></label>
                                </div>
                                <label for="offline" class="ml-3">Offline</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="switch-wrap d-flex align-items-center justify-content-start mb-0">
                                <div class="primary-radio">
                                    <input class="form-check-input" type="radio" name="class" id="online" value="Online">
                                    <label for="online"></label>
                                </div>
                                <label for="online" class="ml-3">Online</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4 input">
                    <label class="form-label" for="c3">Berkomitmen mengikuti kelas AMMA ONLINE intensif senin-kamis. Waktu yang akan diikuti:</label>
                    <div class="input-group-icon mt-10">
                        <div class="icon"><i class="fa fa-clock" aria-hidden="true"></i></div>
                        <div class="form-select" id="default-select">
                            <select id="c3" name="c3">
                                <option value="">Pilih jadwal kelas</option>
                                <option value="08:00-09:00">08:00-09:00</option>
                                <option value="09:00-10:00">09:00-10:00</option>
                                <option value="10:00-11:00">10:00-11:00</option>
                                <option value="13:00-14:00">13:00-14:00</option>
                                <option value="16:00-17:00">16:00-17:00</option>
                                <option value="18:30-19:30">18:30-19:30</option>
                                <option value="20:00-21:00">20:00-21:00</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-4 input">
                    <label class="form-label" for="resources">Mengetahui program ini dari mana?</label>
                    <div class="input-group-icon mt-10">
                        <div class="icon"><i class="fa fa-bullhorn" aria-hidden="true"></i></div>
                        <div class="form-select" id="default-select">
                            <select id="resources" name="resources">
                                <option value="">Pilih Sumber Informasi</option>
                                <option value="Sosial Media">Sosial Media</option>
                                <option value="Orang Tua">Orang Tua</option>
                                <option value="Teman">Teman</option>
                                <option value="Kajian Ustadzah Maya">Kajian Ustadzah Maya</option>
                                <option value="Madrasah Quran Online">Madrasah Quran Online</option>
                                <option value="Madrasah Quran Offline">Madrasah Quran Offline</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label" for="motivation">Motivasi mengikuti program AMMA</label>
                    <input type="text" name="motivation" id="motivation" placeholder="ingin mempelajari dan mengamalkan Al Quran" onfocus="this.placeholder = ''" onblur="this.placeholder = 'ingin mempelajari dan mengamalkan Al Quran'" required class="single-input-primary">
                </div>
                <div class="mb-4 infaqyesorno">
                    <label class="form-label" for="">Apakah anda ingin berinfaq?</label>
                    <div class="row input">
                        <div class="col-sm-6 col-12">
                            <div class="switch-wrap d-flex align-items-center justify-content-start mb-0">
                                <div class="primary-radio">
                                    <input class="form-check-input" type="radio" name="infaqyn" id="infaqyes" value="Ya">
                                    <label for="infaqyes"></label>
                                </div>
                                <label for="infaqyes" class="ml-3">Ya</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="switch-wrap d-flex align-items-center justify-content-start mb-0">
                                <div class="primary-radio">
                                    <input class="form-check-input" type="radio" name="infaqyn" id="infaqno" value="Tidak">
                                    <label for="infaqno"></label>
                                </div>
                                <label for="infaqno" class="ml-3">Tidak</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3" id="amma-register-response">

                </div>

                <div class="mb-3">
                    <input type="submit" class="button button-infaqForm boxed-btn" value="KIRIM">
                </div>
            </div>
        </div>


    </form>

</section>
@endsection

@section('script')
<script src="{{ asset('js/page/form-response-amma.js') }}"></script>
@endsection