@extends('Admin.template.main')

@section('judul')
        Profile
@endsection
@section('tittleCard')
    <h2>Profile {{ Auth::user()->jenis_akun }}</h2>
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

   <form method="POST" action="/Admin/UpdateDataAdmin">
    @csrf

    <input type="text" value = {{Auth::user()->id}} name = "id" hidden>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama</label>
    <input type="text"  class="form-control" id="exampleInputEmail1"  name = "nama" value="{{ Auth::user()->name }}" aria-describedby="emailHelp">
    
  </div>

   <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">User Name</label>
    <input type="text"  class="form-control" id="exampleInputEmail1" name = "username" value="{{ Auth::user()->username }}" aria-describedby="emailHelp">
    
  </div>



  <button type="submit" name="submit" value = "input" class="btn btn-primary">Update Data</button>
  <button type="submit" name="cancel"  value ="cancel" class="btn btn-danger">Cancle</button>
</form>
@endsection