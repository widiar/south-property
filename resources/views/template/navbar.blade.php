<div class="click-closed"></div>

<!--/ Form Search Star /-->
<div class="box-collapse">
    <div class="title-box-d">
        <h3 class="title-d">Search Property</h3>
    </div>
    <span class="close-box-collapse right-boxed ion-ios-close"></span>
    <div class="box-collapse-wrap form">
        <form class="form-a">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="form-group">
                        <label for="Type">Keyword</label>
                        <input type="text" class="form-control form-control-lg form-control-a" placeholder="Keyword">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="Type">Type</label>
                        <select class="form-control form-control-lg form-control-a" id="Type">
                            <option>All Type</option>
                            <option>For Rent</option>
                            <option>For Sale</option>
                            <option>Open House</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="city">City</label>
                        <select class="form-control form-control-lg form-control-a" id="city">
                            <option>All City</option>
                            <option>Alabama</option>
                            <option>Arizona</option>
                            <option>California</option>
                            <option>Colorado</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="bedrooms">Bedrooms</label>
                        <select class="form-control form-control-lg form-control-a" id="bedrooms">
                            <option>Any</option>
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="garages">Garages</label>
                        <select class="form-control form-control-lg form-control-a" id="garages">
                            <option>Any</option>
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                            <option>04</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="bathrooms">Bathrooms</label>
                        <select class="form-control form-control-lg form-control-a" id="bathrooms">
                            <option>Any</option>
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="price">Min Price</label>
                        <select class="form-control form-control-lg form-control-a" id="price">
                            <option>Unlimite</option>
                            <option>$50,000</option>
                            <option>$100,000</option>
                            <option>$150,000</option>
                            <option>$200,000</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-b">Search Property</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--/ Form Search End /-->

<!--/ Nav Star /-->
<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
            aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        {{-- <a class="navbar-brand text-brand" href="{{ route('home') }}">South<span class="color-b">Property</span></a> --}}
        <a class="navbar-brand text-brand" href="{{ route('home') }}">
            <img src="{{ asset('img/logo-white.png') }}" style="width: 100%; height: 50px;" alt="">
        </a>
        <div></div>
        <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{request()->is('/') ? ' active' : '' }}" href="{{ route('home') }}">{{ __('site.navbar.home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{request()->is('properties') || request()->is('property*') ? ' active' : '' }}" href="{{ route('properties') }}">{{ __('site.navbar.property') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{request()->is('contact') ? ' active' : '' }}" href="{{ route('contact') }}">{{ __('site.navbar.contact') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{request()->is('about') ? ' active' : '' }}" href="{{ route('about') }}">{{ __('site.navbar.about') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(app()->getLocale() == 'id')
                            <img class="img-center" src="{{ asset('img/id.jpg') }}" width="30px" height="20px" alt=""> ID
                        @else
                            <img class="img-center" src="{{ asset('img/en.webp') }}" width="30px" height="20px" alt=""> EN
                        @endif
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('language', 'id') }}"><img class="img-center" src="{{ asset('img/id.jpg') }}" width="30px" height="20px" alt=""> ID</a>
                      <a class="dropdown-item" href="{{ route('language', 'en') }}"><img class="img-center" src="{{ asset('img/en.webp') }}" width="30px" height="20px" alt=""> EN</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--/ Nav End /-->