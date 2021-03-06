<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Data Penitipan Hewan</title>
  </head>
  <body>
    <h1 class="text-center">Data Penitipan Hewan</h1>
    <div class="contriner p-lg-5">
    <a href="tambahhewan" type="button" class="btn btn-success">Tambah</a>
    <div class="row g-3 align-items-center mt-3">
      <div class="col-auto">
        <form action="/hewan" method="GET">
        <input type="search"  name="search" class="form-control" aria-describedby="passwordHelpInline">
      </form>
      </div>
    </div>
        <div class="row p-lg-5">
            <div class="text-center">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Jenis Hewan</th>
                        <th scope="col">No Telpon</th>
                        <th scope="col">Tanggal dibuat</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @php

                    $no = 1;


                    @endphp
                      
                    @foreach ($data as $index => $row)
                      <tr>
                        <th scope="row">{{$index + $data->firstItem()}}</th>
                        <td>{{$row->namapemilik}}</td>
                        <td>
                          <img src="{{asset('fotohewan/'.$row->foto)}}"  alt="" style="width: 40px;">
                        </td>
                        <td>{{$row->jenishewan}}</td>
                        <td>{{$row->nomorhp}}</td>
                        <td>{{$row->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="#" type="button" class="btn btn-danger delete" data-id="{{$row->id}}" data-nama="{{$row->namapemilik}}">Delete</a>
                            <a href="/tampilkandata/{{$row->id}}" type="button" class="btn btn-warning">Edit</a>
                        </td>
                      </tr>

                      @endforeach
                    </tbody>
                  </table>
                  {{ $data->links() }}

            </div>
            
        </div>
    </div>
       

   
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
  <script>
    $('.delete').click(function(){
      var hewan = $(this).attr('data-id');
      var nama = $(this).attr('data-nama');
      swal({
  title: "Yakin ?",
  text: "Kamu akan menghapus data pegawai dengan id "+ nama +" ",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    window.location = "/delete/"+ hewan +""
    swal("Data Berhasil Dihapus", {
      icon: "success",
    });
  } else {
    swal("Data tidak jadi di hapus");
  }
});
    });
      
  </script>

  <script>
  @if (Session::has('Berhasil'))
    toastr.success("{{Session::get('Berhasil')}}")
  @endif

  </script>
  
</html>