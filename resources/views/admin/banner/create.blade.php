@extends('admin.template.admin')

@section('title', 'Tambah Banner')

@section('css')
<style>
    .img-crop {
        height: 500px !important;
        width: 100%;
        object-fit: cover;
        object-position: center;
    }

    #edit-image:hover {
        cursor: pointer;
    }

    .img-frame {
        position: relative;
    }

    #edit-image {
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
    }
</style>
@endsection

@section('main-content')
<div class="card shadow mx-3">
    <div class="card-body">
        <form action="{{ route('admin.banner.store') }}" method="post" enctype="multipart/form-data" id="form">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" required name="title" class="form-control  @error('title') is-invalid @enderror"
                    value="{{ old('title') }}">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <div class="img-frame">
                    <img src="https://via.placeholder.com/1080x1080.png?text=Image" alt="" class="img-crop">
                    <div id="edit-image"><strong>Edit Image</strong></div>
                </div>
                <input style="display: none;" type="file" name="foto" id="foto" value="{{ old('foto') }}"
                    accept="image/x-png, image/jpeg">
                @error("foto")
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <p class="error-foto text-danger" style="display: none"></p>
                <small id="exampleInputFile" class="form-text text-muted">upload format file .png, .jpg max 5mb.</small>
            </div>
            <button type="submit" class="btn btn-block btn-primary">Tambah</button>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    $('#form').validate({
        rules: {
            title: 'required',
            foto: 'required',
        }
    })
    $("#edit-image").click(function(){
        $("#foto").click()
    })
    $("#foto").change(function(e){
        let url = URL.createObjectURL(e.target.files[0])
        $(".img-crop").attr("src", url)
        $('.error-foto').text('')
    })

    $('#form').submit(function(e){
        let error = 0
        if($('#foto').get(0).files.length == 0){
            $('.error-foto').text('Foto tidak boleh kosong')
            $('.error-foto').fadeIn();
            error = 1;
        }

        if(error == 1){
            e.preventDefault()
            return false
        }
    })
</script>
@endsection