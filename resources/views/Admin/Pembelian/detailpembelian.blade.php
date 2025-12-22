@extends('Admin.template.main')

@section('judul')
    Detail Pembelian
@endsection

@section('Judulisi')
    <h2>Detail Nota Pembelian</h2>
@endsection

@section('Content1')

<div class="container mt-4">

    {{-- HEADER NOTA --}}
    @if(count($pembelianbarang) > 0)
        @php
            $nota = $pembelianbarang[0]->notaPembelian;
        @endphp

        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <strong>ID Nota</strong><br>
                        {{ $nota->id }}
                    </div>
                    <div class="col-md-4">
                        <strong>Total</strong><br>
                        Rp {{ number_format($nota->total,0,',','.') }}
                    </div>
                    <div class="col-md-4">
                        <strong>Status</strong><br>
                        @if($nota->status_nota == 'Hutang')
                            <span class="badge bg-warning text-dark">Hutang</span>
                        @elseif($nota->status_nota == 'Selesai')
                            <span class="badge bg-success">Selesai</span>
                        @else
                            <span class="badge bg-secondary">{{ $nota->status_nota }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- TABLE BARANG --}}
    <div class="card">
        <div class="card-header bg-primary text-white">
            Detail Barang Pembelian
        </div>

        <div class="card-body p-0">
            <table class="table table-bordered m-0">
                <thead class="table-light">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Barang</th>
                        <th width="10%">Jumlah</th>
                        <th width="15%">Harga Beli</th>
                        <th width="15%">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pembelianbarang as $i => $item)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $item->barangBeli->nama_barang ?? '-' }}</td>
                            <td>{{ $item->jumlah_beli }}</td>
                            <td>Rp {{ number_format($item->harga_beli,0,',','.') }}</td>
                            <td>Rp {{ number_format($item->subtotal_harga_beli,0,',','.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                Tidak ada data pembelian
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
