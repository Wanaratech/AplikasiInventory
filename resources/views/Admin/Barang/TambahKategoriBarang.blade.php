@extends('Admin.template.main')

@section('judul')
       Kategori barang
@endsection
@section('tittleCard')
    <h2>Kategori Barang</h2>
@endsection
@section('Content1')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


  @if (session()->has('MsgAkunada'))
  <script>

    Swal.fire({
    title: "Perhatian",
    text: "Username Tersebut Sudah Ada",
    icon: "warning"
    });
</script>
      
  @endif

    @if (session()->has('MsgBerhasilUp'))
  <script>

    Swal.fire({
    title: "Berhasil",
    text: "Berhasil Update",
    icon: "success"
    });
</script>
      
  @endif

 
    @if (session()->has('gagal'))
  <script>

    Swal.fire({
    title: "Gagal",
    text: "Gagal Update",
    icon: "error"
    });
</script>
      
  @endif

<!--        

    Table Kategori Barang
-->



   <form method="POST" action="/Admin/UpdateDataAdmin">
    @csrf

 
  <div class="mb-3">

    @php
        $randomnumber = rand(1,999999);
    @endphp
    <label for="exampleInputEmail1" class="form-label">Id</label>
    <input type="text"  class="form-control" id="exampleInputEmail1"  name = "id" readonly value = {{ $randomnumber }} aria-describedby="emailHelp">
    
  </div>

   <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Kategori Barang</label>
    <input type="text"  class="form-control" id="exampleInputEmail1" name = "kategori" aria-describedby="emailHelp">
    
  </div>



  <button type="submit" name="submit" value = "input" class="btn btn-primary">Update Data</button>
  <button type="submit" name="cancel"  value ="cancel" class="btn btn-danger">Cancle</button>
</form>

   

@endsection