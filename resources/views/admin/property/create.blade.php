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
                            <option value=""></option>
                            @foreach ($kabupaten as $kab)
                                <option value="{{ $kab->id }}">{{ $kab->text }}</option>
                            @endforeach
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
                            <option value=""></option>
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
                            <option value=""></option>
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
                        <label for="latlng">Latitude Longitude Lokasi</label>
                        <input type="text" required name="latlng" class="form-control  @error('latlng') is-invalid @enderror" value="{{ old('latlng') }}">
                        @error('latlng')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi (ID)</label>
                <textarea required name="deskripsi_id" id="deskripsi_id" cols="30" rows="10" class="form-control  @error('deskripsi_id') is-invalid @enderror">{{ old('deskripsi_id') }}</textarea>
                @error('deskripsi_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi (EN)</label>
                <textarea required name="deskripsi_en" id="deskripsi_en" cols="30" rows="10" class="form-control  @error('deskripsi_en') is-invalid @enderror">{{ old('deskripsi_en') }}</textarea>
                @error('deskripsi_en')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tipe">Tipe</label>
                <select required name="tipe" id="tipe" class="form-control  @error('tipe') is-invalid @enderror">
                    <option value="" selected disabled>Pilih Tipe</option>
                    <option value="Tanah">Tanah</option>
                    <option value="Rumah">Rumah</option>
                    <option value="Komersial">Komersial</option>
                </select>
            </div>
            <div class="form-group sub_tipe" style="display: none">
                <label for="sub_tipe">Sub Type</label>
                <select name="sub_tipe" id="sub_tipe" class="form-control  @error('sub_tipe') is-invalid @enderror">
                </select>
            </div>
            <div class="form-group sub_tipe" style="display: none">
                <label for="luasBangunan">Luas Bangunan (m<sup>2</sup>)</label>
                <input type="text" required name="luasBangunan" class="form-control  @error('luasBangunan') is-invalid @enderror" value="{{ old('luasBangunan') }}">
                @error('luasBangunan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group hargaAre" style="display: none">
                <label for="lebar">Lebar Depan (m)</label>
                <input type="text" required name="lebar" class="form-control  @error('lebar') is-invalid @enderror" value="{{ old('lebar') }}">
                @error('lebar')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="luas">Luas Tanah (m<sup>2</sup>)</label>
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
            <div class="form-group sub_tipe" style="display: none">
                <label for="limit">Fasilitas</label>
                <div class="row">
                    @foreach ($facilities as $facility)
                    <div class="col-md-4">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="{{ $facility->id }}" name="fasilitas[]" value="{{ $facility->name }}">
                            <label for="{{ $facility->id }}" class="custom-control-label">{{ $facility->name }}</label>
                        </div>
                    </div>
                    @endforeach
                </div>
                @error('fasilitas')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="hargaAre" style="display: none">
                <div class="sertifikat">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="sertifikat">Nama Sertifikat</label>
                            <input type="text" class="form-control" name="sertifikat[]">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="file_sertif[]">File Sertifikat</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="file_sertif[]" required accept="application/pdf">
                                <label class="custom-file-label">Select file</label>
                            </div>
                            @error('file_sertif[]')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-primary tambah-sertif">Tambah Sertifikat</button>
            </div>
            <div class="form-group sub_tipe" style="display: none">
                <label for="lantai">Jumlah Lantai</label>
                <select required name="lantai" id="lantai" class="form-control  @error('lantai') is-invalid @enderror">
                    <option value="" selected disabled>Jumlah lantai</option>
                    <option value="1">1 Lantai</option>
                    <option value="2">2 Lantai</option>
                    <option value="3">3 Lantai</option>
                    <option value="4">4 Lantai</option>
                    <option value="5">5 Lantai</option>
                </select>
            </div>
            <div class="row sub_tipe" style="display: none">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="kamar_tidur">Kamar Tidur</label>
                        <input type="text" required name="kamar_tidur" class="form-control  @error('kamar_tidur') is-invalid @enderror"
                            value="{{ old('kamar_tidur') }}">
                        @error('kamar_tidur')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="kamar_mandi">Kamar Mandi</label>
                        <input type="text" required name="kamar_mandi" class="form-control  @error('kamar_mandi') is-invalid @enderror"
                            value="{{ old('kamar_mandi') }}">
                        @error('kamar_mandi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="kamar_pegawai">Kamar Pegawai</label>
                        <input type="text" required name="kamar_pegawai" class="form-control  @error('kamar_pegawai') is-invalid @enderror"
                            value="{{ old('kamar_pegawai') }}">
                        @error('kamar_pegawai')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="kamar_mandi_pegawai">Kamar Mandi Pegawai</label>
                        <input type="text" required name="kamar_mandi_pegawai" class="form-control  @error('kamar_mandi_pegawai') is-invalid @enderror"
                            value="{{ old('kamar_mandi_pegawai') }}">
                        @error('kamar_mandi_pegawai')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
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
    $('input[name="harga_satuan"]').simpleMoneyFormat()
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

    $('.tambah-sertif').click(function(e){
        e.preventDefault()
        let htmlSertifikat = `
                <div class="row mb-3">
                    <div class="form-group col-md-6">
                        <label for="sertifikat">Nama Sertifikat</label>
                        <input type="text" class="form-control" name="sertifikat[]">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="file_sertif[]">File Sertifikat</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file_sertif[]" required accept="application/pdf">
                            <label class="custom-file-label">Select file</label>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-danger hapus-sertifikat">Hapus</button>
                </div>`
        $('.sertifikat').append(htmlSertifikat)
        bsCustomFileInput.init();
    })

    $('body').on('click', '.hapus-sertifikat', function(e){
        e.preventDefault()
        $(this).parent().remove()
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
            latlng: 'required',
            deskripsi_id: 'required',
            deskripsi_en: 'required',
            tipe: 'required',
            sub_tipe: {
                required: function(element){
                    return $('#tipe').val() == 'Rumah' || $('#tipe').val() == 'Komersil'
                }
            },
            lantai: {
                required: function(element){
                    return $('#tipe').val() == 'Rumah' || $('#tipe').val() == 'Komersil'
                }
            },
            kamar_tidur: {
                required: function(element){
                    return $('#tipe').val() == 'Rumah' || $('#tipe').val() == 'Komersil'
                },
                digits: true
            },
            kamar_mandi: {
                required: function(element){
                    return $('#tipe').val() == 'Rumah' || $('#tipe').val() == 'Komersil'
                },
                digits: true
            },
            kamar_pegawai: {
                required: function(element){
                    return $('#tipe').val() == 'Rumah' || $('#tipe').val() == 'Komersil'
                },
                digits: true
            },
            kamar_mandi_pegawai: {
                required: function(element){
                    return $('#tipe').val() == 'Rumah' || $('#tipe').val() == 'Komersil'
                },
                digits: true
            },
            'sertifikat[]': {
                required: function(element){
                    return $('#tipe').val() == 'Tanah'
                }
            },
            'file-sertif[]': {
                required: function(element){
                    return $('#tipe').val() == 'Tanah'
                }
            },
            harga_satuan: {
                required: function(element){
                    return $('#tipe').val() == 'Tanah'
                }
            },
            panjang: {
                required: function(element){
                    return $('#tipe').val() == 'Tanah'
                },
                number: true
            },
            lebar: {
                required: function(element){
                    return $('#tipe').val() == 'Tanah'
                },
                number: true
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
            'fasilitas[]': {
                required: function(element){
                    return $('#tipe').val() == 'Rumah' || $('#tipe').val() == 'Komersil'
                }
            },
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
                        willOpen: () => {
                            Swal.showLoading()
                        }
                    })
                },
                success: (res) => {
                    // console.log(res)
                    if(res == 'Sukses') {
                        window.location.href = '{{ route("admin.properties.index") }}'
                    }
                    else console.log(res)
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
    })

    $('#kabupaten').change(function(e){
        $('#kecamatan').empty().trigger('change')
        $.ajax({
            url: `{{ route('api.district') }}`,
            data: {
                id_city: $('#kabupaten').val()
            },
            success: (res) => {
                $('#kecamatan').append(new Option('Pilih Kecamatan', ''))
                res.forEach(data => {
                    let opt = new Option(data.text, data.id, false, false)
                    $('#kecamatan').append(opt)
                })
                $('#kecamatan').trigger('change')
            }
        })
    })

    $('#kecamatan').change(function(){
        $('#kelurahan').empty().trigger('change')
        $.ajax({
            url: `{{ route('api.village') }}`,
            data: {
                id_district: $('#kecamatan').val()
            },
            success: (res) => {
                $('#kelurahan').append(new Option('Pilih Kelurahan', ''))
                res.forEach(data => {
                    let opt = new Option(data.text, data.id, false, false)
                    $('#kelurahan').append(opt)
                })
                $('#kelurahan').trigger('change')
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
        theme: 'bootstrap4',
    })
</script>

@endsection