@extends('Admin.template.main')

@section('judul')
       Data PO
@endsection
@section('tittleCard')
    <h2>Detail PO</h2>
@endsection
@section('Content1')
@if (session()->has('msgdone'))
  <script>

    Swal.fire({
    title: "Berhasil",
    text: "Berhasil Tambah Purchase Order",
    icon: "success"
    });
</script>
      
  @endif

  @if (session()->has('msgdoneEdt'))
  <script>

    Swal.fire({
    title: "Berhasil",
    text: "Berhasil Edit Barang",
    icon: "success"
    });
</script>
      
  @endif

  @if (session()->has('msgdonehps'))
  <script>

    Swal.fire({
    title: "Berhasil",
    text: "Berhasil Dihapus ",
    icon: "success"
    });
</script>
      
  @endif

 
    @if (session()->has('gagal'))
  <script>

    Swal.fire({
    title: "Gagal",
    text: "Kesalahan",
    icon: "error"
    });
</script>
      
  @endif

  @if(session('msgerror'))
    <div class="alert alert-danger">
        {{ session('msgerror') }}
    </div>
@endif


 <button class = "btn btn-primary">cetak Surat Jalan (belum)</button>

 <br>
 <br>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Purchase Order</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>id PO</th>
                                            <th>Rekanan</th>
                                            <th>Barang</th>
                                            <th>qty</th>
                                            <th>status</th>
                                          <th>tools</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach ($datapo as $data)
                                             <tr>
                                                    <td>{{ $data->id_po }}</td>
                                                    <td>{{ $data->frekanan->nama_rekanan}}</td>
                                                    <td>{{ $data->fbarang->nama_barang }}</td>
                                                    <td>{{ $data->qty }}</td>
                                                    <td>{{$data->status}}</td>
                                                    
                                                     
                                                    <td>
                                                      <div class="dropdown">
                                                          <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                            Menus
                                                          </button>
                                                          <ul class="dropdown-menu">
                                                            <form action="">
                                                              @csrf
                                                              
                                                              <input type="text" hidden name = "idpoDetail" value="{{ $data['id'] }}">

                                                              <li><button class="dropdown-item" type="submit" name ="detail" value ="detail">Done</button></li>
                            
                                                          
                                                            </form>
                                                          </ul>
                                                        </div>

                                                                                     
                                                    </td>
                                            
                                            </tr>
                                        @endforeach
                                       
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>  
                  </div>



   

@endsection