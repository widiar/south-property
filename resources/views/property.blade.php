@extends('template.master')
@section('css')
<style>
    .bank-container {
		display: flex;
		justify-content: space-evenly;
		align-items: center;
	}

	.bank-img img {
		object-fit: contain;
		object-position: center;
		width: 200px;
	}

	.img-detail {
		object-fit: cover;
		object-position: center;
		width: 100%;
		cursor: pointer;
		height: 200px;
	}

    .mobile {
        display: none;
    }

	@media screen and (max-width: 768px) {
		.img-info {
			display: none;
		}

		.total-amount {
			font-size: 26px;
		}

		.bank-img {
			margin: 0 20px;
		}

		.bank-img img {
			width: 100px;
		}

        .desktop-only {
            display: none;
        }

        .mobile {
            display: unset;
        }

        .title-mobile {
            border: 5px solid #ff9700;
            padding: 10px;
        }

        .title-box-d .title-d:after {
            width: 100%;
        }
	}

</style>
@endsection
@section('content')

@php
    $lang = App::getLocale();
@endphp

<!--/ Intro Single star /-->
<section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
              @if($lang == 'id')
            <h1 class="title-single">{{ $property->nama }}</h1>
            @else
            <h1 class="title-single">{{ $property->title_en }}</h1>
            @endif
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
                                <div class="card-box-ico desktop-only">
                                    <span class="ion-money">Rp</span>
                                </div>
                                @if($property->tipe == 'Tanah')
                                <div class="card-title-c align-self-center">
                                    <h5 class="title-c title-mobile"><span class="mobile">Rp </span>{{ number_format($property->harga_satuan, '0', '.', '.') }}</h5>
                                    <h5>/ are</h5>
                                </div>
                                @else
                                <div class="card-title-c align-self-center">
                                    <h5 class="title-c title-mobile"><span class="mobile">Rp </span>{{ number_format($property->harga, '0', '.', '.') }}</h5>
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
                                            @if($property->is_book)
                                                {{ __('site.property.booked') }}
                                            @elseif($property->is_sold == 1)
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
                                {!! nl2br(json_decode($property->deskripsi)->$lang) !!}
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
            <form action="" method="POST" id="form-pemesanan">
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
                    <div class="info my-2">
                        <h4>Uang Muka Rp 10.000.000</h4>
                    </div>
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

<div class="modal fade" id="transaksiModal" data-backdrop="static" role="dialog" aria-labelledby="pembayaranModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="pembayaranModal">{{ __('site.bayar') }}</h3>
            </div>
            <form action="{{ route('book.property', $property->id) }}" method="POST" id="form-pembayaran"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <h3 class="text-center">{{ __('site.trf-bank') }}</h3>
                    <h3 class="text-center">Total Rp <span class="bayar">10.000.000</span></h3>
                    <div class="bank-container">
                        <div class="bank-img">
                            <img src="https://www.freepnglogos.com/uploads/logo-bca-png/bank-central-asia-logo-bank-central-asia-bca-format-cdr-png-gudril-1.png"
                                alt="">
                        </div>
                        <div class="bank-text">
                            <h3>a.n. Edward</h3>
                            <h4>7720578128</h4>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bukti">{{ __('site.upload-bank') }}</label>
                        <div class="custom-file">
                            <input type="file" required name="bukti"
                                class="file custom-file-input @error('bukti') is-invalid @enderror" id="bukti"
                                value="{{ old('bukti') }}" accept="image/*">
                            <label class="custom-file-label" for="bukti">
                                <span class="d-inline-block text-truncate w-75">Browse File</span>
                            </label>
                            @error("bukti")
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <small class="form-text text-muted">upload format file .png, .jpg max 5mb.</small>
                    </div>
                    <img src="https://via.placeholder.com/1080x1080.png?text={{ __('site.img-bukti') }}" alt=""
                        class="img-thumbnail img-detail">
                    <small>{{ __('site.detail-img') }}</small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-bayar">{{ __('site.proses-bayar') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="imageModal" role="dialog" aria-labelledby="pembayaranModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="pembayaranModal">{{ __('site.img-bukti') }}</h3>
            </div>
            <div class="modal-body">
                <img src="" alt="" class="img-thumbnail img-modal-detail" style="width: 100%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
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

    $('#bukti').change(function(e){
        let url = URL.createObjectURL(e.target.files[0])
        $(".img-detail").attr("src", url)
    })

    $('.img-detail').click(function(){
        $('.img-modal-detail').attr('src', $(this).attr('src'))
        $('#imageModal').modal('show')
    })

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
            Swal.fire({
                title: 'Checking',
                timer: 20000,
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading()
                    Swal.stopTimer()
                    $.ajax({
                        url: `{{ route('check.property', $property->id) }}`,
                        type: 'POST',
                        data: $(form).serialize(),
                        success: (data) => {
                            Swal.close()
                            if (data.status == 'success') {
                                $('#bayarModal').modal('toggle');
                                $('#transaksiModal').modal('show');
                            } else {
                                Swal.fire({
                                    title: 'Property',
                                    html: data.msg,
                                    icon: 'info'
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
            
        }
    })
    $('#form-pembayaran').validate({
        rules: {
            bukti: 'required'
        },
        submitHandler: (form, e) => {
            e.preventDefault()
            let dataform = new FormData($('#form-pemesanan')[0])
            dataform.append('bukti', $('#bukti')[0].files[0])
            $('.btn-bayar').html('<i class="fa fa-spinner fa-spin"></i>')
            $('.btn-bayar').attr('disabled', true)
            //kasi swal
            Swal.fire({
                title: 'Loading',
                timer: 20000,
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading()
                    Swal.stopTimer()
                    $.ajax({
                        url: $(form).attr('action'),
                        data: dataform,
                        type: 'POST',
                        contentType: false, 
                        processData: false,
                        success: (res) => {
                            Swal.close()
                            if(res.status == 'success') {
                                Swal.fire({
                                    title: 'Success',
                                    icon: 'success',
                                    text: res.msg,
                                }).then(res => {
                                    if(res.isConfirmed) window.location.reload()
                                })
                            }
                        },
                        error: (err) => {
                            console.log(err.responseJSON)
                            $('.btn-bayar').html(`{{ __('site.proses-bayar') }}`)
                            $('.btn-bayar').attr('disabled', false)
                        }
                    })
                }
            })
        }
    })
</script>
@endsection
