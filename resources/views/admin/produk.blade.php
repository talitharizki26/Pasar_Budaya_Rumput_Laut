<!DOCTYPE html>
<html lang="en">

<head>

  @include("admin.admincss")

</head>


<body>


  <div class="container-scroller">

    @include("admin.navbar")

    <div class="main-panel">
      <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title"> Lihat Daftar Produk Anda </h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Data Produk</a></li>
            </ol>
          </nav>
        </div>
        <div class="row">
          <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Form Tambah Produk</h4>
                <form class="forms-sample" action="{{url('/uploadproduk')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="jenis">Jenis Rumput Laut</label>
                    <input class="form-control" name="jenis_rumputlaut" placeholder="Jenis Rumput Laut" required>
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi Rumput Laut</label>
                    <textarea rows="7" class="form-control" name="deskripsi_rumputlaut" placeholder="Deskripsi Rumput Laut" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga Rumput Laut</label>
                    <input class="form-control" name="harga_rumputlaut" placeholder="Rp. " required>
                  </div>
                  <div class="form-group">
                    <label for="lokasi">Lokasi Rumput Laut</label>
                    <input class="form-control" name="lokasi_rumputlaut" placeholder="Lokasi Rumput Laut" required>
                  </div>
                  <div class="form-group">
                    <label for="durasi">Durasi Tahan Rumput Laut</label>
                    <input class="form-control" name="durasitahan_rumputlaut" placeholder="Hari" required>
                  </div>
                  <div class="form-group">
                    <label for="stok">Stok Rumput Laut</label>
                    <input type="number" class="form-control" name="stok_rumputlaut" placeholder="Kilogram" required>
                  </div>

                  <!-- <div class="form-group">
                    <label for="durasi">  ID pembudidaya</label>
                    <input class="form-control" name="durasitahan_rumputlaut" placeholder="Hari" required>
                  </div> -->


                  <!-- <div class="form-group">
                    <label for="durasi">Ketersediaan Rumput Laut</label>
                    <div class="col-sm-5">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="ketersediaan_rumputlaut" id="ya" value="Ya"> Tersedia </label>
                      </div>
                    </div>
                    <div class="col-sm-10">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="ketersediaan_rumputlaut" id="tidak" value="Tidak"> Tidak Tersedia </label>
                      </div>
                    </div>
                  </div> -->
                  <div class="form-group">
                    <label for="gambar">Foto Rumput Laut</label>
                    <input type="file" class="form-control" name="gambar_rumputlaut" required>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2" value="Save">Tambah Produk</button>
                  <button type="reset" class="btn btn-dark">Batal</button>
                </form>
              </div>
            </div>
          </div>

          <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Tabel Produk</h4>
                <div class="row" style="float:right">
                  <form action="{{url('/search_produk')}}" method="get" class="nav-link mt-md-0 d-none d-lg-flex search">
                    @csrf
                    <input class="form-control" type="text" name="search" style="color:white; width:300px" placeholder="Cari produk">
                    <button style="margin-left:25px" type="submit" value="Search" class="btn btn-primary"><i style="padding-left:5px" class="mdi mdi-magnify"></i></button>
                  </form>
                </div><br>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr align="center">
                        <th> Gambar</th>
                        <th> Jenis </th>
                        <th> Harga </th>
                        <th> Lokasi </th>
                        <th> Stok </th>
                        <th> Aksi </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $data)

                      <tr align="center">

                        <td>
                          <a href="/produkimage/{{$data->gambar_rumputlaut}}">
                            <img height="200" width="200" src="/produkimage/{{$data->gambar_rumputlaut}}">
                          </a>
                        </td>

                        <td>{{$data->jenis_rumputlaut}}</td>
                        <td>Rp. {{number_format($data->harga_rumputlaut)}}</td>
                        <td>{{$data->lokasi_rumputlaut}}</td>
                        <td>{{$data->stok_rumputlaut}} Kg</td>

                        <td><a class="btn-sm btn-success" href="{{url('/editproduk',$data->id_rumputlaut)}}">Edit</a> <a class="btn-sm btn-danger delete" href="#" id-produk="{{$data->id_rumputlaut}}">Hapus</a></td>

                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- content-wrapper ends -->
      @include("admin.footer")
    </div>

  </div>

  @include("admin.adminscript")


</body>

<script>
  $('.delete').click(function() {
    var id_artikel = $(this).attr('id-produk');
    swal({
        title: "Ingin Menghapus Data Rumput Laut?",
        text: "Data tidak dapat dikembalikan!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        console.log(willDelete);
        if (willDelete) {
          window.location = "{{url('/hapusproduk',$data->id_rumputlaut)}}";
          swal("Rumput Laut Berhasil Dihapus!", {
            icon: "success",
          });
        } else {
          swal("Data Gagal Dihapus!");
        }
      });
  });
</script>

</html>