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
                        <h2 class="title-a">Jelajahi Properti</h2>
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link link-tipe active" data-value="Rumah" id="rumah-tab" data-toggle="tab" href="#rumah" role="tab" aria-controls="rumah" aria-selected="true">Rumah</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link link-tipe" data-value="Tanah" id="tanah-tab" data-toggle="tab" href="#tanah" role="tab" aria-controls="tanah" aria-selected="false">Tanah</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link link-tipe" data-value="Komersial" id="komersil-tab" data-toggle="tab" href="#komersil" role="tab" aria-controls="komersil" aria-selected="false">Komersial</a>
            </li>
          </ul>
          <div class="tab-content mt-4" id="myTabContent">
            <div class="row">
                <div class="col-md-2 col-cek">
                    <button class="btn btn-primary rounded-btn active" value="populer">Populer</button>
                </div>
                <div class="col-md-2 col-cek">
                    <button class="btn btn-primary rounded-btn" value="jenis">Jenis</button>
                </div>
                <div class="col-md-2 col-cek">
                    <button class="btn btn-primary rounded-btn" value="lokasi">Lokasi</button>
                </div>
            </div>
            <div class="tab-pane fade show active mt-4" id="rumah" role="tabpanel" aria-labelledby="rumah-tab">
                <div class="populer">
                </div>
                <div class="jenis" style="display: none">
                    <button type="button" class="btn btn-outline-success m-4 btn-jenis" value="Rumah">Rumah</button>
                    <button type="button" class="btn btn-outline-success m-4 btn-jenis" value="Rumah Kosan">Rumah Kosan</button>
                    <button type="button" class="btn btn-outline-success m-4 btn-jenis" value="Villa atau Guest House">Villa atau Guest House</button>
                </div>
                <div class="lokasi" style="display: none">
                    @foreach ($lokasiRumah as $item)
                    <button type="button" class="btn btn-outline-success m-4 btn-lokasi" value="{{ $item->location->kecamatan }}">{{ $item->location->kecamatan }}</button>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade mt-4" id="tanah" role="tabpanel" aria-labelledby="tanah-tab">
                <div class="populer">
                </div>
                <div class="jenis" style="display: none">
                    <button type="button" class="btn btn-outline-success m-4 btn-jenis" value="Tanah">Tanah</button>
                </div>
                <div class="lokasi" style="display: none">
                    @foreach ($lokasiTanah as $item)
                    <button type="button" class="btn btn-outline-success m-4 btn-lokasi" value="{{ $item->location->kecamatan }}">{{ $item->location->kecamatan }}</button>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade mt-4" id="komersil" role="tabpanel" aria-labelledby="komersil-tab">
                <div class="populer">
                </div>
                <div class="jenis" style="display: none">
                    <button type="button" class="btn btn-outline-success m-4 btn-jenis" value="Ruko">Ruko</button>
                    <button type="button" class="btn btn-outline-success m-4 btn-jenis" value="Kantor">Kantor</button>
                    <button type="button" class="btn btn-outline-success m-4 btn-jenis" value="Gudang">Gudang</button>
                </div>
                <div class="lokasi" style="display: none">
                    @foreach ($lokasiKomersil as $item)
                    <button type="button" class="btn btn-outline-success m-4 btn-lokasi" value="{{ $item->location->kecamatan }}">{{ $item->location->kecamatan }}</button>
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
