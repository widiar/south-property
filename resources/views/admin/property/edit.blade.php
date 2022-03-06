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
                        <label for="lokasi">Nama Lokasi</label>
                        <input type="text" required name="lokasi" class="form-control  @error('lokasi') is-invalid @enderror" value="{{ old('lokasi', $lokasi) }}">
                        @error('lokasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="latitude">Latitude Lokasi</label>
                        <input type="text" required name="latitude" class="form-control  @error('latitude') is-invalid @enderror" value="{{ old('latitude', $lat) }}">
                        @error('latitude')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="longitude">Longitude Lokasi</label>
                        <input type="text" required name="longitude" class="form-control  @error('longitude') is-invalid @enderror" value="{{ old('longitude', $long) }}">
                        @error('longitude')
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
                    <option {{ ($data->tipe == 'Tanah') ? 'selected' : '' }} value="Tanah">Tanah</option>
                    <option {{ ($data->tipe == 'Bangunan') ? 'selected' : '' }} value="Bangunan">Bangunan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="luas">Luas (m<sup>2</sup>)</label>
                <input type="text" required name="luas" class="form-control  @error('luas') is-invalid @enderror" value="{{ old('luas', $data->luas) }}">
                @error('luas')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="harga">Harga <span id="tipe_harga"></span></label>
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
            $('#tipe_harga').text('/are')
        }
        else {
            $('#tipe_harga').text('')
        }
    })

    $('#form').validate({
        rules: {
            nama: 'required',
            lokasi: 'required',
            latitude: 'required',
            longitude: 'required',
            deskripsi: 'required',
            tipe: 'required',
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
            if (fotoData !== undefined)
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
                success: (res) => {
                    if(res == 'Sukses') window.location.href = '{{ route("admin.properties.index") }}'
                    else window.location.href = ''
                }, 
                error: (err) => {
                    console.log(err.responseJSON)
                }
            });

        }
    })
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