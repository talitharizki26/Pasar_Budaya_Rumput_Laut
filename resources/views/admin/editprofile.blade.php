<div class="container-scroller">

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
							<form class="forms-sample" action="{{url('/updateprofile',$data->noktp_pembudidaya)}}" method="post" enctype="multipart/form-data">
								@csrf
								<div class="form-group">
									<label for="jenis">Nama </label>
									<input class="form-control" name="nama_pembudidaya" value="{{$data->nama_pembudidaya}}" required>
								</div>
								<div class="form-group">
									<label for="deskripsi">Alamat</label>
									<input class="form-control" name="alamat_pembudidaya" value="{{$data->alamat_pembudidaya}}" required>
								</div>
								<div class="form-group">
									<label for="harga">No HP </label>
									<input class="form-control" name="nohp_pembudidaya" value="{{$data->nohp_pembudidaya}}" required>
								</div>
								<div class="form-group">
									<label for="lokasi">Jenis Kelamin</label>
									<input class="form-control" name="jenkel_pembudidaya" value="{{$data->jenkel_pembudidaya}}" required>
								</div>
								<div class="form-group">
									<label for="durasitahan">Tanggal Lahir</label>
									<input class="form-control" name="tgllahir_pembudidaya" value="{{$data->tgllahir_pembudidaya}}" required>
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
									<img height="250" width="250" src="/userimage/{{$data->foto_pembudidaya}}">
								</div>
								<div class="form-group">
									<label for="gambar">Gambar Baru</label>
									<input type="file" class="form-control" name="gambar">
								</div>
								<button type="submit" class="btn btn-primary mr-2" value="Save">Edit Profile</button>
								<a href="{{url('/produk')}}" class="btn btn-dark">Batal</a>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>