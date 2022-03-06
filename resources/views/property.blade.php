@extends('template.master')

@section('content')

<!--/ Intro Single star /-->
<section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">{{ $property->nama }}</h1>
          </div>
        </div>
      </div>
    </div>
</section>
  <!--/ Intro Single End /-->

<!--/ Property Single Star /-->
<section class="property-single nav-arrow-b">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
                    @foreach ($property->images as $image)
                        <div class="carousel-item-b">
                            <img src="{{ Storage::url('properties/image/') . $image->name }}" alt="">
                        </div>
                    @endforeach
                </div>
                <div class="row justify-content-between">
                    <div class="col-md-5 col-lg-4">
                        <div class="property-price d-flex justify-content-center foo">
                            <div class="card-header-c d-flex">
                                <div class="card-box-ico">
                                    <span class="ion-money">Rp</span>
                                </div>
                                <div class="card-title-c align-self-center">
                                    <h5 class="title-c">{{ number_format($property->harga, '0', '.', '.') }}</h5>
                                    <h5 style="display: {{ $property->tipe == 'Bangunan' ? 'none': 'block' }}">/ are</h5>
                                </div>
                            </div>
                        </div>
                        <div class="property-summary">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="title-box-d section-t4">
                                        <h3 class="title-d">Quick Summary</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="summary-list">
                                <ul class="list">
                                    <li class="d-flex justify-content-between">
                                        <strong>Location:</strong>
                                        <span><a href="https://maps.google.com/maps?q={{ explode('|', $property->lokasi)[1] }}&z=16" target="_blank" rel="noopener noreferrer">{{ explode('|', $property->lokasi)[0] }}</a></span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>Property Type:</strong>
                                        <span>{{ $property->tipe }}</span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>Status:</strong>
                                        <span>Sale</span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>Luas:</strong>
                                        <span>{{ $property->luas }}m<sup>2</sup></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-7 section-md-t3">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="title-box-d">
                                    <h3 class="title-d">Property Description</h3>
                                </div>
                            </div>
                        </div>
                        <div class="property-description">
                            <p class="description color-text-a">
                                {!! nl2br($property->deskripsi) !!}
                            </p>
                        </div>
                        <div class="row section-t3">
                            <div class="col-sm-12">
                                <div class="title-box-d">
                                    <h3 class="title-d">Fasilitas</h3>
                                </div>
                            </div>
                        </div>
                        <div class="amenities-list color-text-a">
                            <ul class="list-a no-margin">
                                @foreach (explode('|', $property->fasilitas) as $fasilitas)
                                    <li>{{ $fasilitas }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10 offset-md-1">
                <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-location-tab" data-toggle="pill" href="#pills-location" role="tab"
                        aria-controls="pills-location" aria-selected="true">Location</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-location" role="tabpanel" aria-labelledby="pills-location-tab">
                        <iframe 
                            width="100%" 
                            height="450" 
                            frameborder="0"
                            loading="lazy"
                            src="https://maps.google.com/maps?q={{ explode('|', $property->lokasi)[1] }}&z=16&amp;output=embed"
                            >
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary btn-block mt-4">Pesan Sekarang</button>
    </div>
</section>
<!--/ Property Single End /-->

@endsection

@section('script')
<script>
    const isReload = (
    (window.performance.navigation && window.performance.navigation.type === 1) ||
        window.performance
        .getEntriesByType('navigation')
        .map((nav) => nav.type)
        .includes('reload')
    );
    if (isReload == false) {
        console.log('not reload');
    }
</script>
@endsection
