@extends('Kasir.template.main')

@section('judul')
    Nota Bpk/Ibu
@endsection

@section('Judulisi')
    <h2>Nota Bpk/Ibu {{ $wo->nama_pesanan }}</h2>
@endsection

@section('Content1')
<div class="container my-4">

    {{-- TOMBOL PRINT --}}
    <div class="d-flex justify-content-end mb-3 no-print">
        <button class="btn btn-success btn-sm" onclick="window.print()">
            <i class="bi bi-printer"></i> Print
        </button>
    </div>

    {{-- AREA NOTA --}}
    <div class="card">
        <div class="card-body">

            {{-- HEADER --}}
            <div class="nota-header">
                <h4>DUTA UTAMA GRAFIKA</h4>
                <p>Jl TK Irawadi 66 Panjer, Denpasar</p>
                <p>Telp: 0361 244061 / 8083976 / 8955186</p>
            </div>

            {{-- INFO NOTA --}}
            <table class="nota-info" width="100%">
                <tr>
                    <td>No Nota : <b>{{ $nota->nonota }}</b></td>
                    <td class="text-end">Tanggal : {{ $nota->created_at->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td colspan="2">Kepada Yth : <b>{{ $wo->nama_pesanan }}</b></td>
                </tr>
            </table>

            {{-- TABEL BARANG --}}
            <table class="table-nota">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Barang</th>
                        <th width="10%">Qty</th>
                        <th width="20%">Harga</th>
                        <th width="20%">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach ($notadata as $item)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>{{ $item->barang }}</td>
                        <td class="text-center">{{ $item->qty }}</td>
                        <td class="text-end">Rp {{ number_format($item->Harga,0,',','.') }}</td>
                        <td class="text-end">Rp {{ number_format($item->total,0,',','.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- TOTAL --}}
            <div class="total-box">
                <table width="100%">
                    <tr>
                        <td width="70%" rowspan="3">
                            <b>Penerima</b><br><br><br>
                            _____________________
                        </td>
                        <td>Total</td>
                        <td class="text-end">Rp {{ number_format($wo->harga,0,',','.') }}</td>
                    </tr>
                    <tr>
                        <td>Deposit</td>
                        <td class="text-end">Rp {{ number_format($pembayaran->deposit,0,',','.') }}</td>
                    </tr>
                    <tr>
                        <td>Sisa</td>
                        <td class="text-end">Rp {{ number_format($pembayaran->sisapembayaran,0,',','.') }}</td>
                    </tr>
                </table>
            </div>

            <div class="footer-print">
                Dicetak pada {{ date('d-m-Y H:i') }}
            </div>

        </div>
    </div>
</div>

{{-- ================= PRINT STYLE DOT MATRIX ================= --}}
<style>
@media print {

    * {
        color: #000 !important;
        background: transparent !important;
        box-shadow: none !important;
        font-weight: 900 !important;
    }

    body {
        font-family: "Courier New", Courier, monospace !important;
        font-size: 12px !important;
        line-height: 1.4 !important;
    }

    .no-print,
    .sidebar,
    .navbar,
    footer,
    header,
    nav {
        display: none !important;
    }

    .container,
    .card,
    .card-body {
        width: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        border: none !important;
    }

    .nota-header {
        text-align: center;
        border-bottom: 3px double #000;
        margin-bottom: 8px;
        padding-bottom: 6px;
    }

    .nota-header h4 {
        margin: 0;
        font-size: 14px;
    }

    .nota-header p {
        margin: 0;
        font-size: 11px;
    }

    .nota-info td {
        padding: 2px 4px;
        font-size: 12px;
    }

    .table-nota {
        width: 100%;
        border-collapse: collapse;
        margin-top: 8px;
    }

    .table-nota th,
    .table-nota td {
        border: 2px solid #000;
        padding: 4px 6px;
    }

    .table-nota th {
        text-align: center;
    }

    .text-end {
        text-align: right !important;
    }

    .text-center {
        text-align: center !important;
    }

    .total-box {
        border-top: 3px double #000;
        margin-top: 8px;
        padding-top: 6px;
    }

    .total-box td {
        padding: 2px 4px;
    }

    .footer-print {
        text-align: center;
        margin-top: 20px;
        font-size: 10px;
    }
}
</style>
@endsection
