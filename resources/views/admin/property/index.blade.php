@extends('admin.template.admin')

@section('title', 'Properties')

@section('main-content')
<a href="{{ route('admin.properties.create') }}" class="m-3">
    <button class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Data</button>
</a>
<div class="card shadow mx-3">
    <div class="card-body table-responsive">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> BERHASIL!</h5>
            {{session('success')}}
        </div>
        @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> GAGAL!</h5>
            {{session('error')}}
        </div>
        @endif
        <table id="adminTable" class="table table-bordered dt-responsive nowrap" style="width: 100%;">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama Property</th>
                    <th>Harga Property</th>
                    <th>Foto Property</th>
                    <th class="text-center">Aksi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="actionz">
                @php
                $no=0;
                @endphp
                @if (!is_null($data))
                @foreach ($data as $dt)
                <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $dt->nama }}</td>
                    <td>Rp {{ number_format($dt->harga, '0', '.', '.') }}</td>
                    <td class="text-center">
                        <button data-id="{{ $dt->id }}" class="btn btn-sm btn-primary btn-detail"><i class="fas fa-eye"></i></button>
                    </td>
                    <td class="text-center">
                        <div class="row justify-content-center" style="min-width: 100px">
                            <a href="{{ route('admin.properties.edit', $dt->id) }}" class="mx-3">
                                <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                            </a>
                            <form action="{{ route('admin.properties.destroy', $dt->id) }}" method="POST"
                                class="deleted">
                                @method("DELETE")
                                @csrf
                                <button class="btn btn-sm btn-danger" type="submit"><i
                                        class="fas fa-trash"></i></button>
                            </form>
                            @if($dt->is_sold == 0)
                            <form action="{{ route('admin.properties.sold', $dt->id) }}" method="POST"
                                class="sold mx-3">
                                @csrf
                                <button title="Sudah Terjual" class="btn btn-sm btn-warning" type="submit">
                                    <i class="fas fa-wallet"></i>
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                    <td class="text-center">
                        @if($dt->is_sold == 0)
                        <h3 class="badge badge-success">Sale</h3>
                        @else
                        <h3 class="badge badge-danger">Sold</h3>
                        @endif
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="fotoModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Foto Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body foto">
        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    let urlShow = `{{ route('admin.properties.show', '#id') }}`
    let urlImage = `{{ Storage::url('properties/image/') }}`

    $('body').on('click', '.btn-detail', function(e){
        $('.foto').empty()
        let ul = urlShow.replace('#id', $(this).data('id'))
        $.ajax({
            url: ul,
            success: (res) => {
                res.images.forEach(data => {
                    let html = `<div class="col-12 my-2">
                                    <img src="${urlImage + data.name}" alt="" class="img-thumbnail">
                                </div>`
                    $('.foto').append(html)
                })
            }
        })
        $('#fotoModal').modal('show')
    })

    $('body').on('submit', '.sold', function(e){
        e.preventDefault()
        let ul = $(this).attr('action')
        // swal fire confirm button
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Data yang sudah terjual tidak dapat dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, Terjual!",
        }).then(result => {
            if(result.isConfirmed){
                $.ajax({
                    url: ul,
                    method: 'POST',
                    success: (res) => {
                        if(res.status == 'success'){
                            Swal.fire({
                                title: "Berhasil!",
                                text: "Data berhasil diubah!",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500
                            }).then(rs => {
                                location.reload()
                            })
                        }
                    }
                })
            }
        })
        
    })
</script>
@endsection