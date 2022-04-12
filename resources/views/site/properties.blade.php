@extends('template.master')

@section('content')

<!--/ Intro Single star /-->
<section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">{{ $title }}</h1>
            <span class="color-text-a">South Properties</span>
          </div>
        </div>
      </div>
    </div>
</section>
<!--/ Intro Single End /-->

<!--/ Property Grid Star /-->
@php
    $lang = App::getLocale();
@endphp
<section class="property-grid grid">
    <div class="container">
        <form action="" method="GET">
            <div class="form-group">
                <div class="input-group mb-3">
                    <input type="text" value="{{ Request::get('search') }}" class="form-control" name="search" placeholder="Keyword" aria-label="Keyword">
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            @foreach ($properties as $property)
                
            <div class="col-md-4">
                <div class="card-box-a card-shadow">
                    <div class="img-box-a">
                        <img src="{{ Storage::url('properties/image/') . $property->images[0]->name }}" alt="" class="img-a img-fluid" style="height: 400px;object-fit: cover;
                            object-position: center;">
                    </div>
                    <div class="card-overlay">
                        <div class="card-overlay-a-content">
                            <div class="card-header-a">
                                <h2 class="card-title-a">
                                    @if($lang == 'id')
                                    <a class="porperty-link" href="{{ route('property', [$property->id]) }}">{{ $property->nama }}</a>
                                    @else
                                    <a class="porperty-link" href="{{ route('property', [$property->id]) }}">{{ $property->title_en }}</a>
                                    @endif
                                </h2>
                            </div>
                            <div class="card-body-a">
                                <div class="price-box d-flex">
                                    <span class="price-a">Rp {{ number_format($property->harga, '0', '.', '.') }}</span>
                                </div>
                                <a href="{{ route('property', [$property->id]) }}" class="link-a">{{ __('site.home.text-2') }}
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
        <div class="row">
            <div class="col-sm-12">
                {{ $properties->links() }}
            </div>
        </div>
    </div>
</section>
<!--/ Property Grid End /-->

@if(session('msg'))
<small class="msg" style="display: none">{{ session('msg') }}</small>
@endif
@endsection

