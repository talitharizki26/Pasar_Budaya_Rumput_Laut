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
								<form class="forms-sample" action="{{url('/updateprofil',$data->noktp_pelanggan)}}" method="post" enctype="multipart/form-data">
									@csrf
									<div class="form-group">
										<label for="jenis">Nama </label>
										<input class="form-control" name="nama_pelanggan" value="{{$data->nama_pelanggan}}" required>
									</div>
									<div class="form-group">
										<label for="deskripsi">Alamat</label>
										<input class="form-control" name="alamat_pelanggan" value="{{$data->alamat_pelanggan}}" required>
									</div>
									<div class="form-group">
										<label for="harga">No HP </label>
										<input class="form-control" name="nohp_pelanggan" value="{{$data->nohp_pelanggan}}" required>
									</div>
									<div class="form-group">
										<label for="lokasi">Jenis Kelamin</label>
										<input class="form-control" name="jenkel_pelanggan" value="{{$data->jenkel_pelanggan}}" required>
									</div>
									<div class="form-group">
										<label for="durasitahan">Tanggal Lahir</label>
										<input class="form-control" name="tgllahir_pelanggan" value="{{$data->tgllahir_pelanggan}}" required>
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
										<img height="250" width="250" src="/userimage/{{$data->foto_pelanggan}}">
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