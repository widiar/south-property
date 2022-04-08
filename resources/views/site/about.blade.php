@extends('template.master')

@section('content')
<!--/ Intro Single star /-->
<section class="intro-single">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="title-single-box">
                    <h1 class="title-single">South Property Bali</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Intro Single End /-->

<!--/ About Star /-->
<section class="section-about">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="about-img-box">
                    <img src="img/slide-about-1.jpg" alt="" class="img-fluid">
                </div>
                <div class="sinse-box">
                    <h3 class="sinse-title">South Property
                        <span></span>
                        <br> Since 2016</h3>
                </div>
            </div>
            <div class="col-md-12 section-t8">
                <div class="row">
                    <div class="col-md-12 section-md-t3">
                        <div class="title-box-d">
                            <h3 class="title-d">South
                                <span class="color-b">Property</span> Bali
                            </h3>
                        </div>
                        <p class="color-text-a">
                            {{ __('site.about.text-1') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ About End /-->

<!--/ Team Star /-->
<section class="section-agents section-t8">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-wrap d-flex justify-content-between">
                    <div class="title-box">
                        <h2 class="title-a">{{ __('site.about.title-1') }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card-box-d">
                    <div class="card-img-d">
                        <img src="https://ik.imagekit.io/prbydmwbm8c/south-property/bagus_TY696Tswf?ik-sdk-version=javascript-1.4.3" alt="" class="img-d img-fluid">
                    </div>
                    <div class="card-overlay card-overlay-hover">
                        <div class="card-header-d">
                            <div class="card-title-d align-self-center">
                                <h3 class="title-d">
                                    <p class="link-two">I Putu Bagus Wibisana</p>
                                </h3>
                            </div>
                        </div>
                        <div class="card-body-d">
                            <p class="content-d color-text-a">
                                Mahasiswa Jurusan Sistem Informasi, Institut Teknologi dan Bisnis STIKOM Bali.
                            </p>
                            <div class="info-agents color-a">
                                <p><strong>Phone: </strong> +54 356 945234</p>
                                <p><strong>Email: </strong> mail@example.com</p>
                                <p><strong>NIM: </strong> 180030174</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-box-d">
                    <div class="card-img-d">
                        <img src="https://ik.imagekit.io/prbydmwbm8c/south-property/fandi_QUM0MBrYR?ik-sdk-version=javascript-1.4.3" alt="" class="img-d img-fluid">
                    </div>
                    <div class="card-overlay card-overlay-hover">
                        <div class="card-header-d">
                            <div class="card-title-d align-self-center">
                                <h3 class="title-d">
                                    <p class="link-two">Fandi Saidina Mulia Putra</p>
                                </h3>
                            </div>
                        </div>
                        <div class="card-body-d">
                            <p class="content-d color-text-a">
                                Mahasiswa Jurusan Sistem Informasi, Institut Teknologi dan Bisnis STIKOM Bali.
                            </p>
                            <div class="info-agents color-a">
                                <p><strong>Phone: </strong> +54 356 945234</p>
                                <p><strong>Email: </strong> mail@example.com</p>
                                <p><strong>NIM: </strong> 180030149</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Team End /-->
@endsection

