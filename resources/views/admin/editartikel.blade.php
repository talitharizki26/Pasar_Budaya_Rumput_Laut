<!DOCTYPE html>
<html lang="en">

<head>

	<base href="/public">

	@include("admin.admincss")

</head>

<body>

	<div class="container-scroller">

		@include("admin.navbar")


		<div class="main-panel">
			<div class="content-wrapper">
				<div class="page-header">
					<h3 class="page-title"> Edit Data Artikel</h3>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Edit Artikel</a></li>
						</ol>
					</nav>
				</div>
				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Form Edit Artikel</h4>
								<form class="forms-sample" action="{{url('/updateartikel',$data->id_artikel)}}" method="post" enctype="multipart/form-data">
									@csrf
									<div class="form-group">
										<label for="judul">Judul Artikel</label>
										<input class="form-control" name="judul_artikel" value="{{$data->judul_artikel}}" required>
									</div>
									<div class="form-group">
										<label for="isi">Isi Artikel</label>
										<input class="form-control" name="isi_artikel" value="{{$data->isi_artikel}}" required>
									</div>
									<div class="form-group">
										<label for="sumber">Sumber Artikel</label>
										<input class="form-control" name="sumber_artikel" value="{{$data->sumber_artikel}}" required>
									</div>
									<div class="form-group">
										<label for="tglupload">Tanggal Upload Artikel</label>
										<input type="date" class="form-control" name="tglupload_artikel" value="{{$data->tglupload_artikel}}" required>
									</div>
									<div class="form-group">
										<label for="gambar">Gambar Sebelumnya</label><br>
										<img height="250" width="250" src="/artikelimage/{{$data->gambar_artikel}}">
									</div>
									<div class="form-group">
										<label for="gambar">Gambar Baru</label>
										<input type="file" class="form-control" name="gambar_artikel">
									</div>
									<button type="submit" class="btn btn-primary mr-2" value="Update Chef">Edit Artikel</button>
									<a href="{{url('/artikel')}}" class="btn btn-dark">Batal</a>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@include("admin.adminscript")


</body>

</html>