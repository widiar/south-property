@extends('template.master')

@section('content')
<!--/ Carousel Star /-->
<div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
        <div class="carousel-item-a intro-item bg-image" style="background-image: url({{ asset('img/slide-1.jpg') }})">
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="intro-body">
                                    <p class="intro-title-top">
                                        Doral, Florida
                                        <br> 78345
                                    </p>
                                    <h1 class="intro-title mb-4">
                                        <span class="color-b">204 </span> Mount
                                        <br> Olive Road Two
                                    </h1>
                                    <p class="intro-subtitle intro-price">
                                        <a href="#"><span class="price-a">rent | $ 12.000</span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item-a intro-item bg-image" style="background-image: url({{ asset('img/slide-2.jpg') }})">
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="intro-body">
                                    <p class="intro-title-top">
                                        Doral, Florida
                                        <br> 78345
                                    </p>
                                    <h1 class="intro-title mb-4">
                                        <span class="color-b">204 </span> Mount
                                        <br> Olive Road Two
                                    </h1>
                                    <p class="intro-subtitle intro-price">
                                        <a href="#"><span class="price-a">rent | $ 12.000</span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item-a intro-item bg-image" style="background-image: url({{ asset('img/slide-3.jpg') }})">
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="intro-body">
                                    <p class="intro-title-top">
                                        Doral, Florida
                                        <br> 78345
                                    </p>
                                    <h1 class="intro-title mb-4">
                                        <span class="color-b">204 </span> Mount
                                        <br> Olive Road Two
                                    </h1>
                                    <p class="intro-subtitle intro-price">
                                        <a href="#"><span class="price-a">rent | $ 12.000</span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Carousel end /-->

<!--/ Services Star /-->
<section class="section-services section-t8">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-wrap d-flex justify-content-between">
                    <div class="title-box">
                        <h2 class="title-a">Our Services</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card-box-c foo">
                    <div class="card-header-c d-flex">
                        <div class="card-box-ico">
                            <span class="fa fa-gamepad"></span>
                        </div>
                        <div class="card-title-c align-self-center">
                            <h2 class="title-c">Lifestyle</h2>
                        </div>
                    </div>
                    <div class="card-body-c">
                        <p class="content-c">
                        Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa,
                        convallis a pellentesque
                        nec, egestas non nisi.
                        </p>
                    </div>
                    <div class="card-footer-c">
                        <a href="#" class="link-c link-icon">Read more
                        <span class="ion-ios-arrow-forward"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-box-c foo">
                    <div class="card-header-c d-flex">
                        <div class="card-box-ico">
                            <span class="fa fa-usd"></span>
                        </div>
                        <div class="card-title-c align-self-center">
                            <h2 class="title-c">Loans</h2>
                        </div>
                    </div>
                    <div class="card-body-c">
                        <p class="content-c">
                        Nulla porttitor accumsan tincidunt. Curabitur aliquet quam id dui posuere blandit. Mauris blandit
                        aliquet elit, eget tincidunt
                        nibh pulvinar a.
                        </p>
                    </div>
                    <div class="card-footer-c">
                        <a href="#" class="link-c link-icon">Read more
                        <span class="ion-ios-arrow-forward"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-box-c foo">
                    <div class="card-header-c d-flex">
                        <div class="card-box-ico">
                            <span class="fa fa-home"></span>
                        </div>
                        <div class="card-title-c align-self-center">
                            <h2 class="title-c">Sell</h2>
                        </div>
                    </div>
                    <div class="card-body-c">
                        <p class="content-c">
                        Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa,
                        convallis a pellentesque
                        nec, egestas non nisi.
                        </p>
                    </div>
                    <div class="card-footer-c">
                        <a href="#" class="link-c link-icon">Read more
                        <span class="ion-ios-arrow-forward"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Services End /-->

<!--/ Property Star /-->
<section class="section-property section-t8">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-wrap d-flex justify-content-between">
                    <div class="title-box">
                        <h2 class="title-a">Most Viewed Properties</h2>
                    </div>
                    <div class="title-link">
                        <a href="property-grid.html">All Property
                            <span class="ion-ios-arrow-forward"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="property-carousel" class="owl-carousel owl-theme">
            @foreach ($properties as $property)
                <div class="carousel-item-b">
                    <div class="card-box-a card-shadow">
                        <div class="img-box-a">
                            <img src="{{ Storage::url('properties/image/') . $property->images[0]->name }}" alt="" class="img-a img-fluid" style="height: 400px;object-fit: cover;
                            object-position: center;">
                        </div>
                        <div class="card-overlay">
                            <div class="card-overlay-a-content">
                                <div class="card-header-a">
                                    <h2 class="card-title-a">
                                    <a class="porperty-link" href="{{ route('property', [$property->id]) }}">{{ $property->nama }}</a>
                                    </h2>
                                </div>
                                <div class="card-body-a">
                                    <div class="price-box d-flex">
                                        <span class="price-a">Rp {{ number_format($property->harga, '0', '.', '.') }}</span>
                                    </div>
                                    <a href="{{ route('property', [$property->id]) }}" class="link-a property-link">Click here to view
                                        <span class="ion-ios-arrow-forward"></span>
                                    </a>
                                </div>
                                <div class="card-footer-a">
                                    <ul class="card-info d-flex justify-content-around">
                                        <li>
                                            <h4 class="card-info-title">Luas</h4>
                                            <span>{{ $property->luas }}m<sup>2</sup></span>
                                        </li>
                                        <li>
                                            <h4 class="card-info-title">Tipe</h4>
                                            <span>{{ $property->tipe }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--/ Property End /-->

<!--/ Agents Star /-->
<section class="section-agents section-t8">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-wrap d-flex justify-content-between">
                    <div class="title-box">
                        <h2 class="title-a">Best Agents</h2>
                    </div>
                    <div class="title-link">
                        <a href="agents-grid.html">All Agents
                        <span class="ion-ios-arrow-forward"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card-box-d">
                    <div class="card-img-d">
                        <img src="{{ asset('img/agent-4.jpg') }}" alt="" class="img-d img-fluid">
                    </div>
                    <div class="card-overlay card-overlay-hover">
                        <div class="card-header-d">
                            <div class="card-title-d align-self-center">
                                <h3 class="title-d">
                                    <a href="agent-single.html" class="link-two">Margaret Sotillo
                                    <br> Escala</a>
                                </h3>
                            </div>
                        </div>
                        <div class="card-body-d">
                            <p class="content-d color-text-a">
                                Sed porttitor lectus nibh, Cras ultricies ligula sed magna dictum porta two.
                            </p>
                            <div class="info-agents color-a">
                                <p><strong>Phone: </strong> +54 356 945234</p>
                                <p><strong>Email: </strong> agents@example.com</p>
                            </div>
                        </div>
                        <div class="card-footer-d">
                            <div class="socials-footer d-flex justify-content-center">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="#" class="link-one">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="link-one">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="link-one">
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="link-one">
                                            <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="link-one">
                                            <i class="fa fa-dribbble" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-box-d">
                    <div class="card-img-d">
                        <img src="{{ asset('img/agent-5.jpg') }}" alt="" class="img-d img-fluid">
                    </div>
                    <div class="card-overlay card-overlay-hover">
                        <div class="card-header-d">
                            <div class="card-title-d align-self-center">
                                <h3 class="title-d">
                                    <a href="agent-single.html" class="link-two">Margaret Sotillo
                                    <br> Escala</a>
                                </h3>
                            </div>
                        </div>
                        <div class="card-body-d">
                            <p class="content-d color-text-a">
                                Sed porttitor lectus nibh, Cras ultricies ligula sed magna dictum porta two.
                            </p>
                            <div class="info-agents color-a">
                                <p><strong>Phone: </strong> +54 356 945234</p>
                                <p><strong>Email: </strong> agents@example.com</p>
                            </div>
                        </div>
                        <div class="card-footer-d">
                            <div class="socials-footer d-flex justify-content-center">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="#" class="link-one">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="link-one">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="link-one">
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="link-one">
                                            <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="link-one">
                                            <i class="fa fa-dribbble" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Agents End /-->

@endsection
