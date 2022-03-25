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
								</p>
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr align="center">
												<th> Judul</th>
												<th> Sumber</th>
												<th> Tgl Upload</th>
												<th> Gambar</th>
												<th> Aksi </th>
											</tr>
										</thead>
										<tbody>
											@foreach($data as $data)

											<tr align="center">

												<td>{{$data->judul_artikel}}</td>
												<td>{{$data->sumber_artikel}}</td>
												<td>{{$data->tglupload_artikel}}</td>
												<td><img height="100" width="100" src="/artikelimage/{{$data->gambar_artikel}}"></td>
												<td><a href="{{url('/editartikel',$data->id_artikel)}}">Edit</a> || <a onclick="return confirm('Apakah anda ingin menghapus data ini?')" href="{{url('/hapusartikel',$data->id_artikel)}}">Hapus</a></td>
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