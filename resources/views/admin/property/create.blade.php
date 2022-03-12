@extends('admin.template.admin')

@section('title', 'Tambah Property')

@section('css')
<style>
    .img-crop {
        height: 200px !important;
        width: 100%;
        object-fit: cover;
        object-position: center;
    }

    .img-frame {
        position: relative;
    }

    .img-frame:hover .delete-image {
        display: block;
    }

    .delete-image {
        position: absolute;
        bottom: 0;
        font-size: 18px;
        background: rgb(71, 71, 71);
        opacity: 0.8;
        width: 100%;
        text-align: center;
        height: 30px;
        color: #fff;
        cursor: pointer;
        display: none;
    }
</style>
@endsection

@section('main-content')
<div class="card shadow mx-3">
    <div class="card-body">
        <form action="{{ route('admin.properties.store') }}" method="post" enctype="multipart/form-data" id="form">
            @csrf
            <div class="form-group">
                <label for="nama">Judul Iklan</label>
                <input type="text" required name="nama" class="form-control  @error('nama') is-invalid @enderror"
                    value="{{ old('nama') }}">
                @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="provinsi">Provinsi</label>
                        <select name="provinsi" id="provinsi" class="form-control @error('provinsi') is-invalid @enderror">
                            <option value="51|Bali" selected>Bali</option>
                        </select>
                        @error('provinsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="kabupaten">Kabupaten</label>
                        <select name="kabupaten" id="kabupaten" class="form-control @error('kabupaten') is-invalid @enderror">
                        </select>
                        @error('kabupaten')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="kecamatan">Kecamatan</label>
                        <select name="kecamatan" id="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror">
                        </select>
                        @error('kecamatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="kelurahan">Kelurahan</label>
                        <select name="kelurahan" id="kelurahan" class="form-control @error('kelurahan') is-invalid @enderror">
                        </select>
                        @error('kelurahan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="area">Area Detail</label>
                        <input type="text" required name="area" class="form-control  @error('area') is-invalid @enderror" value="{{ old('area') }}">
                        @error('area')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="latitude">Latitude Longitude Lokasi</label>
                        <input type="text" required name="latitude" class="form-control  @error('latitude') is-invalid @enderror" value="{{ old('latitude') }}">
                        @error('latitude')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea required name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control  @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tipe">Tipe</label>
                <select required name="tipe" id="tipe" class="form-control  @error('tipe') is-invalid @enderror">
                    <option value="" selected disabled>Pilih Tipe</option>
                    <option value="Tanah">Tanah</option>
                    <option value="Rumah">Rumah</option>
                    <option value="Komersil">Komersil</option>
                </select>
            </div>
            <div class="form-group sub_tipe" style="display: none">
                <label for="sub_tipe">Sub Type</label>
                <select name="sub_tipe" id="sub_tipe" class="form-control  @error('sub_tipe') is-invalid @enderror">
                </select>
            </div>
            <div class="form-group hargaAre" style="display: none">
                <label for="panjang">Panjang Tahan (m)</label>
                <input type="text" required name="panjang" class="form-control  @error('panjang') is-invalid @enderror" value="{{ old('panjang') }}">
                @error('panjang')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group hargaAre" style="display: none">
                <label for="lebar">Lebar Tanah (m)</label>
                <input type="text" required name="lebar" class="form-control  @error('lebar') is-invalid @enderror" value="{{ old('lebar') }}">
                @error('lebar')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="luas">Luas (m<sup>2</sup>)</label>
                <input type="text" required name="luas" class="form-control  @error('luas') is-invalid @enderror" value="{{ old('luas') }}">
                @error('luas')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group hargaAre" style="display: none">
                <label for="harga_satuan">Harga per are</label>
                <input type="text" name="harga_satuan" class="form-control  @error('harga_satuan') is-invalid @enderror"
                    value="{{ old('harga_satuan') }}">
                @error('harga_satuan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="harga">Total Harga</label>
                <input type="text" required name="harga" class="form-control  @error('harga') is-invalid @enderror"
                    value="{{ old('harga') }}">
                @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="limit">Fasilitas <span class="badge badge-pill badge-secondary" title="Pisahkan dengan tanda |"><i class="fa fa-question"></i></span></label>
                <input type="text" name="fasilitas" required class="form-control @error('fasilitas') is-invalid @enderror">
                @error('fasilitas')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="text">Foto Property</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input foto" name="foto[]" required accept="image/*" multiple>
                    <label class="custom-file-label label-foto">Select file</label>
                </div>
                @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="row image-foto my-3">
                    
                </div>
            </div>
            <button type="submit" class="btn btn-block btn-primary">Tambah</button>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    let fotoData
    $('input[name="harga"]').simpleMoneyFormat()
    $('.foto').change(function(e){
        fotoData = Array.from(e.target.files)
        $('.image-foto').empty()
        let i = 0;
        Array.from(e.target.files).forEach(file => {
            let url = URL.createObjectURL(file)
            let image = `
            <div class="col-3">
                <div class="img-frame">
                    <img src="${url}" alt="" class="img-responsive img-crop">
                    <div class="delete-image delete-foto" data-id="${i}"><strong>Delete Image</strong></div>
                </div>      
            </div>`
            $('.image-foto').append(image)
            i++;
        })
    })

    const checkLengthFotoData = () => {
        let length = 0
        fotoData.forEach(elm => {
            if(elm !== null) length++
        })
        return length
    }

    const changeLabelFoto = () => {
        if($('.foto').val() == '' || $('.foto').val() == null){
            $('.label-foto').text('Select file')
        }
        else {
            let textLabel = ''
            fotoData.forEach(elm => {
                if(elm !== null) {
                    textLabel += `${elm.name}, `
                }
            })
            $('.label-foto').text(textLabel)
        }
    }

    $('body').on('click', '.delete-foto', function(e) {
        let id = $(this).data('id')
        fotoData[id] = null
        $(this).parent().parent().remove()
        if(checkLengthFotoData() <= 0) $('.foto').val(null)
        changeLabelFoto()
    })

    $('#tipe').change(function(e){
        let tipe = $(this).val()
        if(tipe == 'Tanah'){
            $('.hargaAre').show(300)
            $('#sub_tipe').empty()
            $('.sub_tipe').hide()
        }
        else {
            $('.hargaAre').hide(300)
            if(tipe == 'Rumah'){
                $('#sub_tipe').html(`
                    <option selected value="">Pilih Sub Type</option>
                    <option value="Rumah">Rumah</option>
                    <option value="Rumah Kosan">Rumah Kosan</option>
                    <option value="Villa atau Guest House">Villa atau Guest House</option>
                `)
            } else {
                $('#sub_tipe').html(`
                    <option selected value="">Pilih Sub Type</option>
                    <option value="Ruko">Ruko</option>
                    <option value="Kantor">Kantor</option>
                    <option value="Gudang">Gudang</option>
                `)
            }
            $('.sub_tipe').show(300)
        }
    })

    $('#form').validate({
        rules: {
            nama: 'required',
            provinsi: 'required',
            kabupaten: 'required',
            kecamatan: 'required',
            kelurahan: 'required',
            area: 'required',
            latitude: 'required',
            deskripsi: 'required',
            tipe: 'required',
            sub_tipe: {
                required: function(element){
                    return $('#tipe').val() == 'Rumah' || $('#tipe').val() == 'Komersil'
                }
            },
            harga_satuan: {
                required: function(element){
                    return $('#tipe').val() == 'Tanah'
                }
            },
            luas: {
                required: true,
                number: true
            },
            jumlah: {
                required: true,
                digits: true
            },
            harga: {
                required: true,
                number: true
            },
            fasilitas: 'required',
            'foto[]': 'required',
        },
        submitHandler: function(form, e) {
            e.preventDefault()

            let dataform = new FormData(form)
            fotoData.forEach(file => {
                if(file !== null) {
                    dataform.append('fotofile[]', file)
                }
            })

            $.ajax({
                url: $(form).attr('action'),
                data: dataform,
                type: 'POST',
                contentType: false, 
                processData: false, 
                beforeSend: () => {
                    Swal.fire({
                        title: 'Loading',
                        showConfirmButton: false,
                        onBeforeOpen: () => {
                            Swal.showLoading()
                        }
                    })
                },
                success: (res) => {
                    if(res == 'Sukses') {
                        window.location.href = '{{ route("admin.properties.index") }}'
                    }
                    else window.location.href = ''
                }, 
                error: (err) => {
                    console.log(err.responseJSON)
                }
            });

        }
    })
    
    $('#provinsi').select2({
        placeholder: 'Pilih Provinsi',
        width: '100%',
        theme: 'bootstrap4',
    })

    $('#kabupaten').select2({
        placeholder: 'Pilih Kabupaten',
        width: '100%',
        theme: 'bootstrap4',
        ajax: {
            url: `{{ route('api.city') }}`,
            type: 'GET',
            data: function (params) {
                return {
                    id_province: $('#provinsi').val()
                }
            },
            processResults: function (data) {
                return {
                    results: data
                };
            }
        }
    })
    $('#kabupaten').change(function(e){
        $('#kecamatan').empty().trigger('change')
        $('#kecamatan').select2({
            placeholder: 'Pilih Kecamatan',
            width: '100%',
            theme: 'bootstrap4',
            ajax: {
                url: `{{ route('api.district') }}`,
                type: 'GET',
                data: function (params) {
                    return {
                        id_city: $('#kabupaten').val()
                    }
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                }
            }
        })
    })

    $('#kecamatan').change(function(){
        $('#kelurahan').empty().trigger('change')
        $('#kelurahan').select2({
            placeholder: 'Pilih Kelurahan',
            width: '100%',
            theme: 'bootstrap4',
            ajax: {
                url: `{{ route('api.village') }}`,
                type: 'GET',
                data: function (params) {
                    return {
                        id_district: $('#kecamatan').val()
                    }
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                }
            }
        })
    })

    $('#kelurahan').select2({
        placeholder: 'Pilih Kelurahan',
        width: '100%',
        theme: 'bootstrap4',
    })

    $('#kecamatan').select2({
        placeholder: 'Pilih Kecamatan',
        width: '100%',
        theme: 'bootstrap4'
    })
</script>

@endsection