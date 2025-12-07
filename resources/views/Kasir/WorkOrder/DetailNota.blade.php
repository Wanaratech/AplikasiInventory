@extends('Kasir.template.main')

@section('judul')
    Nota Bpk/Ibu 
@endsection

@section('Judulisi')
    <h2>Nota Bpk/Ibu {{ $wo->nama_pesanan }}</h2>
@endsection

@section('Content1')
<div class="container my-4">
    <div class="d-flex justify-content-end mb-3 no-print">
        <button class="btn btn-success btn-sm me-2" onclick="window.print()">
                    <i class="bi bi-printer"></i> Print
                </button>
    </div>

    <div class="card shadow rounded-3">
        <div class="card-body" id="nota-content">
            <div class="row">
                <div class="col-6">
                    <h5 class="fw-bold">Duta Utama Grafika</h5>
                    <p class="mb-0">Jl TK Irawadi 66 Panjer, Denpasar</p>
                    <p class="mb-0">Telp: 0361 244061, 8083976, 8955186</p>
                </div>
                <div class="col-6 text-end">
                    <p class="mb-0">Denpasar, {{ $nota->created_at->format('d-m-Y') }}</p>
                    <p class="mb-0">No Nota: <strong>{{ $nota->nonota }}</strong></p>
                    <p class="mb-0">Kpd Yth: <strong>{{ $wo->nama_pesanan }}</strong></p>
                </div>
            </div>
            
            <hr>

            <table class="table table-bordered table-sm align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th>Nama Barang</th>
                        <th style="width: 10%;">Qty</th>
                        <th style="width: 20%;">Harga</th>
                        <th style="width: 20%;">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($notadata as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->barang }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>Rp {{ number_format($item->Harga, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="row mt-3">
                <div class="col-6">
                    <p><strong>Penerima</strong></p>
                    <br><br>
                    <p>_____________________</p>
                </div>
                <div class="col-6 text-end">
                    <table class="table table-borderless">
                        <tr>
                            <th>Total</th>
                            <td class="text-end">Rp {{ number_format($wo->harga, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Deposit</th>
                            <td class="text-end"><b>Rp {{ number_format($pembayaran->deposit, 0, ',', '.') }}</b></td>
                        </tr>
                        <tr>
                            <th>Sisa</th>
                            <td class="text-end"><b>Rp {{ number_format($pembayaran->sisapembayaran, 0, ',', '.') }}</b></td>
                        </tr>
                    </table>
                    <p class="mt-4">Duta Utama Grafika</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@media print {

    /* Sembunyikan elemen yang tidak dicetak */
    .no-print,
    .sidebar,
    .navbar,
    footer,
    header,
    nav,
    .topbar {
        display: none !important;
    }

    /* Area konten agar full kertas */
    .content-wrapper,
    .container,
    .card {
        margin: 0 !important;
        padding: 0 !important;
        width: 100% !important;
        box-shadow: none !important;
        border: none !important;
    }

    body {
        background: #fff !important;
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
        font-size: 13px !important;
        line-height: 1.35;
    }

    /* Teks tebal */
    .container *,
    .card *,
    table *,
    #printArea * {
        font-weight: 900 !important;
        color: #000 !important;
    }

    /* TABEL FULL WIDTH */
    table {
        width: 100% !important;
        border-collapse: collapse !important;
        table-layout: auto !important;
    }

    /* BORDER TEBAL */
    table th,
    table td {
        border: 2px solid #000 !important;
        padding: 6px 8px !important;
        vertical-align: top !important;
        white-space: normal !important;
    }

    /* HEADER TABEL */
    table th {
        background: #eaeaea !important;
        font-size: 13px !important;
    }

    /* Rincian tambahan <pre> */
    pre {
        font-family: inherit !important;
        white-space: pre-wrap !important;
        border: 2px solid #000 !important;
        padding: 8px !important;
        background: #f9f9f9 !important;
    }

    /* Hilangkan DataTables control */
    .dataTables_length,
    .dataTables_filter,
    .dataTables_info,
    .dataTables_paginate {
        display: none !important;
    }

    .dataTables_wrapper {
        overflow: visible !important;   /* cegah tabel kepotong */
    }

    /* FOOTER OTOMATIS */
    body:after {
        content: "Dicetak pada: {{ date('d-m-Y H:i') }}";
        display: block;
        text-align: center;
        margin-top: 40px;
        font-size: 11px;
        color: #333;
        font-weight: 700;
    }
}
</style>

@endsection
