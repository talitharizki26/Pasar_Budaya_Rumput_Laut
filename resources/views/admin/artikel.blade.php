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
					<h3 class="page-title"> Lihat Daftar Artikel Milik Anda </h3>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Data Artikel</a></li>
						</ol>
					</nav>
				</div>
				<div class="row">
					<div class="col-md-4 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Form Tambah Artikel</h4>
								<form class="forms-sample" action="{{url('/uploadartikel')}}" method="post" enctype="multipart/form-data">
									@csrf
									<div class="form-group">
										<label for="judul">Judul Artikel</label>
										<input class="form-control" name="judul_artikel" placeholder=" Judul Artikel" required>
									</div>
									<div class="form-group">
										<label for="isi">Isi Artikel</label>
										<textarea rows="10" class="form-control" name="isi_artikel" placeholder="Isi Artikel" required></textarea>
									</div>
									<div class="form-group">
										<label for="sumber">Sumber Artikel</label>
										<input class="form-control" name="sumber_artikel" placeholder="Sumber Artikel" required>
									</div>
									<div class="form-group">
										<label for="tglupload">Tanggal Upload Artikel</label>
										<input type="date" class="form-control" name="tglupload_artikel" placeholder="Tgl Upload Artikel" required>
									</div>
									<div class="form-group">
										<label for="gambar">Gambar Artikel</label>
										<input type="file" class="form-control" name="gambar_artikel" required>
									</div>
									<button type="submit" class="btn btn-primary mr-2" value="Save">Tambah Artikel</button>
									<button type="reset" class="btn btn-dark">Batal</button>
								</form>
							</div>
						</div>
					</div>

					<div class="col-md-8 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Tabel Artikel</h4>
								<div class="row" style="float:right">
									<form action="{{url('/search_artikel')}}" method="get" class="nav-link mt-md-0 d-none d-lg-flex search">
										@csrf
										<input class="form-control" type="text" name="search_artikel" style="color:white; width:300px" placeholder="Cari artikel">
										<button style="margin-left:25px" type="submit" value="Search" class="btn btn-primary"><i style="padding-left:5px" class="mdi mdi-magnify"></i></button>
									</form>
								</div><br>
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr align="center">
												<th> Gambar</th>
												<th> Judul</th>
												<th> Sumber</th>
												<th> Aksi </th>
											</tr>
										</thead>
										<tbody>
											@foreach($data as $data)

											<tr align="center">
												<td>
													<a href="/artikelimage/{{$data->gambar_artikel}}"><img height="200" width="200" src="/artikelimage/{{$data->gambar_artikel}}"></a>
												</td>
												<td>{{$data->judul_artikel}}</td>
												<td>{{$data->sumber_artikel}}</td>
												<td><a class="btn-sm btn-success" href="{{url('/editartikel',$data->id_artikel)}}">Edit</a>
													<!-- <a class="btn-sm btn-danger delete" href="#" id-artikel="{{$data->id_artikel}}">Hapus</a> -->
													<a href="{{url('/hapusartikel',$data->id_artikel)}}" class="btn-sm btn-danger" onclick=" return confirm('Yakin ingin menghapus data?')">Hapus</a>
												</td>
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
	// $('.delete').click(function() {
	// var id_artikel = $(this).attr('id-artikel');
	// swal({
	// title: "Ingin Menghapus Data Artikel?",
	// text: "Data tidak dapat dikembalikan!",
	// icon: "warning",
	// buttons: true,
	// dangerMode: true,
	// })
	// .then((willDelete) => {
	// 	console.log(willDelete);
	// 	if (willDelete) {
	// 		window.location = "{{url('/hapusartikel',$data->id_artikel)}}";
	// swal("Artikel Berhasil Dihapus!", {
	// 	icon: "success",
	// });
	// 			} else {
	// 				swal("Data Gagal Dihapus!");
	// 			}
	// 		});
	// });
	//
</script>

</html>