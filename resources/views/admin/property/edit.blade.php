@extends('admin.template.admin')

@section('title', 'Edit Property')

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
        <form action="{{ route('admin.properties.update', $data->id) }}" method="post" enctype="multipart/form-data"
            id="form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama Property</label>
                <input type="text" required name="nama" class="form-control  @error('nama') is-invalid @enderror"
                    value="{{ old('nama', $data->nama) }}">
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
                        <input type="text" required name="area" class="form-control  @error('area') is-invalid @enderror" value="{{ old('area', $data->location->area) }}">
                        @error('area')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="latlng">Latitude Longitude Lokasi</label>
                        <input type="text" required name="latlng" class="form-control  @error('latlng') is-invalid @enderror" value="{{ old('latlng', $data->location->latlng) }}">
                        @error('latlng')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea required name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control  @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $data->deskripsi) }}</textarea>
                @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tipe">Tipe</label>
                <select required name="tipe" id="tipe" class="form-control  @error('tipe') is-invalid @enderror">
                    <option value="" selected disabled>Pilih Tipe</option>
                    <option {{ $data->tipe == 'Tanah' ? 'selected' : '' }} value="Tanah">Tanah</option>
                    <option {{ $data->tipe == 'Rumah' ? 'selected' : '' }} value="Rumah">Rumah</option>
                    <option {{ $data->tipe == 'Komersil' ? 'selected' : '' }} value="Komersil">Komersil</option>
                </select>
            </div>
            <div class="form-group sub_tipe" style="display: none">
                <label for="sub_tipe">Sub Type</label>
                <select name="sub_tipe" id="sub_tipe" class="form-control  @error('sub_tipe') is-invalid @enderror">
                </select>
            </div>
            <div class="form-group hargaAre" style="display: none">
                <label for="panjang">Panjang Tahan (m)</label>
                <input type="text" required name="panjang" class="form-control  @error('panjang') is-invalid @enderror" value="{{ old('panjang', $data->panjang) }}">
                @error('panjang')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group hargaAre" style="display: none">
                <label for="lebar">Lebar Tanah (m)</label>
                <input type="text" required name="lebar" class="form-control  @error('lebar') is-invalid @enderror" value="{{ old('lebar', $data->lebar) }}">
                @error('lebar')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="luas">Luas (m<sup>2</sup>)</label>
                <input type="text" required name="luas" class="form-control  @error('luas') is-invalid @enderror" value="{{ old('luas', $data->luas) }}">
                @error('luas')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group hargaAre" style="display: none">
                <label for="harga_satuan">Harga per are</label>
                <input type="text" name="harga_satuan" class="form-control  @error('harga_satuan') is-invalid @enderror"
                    value="{{ old('harga_satuan', $data->harga_satuan) }}">
                @error('harga_satuan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="harga">Total Harga</label>
                <input type="text" required name="harga" class="form-control  @error('harga') is-invalid @enderror"
                    value="{{ old('harga', $data->harga) }}">
                @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="limit">Fasilitas <span class="badge badge-pill badge-secondary" title="Pisahkan dengan tanda |"><i class="fa fa-question"></i></span></label>
                <input type="text" name="fasilitas" value="{{ old('fasilitas',$data->fasilitas) }}" required class="form-control @error('fasilitas') is-invalid @enderror">
                @error('fasilitas')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="text">Foto Property</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input foto" name="foto[]" accept="image/*" multiple>
                    <label class="custom-file-label label-foto">Select file</label>
                </div>
                @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="row my-3">
                    @foreach ($data->images as $image)
                    <div class="col-3">
                        <div class="img-frame">
                            <img src="{{ Storage::url('properties/image/') . $image->name }}" alt="" class="img-responsive img-crop">
                            <div class="delete-image hapus-image" data-id="{{ $image->id }}"><strong>Delete Image</strong></div>
                        </div> 
                    </div>
                    @endforeach
                </div>
                <div class="row image-foto my-3">
                    
                </div>
            </div>
            <button type="submit" class="btn btn-block btn-primary">Edit</button>
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

    const type = () => {
        let tipe = $('#tipe').val()
        if(tipe == 'Tanah'){
            $('.hargaAre').show(300)
            $('#sub_tipe').empty()
            $('.sub_tipe').hide()
        }
        else {
            $('.hargaAre').hide(300)
            if(tipe == 'Rumah'){
                let subtipe = `{!! $data->sub_tipe !!}`
                $('#sub_tipe').html(`
                    <option selected value="">Pilih Sub Type</option>
                    <option ${ subtipe == 'Rumah' ? 'selected' : '' } value="Rumah">Rumah</option>
                    <option ${ subtipe == 'Rumah Kosan' ? 'selected' : '' } value="Rumah Kosan">Rumah Kosan</option>
                    <option ${ subtipe == 'Villa atau Guest House' ? 'selected' : '' } value="Villa atau Guest House">Villa atau Guest House</option>
                `)
            } else {
                let subtipe = `{!! $data->sub_tipe !!}`
                $('#sub_tipe').html(`
                    <option selected value="">Pilih Sub Type</option>
                    <option ${ subtipe == 'Ruko' ? 'selected' : '' } value="Ruko">Ruko</option>
                    <option ${ subtipe == 'Kantor' ? 'selected' : '' } value="Kantor">Kantor</option>
                    <option ${ subtipe == 'Gudang' ? 'selected' : '' } value="Gudang">Gudang</option>
                `)
            }
            $('.sub_tipe').show(300)
        }
    }

    type()

    $('#tipe').change(type)

    $('#form').validate({
        rules: {
            nama: 'required',
            provinsi: 'required',
            kabupaten: 'required',
            kecamatan: 'required',
            kelurahan: 'required',
            area: 'required',
            latlng: 'required',
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
            fasilitas: 'required',
        },
        submitHandler: function(form, e) {
            e.preventDefault()

            let dataform = new FormData(form)
            if(fotoData !== undefined){
                fotoData.forEach(file => {
                    if(file !== null) {
                        dataform.append('fotofile[]', file)
                    }
                })
            }

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
                    // console.log(res)
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

    let first = true

    $('#kabupaten').change(function(e){
        if(!first) $('#kecamatan').empty().trigger('change')
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
                if (first) {
                    $('#kecamatan').val(`{!! $data->location->id_kecamatan !!}|{!! $data->location->kecamatan !!}`)
                }
                $('#kecamatan').trigger('change')
            }
        })
    })

    $('#kecamatan').change(function(){
        if(!first) $('#kelurahan').empty().trigger('change')
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
                if (first) {
                    $('#kelurahan').val(`{!! $data->location->id_kelurahan !!}|{!! $data->location->kelurahan !!}`)
                    first = false
                }
                $('#kelurahan').trigger('change')
            }
        })
    })

    $('#kabupaten').val(`{!! $data->location->id_kabupaten !!}|{!! $data->location->kabupaten !!}`).trigger('change')


    $('body').on('click', '.hapus-image', function(e) {
        let id = $(this).data('id')
        let button = $(this)
        Swal.fire({
            title: 'Loading',
            timer: 20000,
            allowOutsideClick: false,
            allowEscapeKey: false,
            didOpen: () => {
                Swal.showLoading()
                Swal.stopTimer()
                $.ajax({
                    url: `{{ route('admin.properties.image.delete') }}`,
                    method: 'DELETE',
                    data: {
                        id: id
                    },
                    success: (res) => {
                        button.parent().parent().remove()
                    },
                    complete: () => {
                        Swal.close()
                    },

                })
            }
        })
    })
</script>
@endsection