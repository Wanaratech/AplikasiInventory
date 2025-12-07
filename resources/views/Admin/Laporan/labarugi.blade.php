@extends('Admin.template.main')

@section('judul')
    Laporan Laba Rugi
@endsection

@section('Judulisi')
    <h2>Laporan Laba Rugi</h2>
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

{{-- ===================== PRINT-AREA START ===================== --}}
<div class="container my-4 print-area">
    <h3 class="text-center mb-4">Laporan Laba Rugi<br>Nama Perusahaan Anda<br></h3>
    
    {{-- Tombol print tidak ikut tercetak --}}
    <button class="btn btn-primary mb-3 no-print" onclick="window.print()">Print Laporan</button>

    <h4 class="mb-3">Laba Rugi</h4>
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Keterangan</th>
                <th class="text-end">Jumlah (Rp)</th>
            </tr>
        </thead>
        <tbody>
            {{-- PENDAPATAN --}}
            <tr class="table-secondary">
                <td><strong>PENDAPATAN</strong></td>
                <td></td>
            </tr>
            @php $totalPendapatan = 0; @endphp
            @foreach($akun as $a)
                {{-- Filter akun Pendapatan --}}
                @if(strtolower($a->keterangan) == 'income') 
                    <tr>
                        <td>&nbsp;&nbsp;{{ $a->nama }}</td>
                        <td class="text-end">Rp.{{ number_format($a->saldo,0,',','.') }}</td>
                    </tr>
                    @php $totalPendapatan += $a->saldo; @endphp
                @endif
            @endforeach
            <tr class="fw-bold">
                <td>Total Pendapatan</td>
                <td class="text-end border-top border-dark border-2">Rp.{{ number_format($totalPendapatan,0,',','.') }}</td>
            </tr>

            {{-- BEBAN --}}
            <tr class="table-secondary">
                <td><strong>BEBAN</strong></td>
                <td></td>
            </tr>
            @php $totalBeban = 0; @endphp
            @foreach($akun as $a)
                {{-- Filter akun Beban --}}
                @if(strtolower($a->keterangan) == 'expense') 
                    <tr>
                        <td>&nbsp;&nbsp;{{ $a->nama }}</td>
                        {{-- Beban ditampilkan sebagai nilai positif, namun dihitung sebagai pengurang --}}
                        <td class="text-end">Rp.{{ number_format($a->saldo,0,',','.') }}</td>
                    </tr>
                    @php $totalBeban += $a->saldo; @endphp
                @endif
            @endforeach
            <tr class="fw-bold">
                <td>Total Beban</td>
                <td class="text-end border-top border-dark border-2">Rp.{{ number_format($totalBeban,0,',','.') }}</td>
            </tr>

            {{-- LABA/RUGI BERSIH --}}
            @php $labaRugiBersih = $totalPendapatan - $totalBeban; @endphp

            <tr class="table-info fw-bold">
                <td>{{ $labaRugiBersih >= 0 ? 'Laba Bersih' : 'Rugi Bersih' }}</td>
                <td class="text-end border-top border-dark border-3">
                    Rp.{{ number_format(abs($labaRugiBersih),0,',','.') }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
{{-- ===================== PRINT-AREA END ===================== --}}

@endsection