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

<!--/ Services Star /-->
<section class="section-services section-t8">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-wrap d-flex justify-content-between">
                    <div class="title-box">
                        <h2 class="title-a">{{ __('site.home.title-1') }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link link-tipe active" data-value="Rumah" id="rumah-tab" data-toggle="tab" href="#rumah" role="tab" aria-controls="rumah" aria-selected="true">{{ __('site.rumah') }}</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link link-tipe" data-value="Tanah" id="tanah-tab" data-toggle="tab" href="#tanah" role="tab" aria-controls="tanah" aria-selected="false">{{ __('site.tanah') }}</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link link-tipe" data-value="Komersial" id="komersil-tab" data-toggle="tab" href="#komersil" role="tab" aria-controls="komersil" aria-selected="false">{{ __('site.komersial') }}</a>
            </li>
          </ul>
          <div class="tab-content mt-4" id="myTabContent">
            <div class="row">
                <div class="col-md-2 col-cek">
                    <button class="btn btn-primary rounded-btn active" value="populer">{{ __('site.popular') }}</button>
                </div>
                <div class="col-md-2 col-cek">
                    <button class="btn btn-primary rounded-btn" value="jenis">{{ __('site.jenis') }}</button>
                </div>
                <div class="col-md-2 col-cek">
                    <button class="btn btn-primary rounded-btn" value="lokasi">{{ __('site.lokasi') }}</button>
                </div>
            </div>
            <div class="tab-pane fade show active mt-4" id="rumah" role="tabpanel" aria-labelledby="rumah-tab">
                <div class="populer">
                </div>
                <div class="jenis" style="display: none">
                    <button type="button" class="btn btn-outline-success m-4 btn-jenis" value="Rumah">{{ __('site.rumah') }}</button>
                    <button type="button" class="btn btn-outline-success m-4 btn-jenis" value="Rumah Kosan">{{ __('site.rumah-kosan') }}</button>
                    <button type="button" class="btn btn-outline-success m-4 btn-jenis" value="Villa atau Guest House">{{ __('site.villa-atau-guest-house') }}</button>
                </div>
                <div class="lokasi" style="display: none">
                    @foreach ($lokasiRumah as $item)
                    <button type="button" class="btn btn-outline-success m-4 btn-lokasi" value="{{ $item }}">{{ $item }}</button>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade mt-4" id="tanah" role="tabpanel" aria-labelledby="tanah-tab">
                <div class="populer">
                </div>
                <div class="jenis" style="display: none">
                    <button type="button" class="btn btn-outline-success m-4 btn-jenis" value="Tanah">{{ __('site.tanah') }}</button>
                </div>
                <div class="lokasi" style="display: none">
                    @foreach ($lokasiTanah as $item)
                    <button type="button" class="btn btn-outline-success m-4 btn-lokasi" value="{{ $item }}">{{ $item }}</button>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade mt-4" id="komersil" role="tabpanel" aria-labelledby="komersil-tab">
                <div class="populer">
                </div>
                <div class="jenis" style="display: none">
                    <button type="button" class="btn btn-outline-success m-4 btn-jenis" value="Ruko">{{ __('site.ruko') }}</button>
                    <button type="button" class="btn btn-outline-success m-4 btn-jenis" value="Kantor">{{ __('site.kantor') }}</button>
                    <button type="button" class="btn btn-outline-success m-4 btn-jenis" value="Gudang">{{ __('site.gudang') }}</button>
                </div>
                <div class="lokasi" style="display: none">
                    @foreach ($lokasiKomersil as $item)
                    <button type="button" class="btn btn-outline-success m-4 btn-lokasi" value="{{ $item }}">{{ $item }}</button>
                    @endforeach
                </div>
            </div>
            <div class="text-center">
                <button class="mt-3 btn btn-success btn-circle btn-lg btn-search"><i class="fa fa-search"></i></button>
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
                        <h2 class="title-a">{{ __('site.home.title-2') }}</h2>
                    </div>
                    <div class="title-link">
                        <a href="{{ route('properties') }}">{{ __('site.home.text-1') }}
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
                                    <a href="{{ route('property', [$property->id]) }}" class="link-a property-link">{{ __('site.home.text-2') }}
                                        <span class="ion-ios-arrow-forward"></span>
                                    </a>
                                </div>
                                <div class="card-footer-a">
                                    <ul class="card-info d-flex justify-content-around">
                                        <li>
                                            <h4 class="card-info-title">{{ __('site.property.luas-tanah') }}</h4>
                                            <span>{{ $property->luas }}m<sup>2</sup></span>
                                        </li>
                                        <li>
                                            <h4 class="card-info-title">{{ __('site.home.text-3') }}</h4>
                                            @if($property->tipe == 'Tanah')
                                            <span>{{ __('site.tanah') }}</span>
                                            @elseif($property->tipe == 'Rumah')
                                            <span>{{ __('site.house') }}</span>
                                            @elseif($property->tipe == 'Komersial')
                                            <span>{{ __('site.komersial') }}</span>
                                            @endif
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

@endsection

@section('script')
<script>
    $('.rounded-btn').click(function(e){
        $('.rounded-btn').removeClass('active');
        $(this).addClass('active');
        let value = $(this).val();
        if(value == 'populer'){
            $('.populer').show();
            $('.jenis').hide();
            $('.lokasi').hide();
        }else if(value == 'jenis'){
            $('.populer').hide();
            $('.jenis').show();
            $('.lokasi').hide();
        }else if(value == 'lokasi'){
            $('.populer').hide();
            $('.jenis').hide();
            $('.lokasi').show();
        }
    })

    $('.btn-jenis').click(function(e){
        $('.btn-jenis').removeClass('active')
        $(this).addClass('active')
    })

    $('.btn-lokasi').click(function(e){
        $('.btn-lokasi').removeClass('active')
        $(this).addClass('active')
    })

    $('.btn-search').click(function(e){
        let tipeAwal = $('.link-tipe.active').data('value')
        let tipe = $('.rounded-btn.active').val();

        if(tipe == 'populer') {
            let urlPopular = `{{ route('properties.popular', ['tipe' => '#tipeAwal']) }}`
            urlPopular = urlPopular.replace('#tipeAwal', tipeAwal)
            window.location.href = urlPopular
        }else {
            let jenis = $('.btn-jenis.active').val();
            let lokasi = $('.btn-lokasi.active').val();
    
            let url = `{{ route('properties.tipe', ['prop' => '#tipeawal', 'tipe' => '#tipe', 'subTipe' => '#subTipe']) }}`;
            url = url.replace('#tipeawal', tipeAwal);
            let ceklink = false
            if(jenis != undefined){
                url = url.replace('#tipe', tipe);
                url = url.replace('#subTipe', convertToSlug(jenis));
                ceklink = true
            }
            if(lokasi != undefined){
                url = url.replace('#tipe', tipe);
                url = url.replace('#subTipe', convertToSlug(lokasi));
                ceklink = true
                console.log(url)
            }
            if(ceklink) window.location.href = url;
        }

    })
</script>
@endsection
