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
					<h3 class="page-title"> Edit Data Produk</h3>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Edit Produk</a></li>
						</ol>
					</nav>
				</div>
				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Form Edit Produk</h4>
								<form class="forms-sample" action="{{url('/updateproduk',$data->id_rumputlaut)}}" method="post" enctype="multipart/form-data">
									@csrf
									<div class="form-group">
										<label for="jenis">Jenis Rumput Laut</label>
										<input class="form-control" name="jenis_rumputlaut" value="{{$data->jenis_rumputlaut}}" required>
									</div>
									<div class="form-group">
										<label for="deskripsi">Deskripsi Rumput Laut</label>
										<input class="form-control" name="deskripsi_rumputlaut" value="{{$data->deskripsi_rumputlaut}}" required>
									</div>
									<div class="form-group">
										<label for="harga">Harga Rumput Laut (Rupiah)</label>
										<input type="number" class="form-control" name="harga_rumputlaut" min="1000" value="{{$data->harga_rumputlaut}}" required>
									</div>
									<div class="form-group">
										<label for="lokasi">Lokasi Rumput Laut</label>
										<input class="form-control" name="lokasi_rumputlaut" value="{{$data->lokasi_rumputlaut}}" required>
									</div>
									<div class="form-group">
										<label for="durasitahan">Durasi Ketahanan Rumput Laut (Hari)</label>
										<input type="number" class="form-control" name="durasitahan_rumputlaut" min="1" value="{{$data->durasitahan_rumputlaut}}" required>
									</div>
									<div class="form-group">
										<label for="stok">Stok Rumput Laut (Kilogram)</label>
										<input type="number" class="form-control" name="stok_rumputlaut" min="0" value="{{$data->stok_rumputlaut}}" required>
									</div>
									<!-- <div class="form-group">
										<div class="col-sm-5">
											<div class="form-check">
												<label class="form-check-label">
													<input type="radio" class="form-check-input" name="ketersediaan_rumputlaut" value="Ya" id="ya" {{ ($data->ketersediaan_rumputlaut=="Ya")? 'checked' : "" }}>Tersedia </label>
											</div>
										</div>
										<div class=" col-sm-5">
										<div class="form-check">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="ketersediaan_rumputlaut" id="tidak" value="Tidak" {{ ($data->ketersediaan_rumputlaut=="Tidak")? 'checked' : "" }}> Tidak Tersedia </label>
										</div>
									</div>
							</div> -->
									<div class="form-group">
										<label for="gambar">Gambar Sebelumnya</label><br>
										<img height="250" width="250" src="/produkimage/{{$data->gambar_rumputlaut}}">
									</div>
									<div class="form-group">
										<label for="gambar">Gambar Baru</label>
										<input type="file" class="form-control" name="gambar_rumputlaut">
										@error('gambar_rumputlaut')
										<span class="text-danger">{{$message}}</span>
										@enderror
									</div>
									<button type="submit" class="btn btn-primary mr-2" value="Save">Edit Produk</button>
									<a href="{{url('/produk')}}" class="btn btn-dark">Batal</a>
								</form>
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