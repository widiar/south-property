@extends('admin.template.admin')

@section('title', 'Pesanan')

@section('main-content')
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
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No. Telepon</th>
                    <th>Jenis Kelamin</th>
                    <th>Property</th>
                    <th>Total Harga</th>
                    <th>Bukti Pembayaran</th>
                    <th class="text-center">Aksi</th>
                    <th class="text-center">Status</th>
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
                    <td>{{ $dt->email }}</td>
                    <td>{{ $dt->no_hp }}</td>
                    <td>{{ $dt->gender }}</td>
                    <td>
                        <a href="{{ route('property', $dt->property_id) }}" target="_blank">
                            {{ $dt->property->nama }} ({{ $dt->property->tipe }})
                        </a>
                    </td>
                    <td>Rp {{ number_format($dt->harga * $dt->jumlah, '0', '.', '.') }}</td>
                    <td class="text-center">
                        <a href="{{ Storage::url('pesanan/bukti_bayar/') . $dt->bukti_bayar }}" class="bukti_bayar">
                            <button class="btn btn-sm btn-info"><i class="fas fa-file-invoice-dollar"></i></button>
                        </a>
                    </td>
                    <td class="row justify-content-center">
                        <a href="https://wa.me/{{ $dt->no_hp}}?text={{ str_replace('%23nama', $dt->nama, $pesan) }}" target="_blank" class="mx-3">
                            <button class="btn btn-sm btn-primary">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </a>
                        @if($dt->status == 0)
                        <form action="{{ route('admin.pesanan.approve', $dt->id) }}" method="POST" class="mx-3" id="form-approve-pesanan">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-sm btn-success" type="submit"><i class="fas fa-check"></i></button>
                        </form>
                        @endif
                        <form action="{{ route('admin.pesanan.delete', $dt->id) }}" method="POST" class="mx-3 deleted">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-sm btn-danger" type="submit"><i
                                class="fas fa-trash"></i></button>
                        </form>
                    </td>
                    <td class="text-center">
                        @if($dt->status == 0)
                        <h3 class="badge badge-secondary">Reviewed</h3>
                        @elseif($dt->status == 1)
                        <h3 class="badge badge-success">Approved</h3>
                        @else
                        <h3 class="badge badge-danger">Rejected</h3>
                        @endif
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Detail</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="" alt="" class="img-thumbnail img-detail" style="width: 100%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>

    $('body').on('submit', '#form-approve-pesanan', function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'PATCH',
                    success: (res) => {
                        Swal.fire({
                            title: 'Success!',
                            text: `The data has been approved.`,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        }).then((result) => {
                            window.location.href = "";
                        }) 
                    },
                    error: (res) => {
                        Swal.fire("Oops", "Something Wrong!", "error");
                        console.log(res.responseJSON)
                    }
                })
            }
        })
    })

    $('body').on('click', '.bukti_bayar', function(e){
        e.preventDefault()
        const url = $(this).attr('href')
        $('.img-detail').attr('src', url)
        $('#imageModal').modal('show')
    })
    
</script>
@endsection