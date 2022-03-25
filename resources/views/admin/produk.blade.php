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
                  </div>
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
                </p>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr align="center">
                        <th> Jenis </th>
                        <th> Harga </th>
                        <th> Lokasi </th>
                        <th> Durasi Tahan</th>
                        <th> Tersedia </th>
                        <th> Gambar </th>
                        <th> Aksi </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $data)

                      <tr align="center">

                        <td>{{$data->jenis_rumputlaut}}</td>
                        <td>{{$data->harga_rumputlaut}}</td>
                        <td>{{$data->lokasi_rumputlaut}}</td>
                        <td>{{$data->durasitahan_rumputlaut}}</td>
                        <td>{{$data->ketersediaan_rumputlaut}}</td>
                        <td><img height="200" width="200" src="/produkimage/{{$data->gambar_rumputlaut}}"></td>

                        <td><a href="{{url('/editproduk',$data->id)}}">Edit</a> || <a onclick="return confirm('Apakah anda ingin menghapus data ini?')" href="{{url('/hapusproduk',$data->id)}}">Hapus</a></td>

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

</html>