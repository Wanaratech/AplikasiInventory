@extends('Admin.template.main')

@section('judul')
        Tambah Work Order
@endsection
@section('Judulisi')
    <h2>Tambah Work Order</h2>
@endsection
@section('Content1')
   <div class="container mt-4">
    <form  method="POST" action="/Admin/Wo/ProsesAddwo">
        @csrf
        <!-- Tanggal -->
       
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="diterima_tgl" class="form-label">Diterima Tgl.</label>
                <input type="date" class="form-control" id="diterima_tgl" name="diterima_tgl">
            </div>
            <div class="col-md-3">
                {{-- <label for="selesai_tgl" class="form-label">Selesai Tgl.</label>
                <input type="date" class="form-control" id="selesai_tgl" name="selesai_tgl"> --}}
            </div>
        </div>

        <!-- Data Pesanan -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Nama Pemesan</label>
                <input type="text" class="form-control" name="nama_pemesan">
            </div>
            <div class="col-md-4">
                <label class="form-label">Jenis Pesanan</label>
                <input type="text" class="form-control" name="jenis_pesanan">
            </div>
            <div class="col-md-4">
                <label class="form-label">Jumlah Pesanan</label>
                <input type="number" class="form-control" name="jumlah_pesanan">
            </div>
        </div>

        <!-- Spesifikasi -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Jenis Kertas</label>
                <input type="text" class="form-control" name="jenis_kertas">
            </div>
            <div class="col-md-4">
                <label class="form-label">Warna Tinta</label>
                <input type="text" class="form-control" name="warna_tinta">
            </div>
            <div class="col-md-4">
                <label class="form-label">Ukuran Cetak</label>
                <input type="text" class="form-control" name="ukuran_cetak">
            </div>
        </div>

        <!-- Ukuran & Rangka -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Ukuran Jadi</label>
                <input type="text" class="form-control" name="ukuran_jadi">
            </div>
            <div class="col-md-4">
                <label class="form-label">Rangka/Susunan</label>
                <input type="text" class="form-control" name="rangka_susunan">
            </div>
        </div>

        <!-- Reproduksi -->
        <div class="mb-3">
            <label class="form-label">Reproduksi</label><br>
            @foreach (['Cetak Offset', 'Porporasi', 'Cetak Perfor', 'Folio', 'P52', 'P58', 'P72'] as $item)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="reproduksi" value="{{ $item }}">
                    <label class="form-check-label">{{ $item }}</label>
                </div>
            @endforeach
        </div>

        <!-- Lainnya -->
        <div class="mb-3">
            <label class="form-label">Lainnya</label><br>
            @foreach (['Sablon', 'Lem (Atas/Samping)', 'Cetak Ulang'] as $item)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="lainnya" value="{{ $item }}">
                    <label class="form-check-label">{{ $item }}</label>
                </div>
            @endforeach
        </div>

        <!-- Sistem Jilid -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Sistem Jilid</label>
                <input type="text" class="form-control" name="sistem_jilid">
            </div>
            <div class="col-md-4">
                <label class="form-label">Status Order</label>
                <input type="text" class="form-control" name="status_order">
            </div>
            <div class="col-md-4">
                <label class="form-label">Plat</label>
                <input type="text" class="form-control" name="plat">
            </div>
        </div>

        <!-- Nomorator & Tinta -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Nomorator Start</label>
                <input type="text" class="form-control" name="nomorator_start">
            </div>
            <div class="col-md-4">
                <label class="form-label">Warna Tinta</label>
                <input type="text" class="form-control" name="warna_tinta2">
            </div>
            <div class="col-md-4">
                <label class="form-label">Isi Perbuku</label>
                <input type="text" class="form-control" name="isi_perbuku">
            </div>
        </div>

        <!-- Harga -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Harga</label>
                <input type="text" class="form-control" name="harga">
            </div>
        </div>

        <!-- Tombol -->
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>

@endsection