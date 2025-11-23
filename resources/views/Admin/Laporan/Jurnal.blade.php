@extends('Admin.template.main')

@section('judul')
    Jurnal Umum
@endsection

@section('Judulisi')
    <h2>Jurnal Umum</h2>
@endsection

@section('Content1')

{{-- ===================== PRINT CSS ===================== --}}
<style>
@media print {

    /* SEMBUNYIKAN SEMUA ELEMEN DI LUAR PRINT-AREA */
    .no-print,
    header,
    nav,
    aside,
    .sidebar,
    .main-header,
    .main-sidebar,
    .footer,
    .navbar,
    .content-header,
    .topbar {
        display: none !important;
    }

    /* Pastikan print-area full width dan di tengah */
    .print-area {
        width: 100% !important;
        margin: 0 auto !important;
    }
}
</style>




{{-- ===================== PRINT-AREA START ===================== --}}
<div class="container mt-4 print-area">
    <h3 class="text-center mb-4">Jurnal Umum<br>Utama Grafika<br></h3>

    {{-- Tombol print tidak ikut tercetak --}}
    <button class="btn btn-primary mb-3 no-print" onclick="window.print()">Print Laporan</button>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark text-center">
            <tr>
                <th>Tanggal</th>
                <th>Nama Akun</th>
                <th>Referensi</th>
                <th>Debet</th>
                <th>Kredit</th>
            </tr>
        </thead>

        <tbody>
            @php
                $debittotal = 0;
                $kredittotal = 0;
            @endphp

            @foreach ($Jurnal as $idnota => $items)
                @php $first = true; @endphp
                
                @foreach ($items as $data)
                    <tr>
                        {{-- tampilkan tanggal sekali saja untuk tiap idnota --}}
                        @if ($first)
                            <td>{{ $data->created_at->format('d-m-Y') }}</td>
                            @php $first = false; @endphp
                        @else
                            <td></td>
                        @endif

                        <td>{{ $data->idakun->nama ?? '-' }}</td>
                        <td>{{ $data->idnota }}</td>
                        <td>Rp {{ number_format($data->debit, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($data->kredit, 0, ',', '.') }}</td>

                        @php
                            $debittotal += $data->debit;
                            $kredittotal += $data->kredit;
                        @endphp
                    </tr>
                @endforeach
            @endforeach
        </tbody>

        <tfoot class="font-weight-bold">
            <tr>
                <td colspan="3" class="text-center">Total</td>
                <td>Rp {{ number_format($debittotal, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($kredittotal, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
</div>
{{-- ===================== PRINT-AREA END ===================== --}}

@endsection
