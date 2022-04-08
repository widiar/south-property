@component('mail::message')
# Pembayaran Berhasil !

Dear, {{ $data->nama }}<br>
Pembayaran Sudah di Terima!<br>
Terimakasih sudah melakukan booking di South Property Bali.

@component('mail::table')
| Property | Tanggal Transaksi |
| :------------- | :------------: | 
| <a href="{{ route('property', $data->property_id) }}">{{ $data->property->nama }} ({{ $data->property->tipe }})</a> | {{ date('j F Y', strtotime($data->updated_at)) }} | 
@endcomponent

Bukti pembayaran ini merupakan bukti yang sah.

Thanks,<br>
{{ config('app.name') }}
@endcomponent