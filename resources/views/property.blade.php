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
                            <img src="{{ Storage::url('properties/image/') . $image->name }}" alt="" style="height: 900px; object-fit: cover;object-position: center;">
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
                                @if($property->tipe == 'Tanah')
                                <div class="card-title-c align-self-center">
                                    <h5 class="title-c">{{ number_format($property->harga_satuan, '0', '.', '.') }}</h5>
                                    <h5>/ are</h5>
                                </div>
                                @else
                                <div class="card-title-c align-self-center">
                                    <h5 class="title-c">{{ number_format($property->harga, '0', '.', '.') }}</h5>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="property-summary">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="title-box-d section-t4">
                                        <h3 class="title-d">{{ __('site.property.ringkasan') }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="summary-list">
                                <ul class="list">
                                    <li class="d-flex justify-content-between">
                                        <strong>Location:</strong>
                                        <span><a href="https://maps.google.com/maps?q={{ $property->location->latlng }}&z=16" target="_blank" rel="noopener noreferrer">
                                            {{ $property->location->area . ", " . $property->location->kelurahan }}
                                        </a></span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>{{ __('site.property.tipe') }}:</strong>
                                        <span>{{ $property->sub_tipe ?? 'Tanah' }}</span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>{{ __('site.property.harga') }}:</strong>
                                        <span>{{ number_format($property->harga, '0', '.', '.') }}</span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>Status:</strong>
                                        <span>
                                            @if($property->is_sold == 1)
                                                {{ __('site.property.sold') }}
                                            @else
                                                {{ __('site.property.sale') }}
                                            @endif
                                        </span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>{{ __('site.property.luas-tanah') }} :</strong>
                                        <span>{{ $property->luas }}m<sup>2</sup></span>
                                    </li>
                                    @if($property->tipe == 'Tanah')
                                    <li class="d-flex justify-content-between">
                                        <strong>{{ __('site.property.lebar_depan') }}:</strong>
                                        <span>{{ $property->lebar }}m</span>
                                    </li>
                                    @else
                                    <li class="d-flex justify-content-between">
                                        <strong>{{ __('site.property.luas-bangunan') }} :</strong>
                                        <span>{{ $property->luas_bangunan }}m<sup>2</sup></span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>{{ __('site.property.jumlah_lantai') }}:</strong>
                                        <span>{{ $property->lantai }} {{ __('site.property.lantai') }}</span>
                                    </li>
                                    @if($property->kamar_mandi > 0)
                                    <li class="d-flex justify-content-between">
                                        <strong>{{ __('site.property.kamar_mandi') }}:</strong>
                                        <span>{{ $property->kamar_mandi }}</span>
                                    </li>
                                    @endif
                                    @if($property->kamar_tidur > 0)
                                    <li class="d-flex justify-content-between">
                                        <strong>{{ __('site.property.kamar_tidur') }}:</strong>
                                        <span>{{ $property->kamar_tidur }}</span>
                                    </li>
                                    @endif
                                    @if($property->kamar_pegawai > 0)
                                    <li class="d-flex justify-content-between">
                                        <strong>{{ __('site.property.kamar_pegawai') }}:</strong>
                                        <span>{{ $property->kamar_pegawai }}</span>
                                    </li>
                                    @endif
                                    @if($property->kamar_mandi_pegawai > 0)
                                    <li class="d-flex justify-content-between">
                                        <strong>{{ __('site.property.kamar_mandi_pegawai') }}:</strong>
                                        <span>{{ $property->kamar_mandi_pegawai }}</span>
                                    </li>
                                    @endif
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-7 section-md-t3">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="title-box-d">
                                    <h3 class="title-d">{{ __('site.property.deskripsi') }}</h3>
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
                                    <h3 class="title-d">{{ $property->tipe == 'Tanah' ?__('site.property.sertifikat') : __('site.property.fasilitas') }}</h3>
                                </div>
                            </div>
                        </div>
                        @if($property->tipe == 'Tanah')
                        <div class="amenities-list row color-text-a">
                            @foreach ($property->certificates as $certificate)
                            <div class="col-md-6 mb-3">
                                <a href="{{ Storage::url('properties/certificates/') . $certificate->file }}" style="text-decoration:none;color:inherit;" target="_blank">
                                    <div class="card">
                                        <div class="card-body">
                                            <img src="https://ik.imagekit.io/prbydmwbm8c/pdf_fQHgq0p6H.png?ik-sdk-version=javascript-1.4.3" style="width: 50px; height: 50px;" class="card-img-top" style="display: inline">
                                            <small align="center">{{ $certificate->name }}</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <div class="amenities-list color-text-a">
                            <ul class="list-a no-margin">
                                @foreach (json_decode($property->fasilitas) as $fasilitas)
                                    <li>{{ $fasilitas }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-10 offset-md-1">
                <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-location-tab" data-toggle="pill" href="#pills-location" role="tab"
                        aria-controls="pills-location" aria-selected="true">{{ __('site.property.lokasi') }}</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-location" role="tabpanel" aria-labelledby="pills-location-tab">
                        <iframe 
                            width="100%" 
                            height="450" 
                            frameborder="0"
                            loading="lazy"
                            src="https://maps.google.com/maps?q={{ $property->location->latlng }}&z=16&amp;output=embed"
                            >
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
        {{-- <a href="https://wa.me/6283189871080?text={{ $pesan }}">
            <button @if($property->is_sold) disabled title="Property sudah terjual" @endif class="btn btn-primary btn-block mt-4">Pesan Sekarang</button>
        </a> --}}
        <button @if($property->is_sold) disabled title="Property sudah terjual" @endif data-toggle="modal" data-target="#bayarModal" class="btn btn-primary btn-block mt-4">{{ __('site.property.pesan') }}</button>
    </div>
</section>
<!--/ Property Single End /-->

<div class="modal fade" id="bayarModal" tabindex="-1" role="dialog" aria-labelledby="pembayaranModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="pembayaranModal">Detail</h3>
            </div>
            <form action="{{ route('book.property', $property->id) }}" method="POST" id="form-pemesanan">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">{{ __('site.pesanan.nama') }}</label>
                        <input type="text" class="form-control" name="nama"
                            placeholder="{{ __('site.pesanan.masukan') }} {{ __('site.pesanan.nama') }}" value="{{ @$user->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="telp">{{ __('site.pesanan.telepon') }}</label>
                        <input type="text" class="form-control" name="telp" placeholder="{{ __('site.pesanan.masukan') }} {{ __('site.pesanan.telepon') }}"
                            value="{{ @$user->nik }}">
                        <small class="text-info"><i>*{{ __('site.pesanan.info_hp') }}</i></small><br>
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('site.pesanan.email') }}</label>
                        <input type="email" class="form-control" name="email"
                            placeholder="{{ __('site.pesanan.masukan') }} Email" value="{{ @$user->nama }}">
                        <small class="text-info"><i>*{{ __('site.pesanan.info_email') }}</i></small><br>
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('site.pesanan.gender') }}</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="" selected disabled>{{ __('site.pesanan.gender') }}</option>
                            <option value="Laki-Laki">{{ __('site.pesanan.laki') }}</option>
                            <option value="Perempuan">{{ __('site.pesanan.perempuan') }}</option>
                        </select>
                    </div>
                    {{-- @if($property->tipe == 'Tanah')
                    <div class="form-group">
                        <label for="tanah">Tanah (are)</label>
                        <input type="number" required class="form-control" name="jumlah" placeholder="Masukkan Jumlah">
                    </div>
                    @endif --}}
                    <input type="hidden" name="jumlahhari" id="hari">
                    <input type="hidden" id="harga" value="{{ $property->harga }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('site.pesanan.tutup') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('site.pesanan.pesan') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if(session('msg'))
<small class="msg" style="display: none">{{ session('msg') }}</small>
@endif
@endsection

@section('script')
<script>
    let isReload = (
    (window.performance.navigation && window.performance.navigation.type === 1) ||
        window.performance
        .getEntriesByType('navigation')
        .map((nav) => nav.type)
        .includes('reload')
    );
    if (isReload == false) {
        $.ajax({
            url: `{{ route('property.view', $property->id) }}`,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                console.log(data);
            }
        });
    }

    $(document).ready(function() {
        let msg = $('.msg').text();
        if (msg != '') {
            Swal.fire({
                title: 'Sukses',
                text: msg,
                icon: 'success'
            });
        }
    });

    // jquery validation make validation for handphone number Indonesia
    $.validator.addMethod('phone', function(value, element) {
        return this.optional(element) || /^(62)[0-9]{8,}$/.test(value);
    }, `{{ __('site.pesanan.valid_hp') }}`);

    $('#form-pemesanan').validate({
        rules: {
            nama: 'required',
            telp: {
                required: true,
                phone: true
            },
            email: {
                required: true,
                email: true
            },
            jenis_kelamin: 'required',
        },
        submitHandler: (form, e) => {
            e.preventDefault();
            $.ajax({
                url: $(form).attr('action'),
                type: 'POST',
                data: $(form).serialize(),
                success: (data) => {
                    if (data.status == 'success') {
                        Swal.fire({
                            title: 'Success',
                            text: data.msg,
                            icon: 'success'
                        }).then((result) => {
                            if (result.isConfirmed) window.location.reload()
                        });
                    }
                },
                error: (res) => {
                    console.log(res.ResponseJSON);
                }
            })
        }
    })
</script>
@endsection
