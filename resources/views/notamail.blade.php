@component('mail::message')
# Bukti Pembayaran Telah Berhasil di Upload !

Dear, {{ $data->nama }}<br>
Bukti Pembayaran Sudah kami Terima!<br>
Terimakasih sudah melakukan booking di South Property Bali.

<br>

## Berikut adalah bukti pembayaran yang telah anda upload

<img src="{{ config('app.url') . Storage::url('pesanan/bukti_bayar/') . $data->bukti_bayar }}" alt="" style="width: 100%">


Bukti pembayaran ini merupakan bukti yang sah.

Thanks,<br>
{{ config('app.name') }}
@endcomponent