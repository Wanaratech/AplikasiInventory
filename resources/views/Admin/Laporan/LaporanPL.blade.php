@extends('Admin.template.main')

@section('judul')
    Data Penjualan
@endsection

@section('tittleCard')
    <h2>Data Penjualan</h2>
@endsection

@section('Content1')

{{-- ===================== PRINT CSS KHUSUS DOT MATRIX LANDSCAPE ===================== --}}
<style>
@media print {
    /* Set orientasi Landscape */
    @page {
        size: landscape;
        margin: 0.5cm;
    }

    /* Sembunyikan elemen non-cetak */
    .no-print, nav, header, aside, .sidebar, .navbar, .topbar, footer, .dataTables_length, .dataTables_filter, .dataTables_info, .dataTables_paginate {
        display: none !important;
    }

    .print-area {
        width: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    /* Font Monospace agar tajam di Dot Matrix */
    .print-area, .print-area table {
        font-family: "Courier New", Courier, monospace !important;
        font-size: 9pt !important;
        color: #000 !important;
    }

    .print-area table {
        width: 100% !important;
        border-collapse: collapse !important;
        table-layout: auto;
    }

    .print-area table th, .print-area table td {
        border: 1px solid #000 !important;
        padding: 3px !important;
        word-wrap: break-word;
    }

    .card { border: none !important; box-shadow: none !important; }
    .card-header { display: none !important; }
}
</style>

<div class="print-area">
    <h3 class="text-center mb-4 no-print">Laporan Penjualan – Utama Grafika</h3>

    {{-- ===================== FILTER SECTION (OFFLINE READY) ===================== --}}
    <div class="card shadow mb-3 no-print">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <label class="font-weight-bold">Filter Mesin (Plat):</label>
                    <select id="filterMesin" class="form-control">
                        <option value="">-- Semua Mesin --</option>
                        <option value="Gramfus">Gramfus</option>
                        <option value="P 52">P 52</option>
                        <option value="P 58">P 58</option>
                        <option value="P 72">P 72</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="font-weight-bold">Filter Status:</label>
                    <select id="filterStatus" class="form-control">
                        <option value="">-- Semua Status --</option>
                        <option value="Selesai">Selesai</option>
                        <option value="Piutang">Piutang</option>
                    </select>
                </div>
                <div class="col-md-6 d-flex align-items-end">
                    <button onclick="window.print()" class="btn btn-primary mr-2">
                        <i class="fas fa-print"></i> Print Landscape
                    </button>
                    <button onclick="location.reload()" class="btn btn-secondary">
                        <i class="fas fa-sync"></i> Reset Filter
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 no-print">
            <h6 class="m-0 font-weight-bold text-primary">Data Penjualan</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>No Nota</th>
                            <th>Pemesan</th>
                            <th>Jenis</th>
                            <th>Detail WO</th>
                            <th>Penjualan</th>
                            <th>Mesin</th>
                            <th>Total Bayar</th>
                            <th>Dibayar</th>
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
                                <td>
                                    @php
                                        $detail = array_filter([
                                            $data->ModelwoRS->jenis_kertas ? "K: {$data->ModelwoRS->jenis_kertas}" : null,
                                            $data->ModelwoRS->warna_tinta ? "T: {$data->ModelwoRS->warna_tinta}" : null,
                                            $data->ModelwoRS->keterangan ? "Ket: {$data->ModelwoRS->keterangan}" : null,
                                        ]);
                                    @endphp
                                    {{ implode(' - ', $detail) }}
                                </td>
                                <td>{{ $data->nota->pluck('barang')->implode(', ') }}</td>
                                <td>{{ $data->ModelwoRS->plat }}</td>
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
                        <tr style="background-color: #f8f9fc;">
                            <th colspan="7" style="text-align:right">TOTAL FILTERED:</th>
                            <th id="footerTotalBayar">Rp.{{ number_format($totalbayar, 0, ',', '.') }}</th>
                            <th id="footerTotalDeposit">Rp.{{ number_format($totaldeposit, 0, ',', '.') }}</th>
                            <th id="footerTotalSisa">Rp.{{ number_format($totalsisa, 0, ',', '.') }}</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- 
    PANGGIL JS LOKAL (OFFLINE MODE)
    Pastikan file ini ada di folder public/vendor/... atau public/js/... 
    Biasanya SB Admin 2 sudah menyediakan file ini secara lokal.
--}}
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
$(document).ready(function() {
    // Inisialisasi DataTable secara offline
    if ($.fn.DataTable.isDataTable('#dataTable')) {
        var table = $('#dataTable').DataTable();
    } else {
        var table = $('#dataTable').DataTable({
            "paging": false, // Matikan paging agar semua data bisa dihitung saat print
            "ordering": true,
            "info": false
        });
    }

    // Filter Mesin (Kolom ke-7 / Index 6)
    $('#filterMesin').on('change', function() {
        table.column(6).search(this.value).draw();
        updateFooterTotal(table);
    });

    // Filter Status (Kolom ke-11 / Index 10)
    $('#filterStatus').on('change', function() {
        table.column(10).search(this.value).draw();
        updateFooterTotal(table);
    });

    function updateFooterTotal(api) {
        var totalBayar = 0;
        var totalDeposit = 0;
        var totalSisa = 0;

        // Ambil baris yang terlihat setelah filter
        api.rows({ search: 'applied' }).every(function() {
            var node = this.node();
            
            // Regex untuk ambil angka saja (menghilangkan Rp dan titik)
            var bayar = $(node).find('td:eq(7)').text().replace(/[^\d]/g, '');
            var deposit = $(node).find('td:eq(8)').text().replace(/[^\d]/g, '');
            var sisa = $(node).find('td:eq(9)').text().replace(/[^\d]/g, '');

            totalBayar += parseInt(bayar) || 0;
            totalDeposit += parseInt(deposit) || 0;
            totalSisa += parseInt(sisa) || 0;
        });

        // Update teks footer dengan format ribuan
        $('#footerTotalBayar').html('Rp.' + totalBayar.toLocaleString('id-ID'));
        $('#footerTotalDeposit').html('Rp.' + totalDeposit.toLocaleString('id-ID'));
        $('#footerTotalSisa').html('Rp.' + totalSisa.toLocaleString('id-ID'));
    }
});
</script>

@endsection