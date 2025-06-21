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



   

@endsection