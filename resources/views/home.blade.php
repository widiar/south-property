@extends('template.master')

@section('content')
<!--/ Carousel Star /-->
<div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
        @foreach ($banners as $banner)
        <div class="carousel-item-a intro-item bg-image" style="background-image: url({{ Storage::url('banner/') . $banner->foto }})">
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="intro-body">
                                    <p class="intro-title-top">
                                        South Property Bali
                                    </p>
                                    <h1 class="intro-title mb-4">
                                        <span class="color-b">{{ explode(' ', $banner->title, 2)[0] }}</span>
                                        {{ explode(' ', $banner->title, 2)[1] ?? '' }}
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
</div>
<!--/ Carousel end /-->


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
                        <a href="{{ route('properties') }}">All Property
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
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Services End /-->


@endsection
