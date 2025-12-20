@extends('Admin.template.main')

@section('judul')
        Tambah Operator
@endsection
@section('tittleCard')
    <h2>Tambah Operator</h2>
@endsection
@section('Content1')





    

<!--        

    Table Kategori Operator
-->



   <form method="POST" action="/Admin/Operator/OperatorAdd">
    @csrf

 
  <div class="mb-3">

 

   <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama Operator</label>
    <input type="text" required  class="form-control" id="exampleInputEmail1" name = "namaoperator" aria-describedby="emailHelp">
    
  </div>

  


  <button type="submit" name="submit" value = "input" class="btn btn-primary">Tambah Operator</button>

</form>



   

@endsection