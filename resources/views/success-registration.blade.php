@extends('app')

@section('content')
<section class="slider-area slider-area2">
    <div class="slider-active">
        <div class="single-slider slider-height2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-11 col-md-12">
                        <div class="hero__caption hero__caption2">
                            <h1 class="text-center mb-2" data-animation="bounceIn" data-delay="0.2s">
                                {{ $title }}
                            </h1>
                            <p class="text-center" data-animation="bounceIn" data-delay="0.4s">{{ $desc }}</p>

                            <div class="row justify-content-center pb-5 mb-5">
                                <div class="col-xl-12">
                                    <div class="section-tittle text-center mt-20">
                                        <a href="{{ route('home') }}" class="btn btn3">Beranda</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection