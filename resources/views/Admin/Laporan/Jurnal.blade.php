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

    .print-area {
        width: 100% !important;
        margin: 0 auto !important;
    }

    table {
        font-size: 12px;
    }
}

.table .text-right { text-align: right; }
.table .text-center { text-align: center; }
</style>


<div class="container mt-4 print-area">
    <h3 class="text-center mb-1">Jurnal Umum</h3>
    <p class="text-center mb-4">Utama Grafika</p>

    <button class="btn btn-primary mb-3 no-print" onclick="window.print()">Print Laporan</button>

    <div class="table-responsive">
        <table class="table table-bordered table-striped small">
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

                @foreach ($Jurnal as $group => $items)
                    @foreach ($items as $data)

                        @php
                            try {
                                $tanggal = $data->created_at instanceof \Carbon\Carbon
                                    ? $data->created_at->format('d-m-Y H:i:s')
                                    : \Carbon\Carbon::parse($data->created_at)->format('d-m-Y H:i:s');
                            } catch (\Exception $e) {
                                $tanggal = $data->created_at ?? '-';
                            }
                        @endphp

                        <tr>
                            <td>{{ $tanggal }}</td>
                            <td>{{ $data->idakun->nama ?? '-' }}</td>
                            <td class="text-center">{{ $data->idnota }}</td>
                            <td class="text-right">Rp {{ number_format($data->debit, 0, ',', '.') }}</td>
                            <td class="text-right">Rp {{ number_format($data->kredit, 0, ',', '.') }}</td>
                        </tr>

                        @php
                            $debittotal += $data->debit;
                            $kredittotal += $data->kredit;
                        @endphp

                    @endforeach
                @endforeach
            </tbody>

            <tfoot>
                <tr class="font-weight-bold">
                    <td colspan="3" class="text-center">Total</td>
                    <td class="text-right">Rp {{ number_format($debittotal, 0, ',', '.') }}</td>
                    <td class="text-right">Rp {{ number_format($kredittotal, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection
