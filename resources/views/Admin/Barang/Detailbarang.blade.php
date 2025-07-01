@extends('Admin.template.main')

@section('judul')
        Detail Barang
@endsection
@section('Judulisi')
    <h2>Detail Barang</h2>
@endsection
@section('Content1')
    <style>
    body {
      background-color: #f9f9f9;
      font-family: Arial, sans-serif;
    }
    .box-detail {
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 20px;
      margin: 40px auto;
      max-width: 800px;
    }
    .title {
      font-weight: 600;
      font-size: 20px;
      margin-bottom: 20px;
      border-bottom: 2px solid #eee;
      padding-bottom: 10px;
    }
    .row-detail {
      margin-bottom: 15px;
    }
    .label {
      font-size: 14px;
      color: #777;
    }
    .value {
      font-size: 18px;
      font-weight: 500;
      color: #333;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="box-detail">
      <div class="title">Detail Produk</div>

      <div class="row row-detail">
        <div class="col-md-6">
          <div class="label">Nama Barang</div>
          <div class="value">{{$databarang->nama_barang}}</div>
        </div>
        <div class="col-md-6">
          <div class="label">Kode Barang</div>
          <div class="value">{{$databarang->id_kategori}}</div>
        </div>
      </div>

      <div class="row row-detail">
        <div class="col-md-6">
          <div class="label">Stok Tersedia</div>
          <div class="value">{{$databarang->stok_barang}} PCS</div>
        </div>
        <div class="col-md-6">
          <div class="label">Harga Modal</div>
          <div class="value">Rp {{number_format($databarang->HargaBeli, 2, ',', '.')}}</div>
        </div>
      </div>

      <div class="row row-detail">
        <div class="col-md-6">
          <div class="label">Harga Jual</div>
          <div class="value">Rp {{number_format($databarang->HargaJual, 2, ',', '.')}}</div>
        </div>
        <div class="col-md-6">
          <div class="label">Jumlah Penjualan</div>
          <div class="value">0</div>
        </div>
      </div>

       

    </div>
  </div>




@endsection