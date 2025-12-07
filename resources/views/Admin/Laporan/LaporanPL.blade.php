@extends('Admin.template.main')

@section('judul')
       Data Penjualan
@endsection

@section('tittleCard')
    <h2>Data Penjualan</h2>
@endsection

@section('Content1')

{{-- ===================== PRINT CSS ===================== --}}
<style>
@media print {

    /* Sembunyikan elemen yang tidak dicetak */
    .no-print,
    nav, header, aside,
    .sidebar, .navbar, .topbar,
    footer {
        display: none !important;
    }

    /* Area print full */
    .print-area {
        width: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    /* Semua teks tebal */
    .print-area,
    .print-area * {
        font-weight: 900 !important;
        color: #000 !important;
    }

    /* Hilangkan tampilan DataTables yg mengganggu saat print */
    .dataTables_length,
    .dataTables_filter,
    .dataTables_info,
    .dataTables_paginate {
        display: none !important;
    }

    /* Table harus full width */
    .dataTables_wrapper {
        overflow: visible !important;
    }

    /* BORDER TABEL TEBAL SAAT PRINT */
    .print-area table {
        width: 100% !important;
        border-collapse: collapse !important;
        table-layout: auto !important; /* mencegah kepotong */
    }

    .print-area table th,
    .print-area table td {
        border: 2px solid #000 !important;
        padding: 6px !important;
        white-space: normal !important; /* teks panjang tidak kepotong */
    }

    /* Header lebih mencolok */
    .print-area table th {
        background: #eaeaea !important;
        font-weight: 900 !important;
    }
}
</style>





{{-- ===================== PRINT AREA WRAPPER START ===================== --}}
<div class="print-area">

    <h3 class="text-center mb-4 no-print">Laporan Penjualan – Utama Grafika</h3>

    <!-- Tombol print -->
    <button onclick="window.print()" class="btn btn-primary mb-3 no-print">
        Print Laporan
    </button>

    {{-- ===================== TABEL ASLI (TIDAK DIUBAH) ===================== --}}

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Penjualan</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nomor Nota</th>
                            <th>Nama Pemesan</th>
                            <th>Jenis Pesanan</th>
                            <th>Detail</th>
                            <th>Total Bayar</th>
                            <th>Dibayarkan</th>
                            <th>Sisa</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $totalbayar = 0;
                            $totaldeposit = 0;
                            $totalsisa = 0;
                        @endphp

                        @foreach ($nota as $data)
                            <tr>
                                <td>{{ $data['created_at'] }}</td>
                                <td>{{ $data['id'] }}</td>
                                <td>{{ $data->ModelwoRS->nama_pesanan }}</td>
                                <td>{{ $data->ModelwoRS->jenis_pesanan }}</td>
                                 <td>@php
                                        $detail = array_filter([
                                            $data->ModelwoRS->jenis_kertas     ? "Jenis Kertas: {$data->ModelwoRS->jenis_kertas}" : null,
                                            $data->ModelwoRS->warna_tinta      ? "Warna Tinta: {$data->ModelwoRS->warna_tinta}" : null,
                                            $data->ModelwoRS->ukuran_cetak     ? "Ukuran Cetak: {$data->ModelwoRS->ukuran_cetak}" : null,
                                            $data->ModelwoRS->ukuran_jadi      ? "Ukuran Jadi: {$data->ModelwoRS->ukuran_jadi}" : null,
                                            $data->ModelwoRS->ukuran_rangka    ? "Ukuran Rangka: {$data->ModelwoRS->ukuran_rangka}" : null,
                                            $data->ModelwoRS->reproduksi       ? "Reproduksi: {$data->ModelwoRS->reproduksi}" : null,
                                            $data->ModelwoRS->sistemjilid      ? "Sistem Jilid: {$data->ModelwoRS->sistemjilid}" : null,
                                            $data->ModelwoRS->statusorder      ? "Status Order: {$data->ModelwoRS->statusorder}" : null,
                                            $data->ModelwoRS->plat             ? "Plat: {$data->ModelwoRS->plat}" : null,
                                            $data->ModelwoRS->nomoratorstart   ? "Nomorator Start: {$data->ModelwoRS->nomoratorstart}" : null,
                                            $data->ModelwoRS->isperbuku        ? "Isi Per Buku: {$data->ModelwoRS->isperbuku}" : null,
                                            $data->ModelwoRS->keterangan       ? "Keterangan: {$data->ModelwoRS->keterangan}" : null,
                                        ]);
                                        @endphp

                                        {{ implode(' - ', $detail) }}

                                </td>
                                <td>Rp.{{ number_format($data['totalbayar'], 0, ',', '.') }}</td>
                                <td>Rp.{{ number_format($data['deposit'], 0, ',', '.') }}</td>
                                <td>Rp.{{ number_format($data['sisapembayaran'], 0, ',', '.') }}</td>
                                <td>{{ $data->ModelwoRS->status }}</td>
                            </tr>

                            @php
                                $totalbayar += $data['totalbayar'];
                                $totaldeposit += $data['deposit'];
                                $totalsisa += $data['sisapembayaran'];
                            @endphp
                        @endforeach
                    </tbody>

                    <tfoot>
                        <th colspan="5"></th>
                        <th>Total Pembayaran : Rp.{{ number_format($totalbayar, 0, ',', '.') }}</th>
                        <th>Total Dibayarkan : Rp.{{ number_format($totaldeposit, 0, ',', '.') }}</th>
                        <th>Total Sisa : Rp.{{ number_format($totalsisa, 0, ',', '.') }}</th>
                        <th></th>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>

</div>
{{-- ===================== PRINT AREA END ===================== --}}

@endsection
