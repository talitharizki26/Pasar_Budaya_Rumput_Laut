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
				<div class="row">
					<div class="col-sm-6 grid-margin">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Form Edit Profil</h4>
								<form class="forms-sample" action="{{url('/updateprofile',$data->noktp_pembudidaya)}}" method="post" enctype="multipart/form-data">
									@csrf
									<div class="form-group">
										<label for="nama">Nama Lengkap</label>
										<input class="form-control" name="nama_pembudidaya" value="{{$data->nama_pembudidaya}}" required>
									</div>
									<div class="form-group">
										<label for="alamat">Alamat</label>
										<input class="form-control" name="alamat_pembudidaya" value="{{$data->alamat_pembudidaya}}" required>
									</div>
									<div class="form-group">
										<label for="nohp">No. HP </label>
										<input class="form-control" name="nohp_pembudidaya" value="{{$data->nohp_pembudidaya}}" required>
									</div>
									<!-- <div class="form-group">
										<label for="jenkel">Jenis Kelamin</label>
										<input class="form-control" name="jenkel_pembudidaya" value="{{$data->jenkel_pembudidaya}}" required>
									</div> -->
									<div class="form-group">
										<label>Jenis Kelamin</label>
										<div class="col-sm-7">
											<div class="form-check">
												<label class="form-check-label">
													<input type="radio" class="form-control p_input" name="jenkel_pembudidaya" id="P" value="Perempuan" {{ ($data->jenkel_pembudidaya=="Perempuan")? 'checked' : "" }}> Perempuan </label>
											</div>
										</div>
										<div class="col-sm-10">
											<div class="form-check">
												<label class="form-check-label">
													<input type="radio" class="form-control p_input" name="jenkel_pembudidaya" id="L" value="Laki-Laki" {{ ($data->jenkel_pembudidaya=="Laki-Laki")? 'checked' : "" }}> Laki-laki </label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="tglahir">Tanggal Lahir</label>
										<input type="date" class="form-control" name="tgllahir_pembudidaya" value="{{$data->tgllahir_pembudidaya}}" required>
									</div>


									<div class="form-group">
										<label for="gambar">Gambar Sebelumnya</label><br>
										<img height="250" width="250" src="/userimage/{{$data->foto_pembudidaya}}">
									</div>
									<div class="form-group">
										<label for="gambar">Gambar Baru</label>
										<input type="file" class="form-control" name="gambar">
									</div>
									<button type="submit" class="btn btn-primary mr-2" value="Save">Edit Profile</button>
									<a href="{{url('/redirects')}}" class="btn btn-dark">Batal</a>
								</form>
							</div>
						</div>
					</div>



					@foreach($akun as $data)
					<div class="col-sm-6 grid-margin">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Form Ubah Password</h4>
								<form class="forms-sample" action="{{url('/updateprofile',$data->id_user)}}" method="post" enctype="multipart/form-data">
									@csrf
									<!-- <div class="form-group">
										<label for="nama"></label>
										<input class="form-control" name="nama_pembudidaya" value="{{$data->email}}" required>
									</div> -->
									<div class="form-group">
										<label for="alamat">Password</label>
										<input class="form-control" name="alamat_pembudidaya" value="{{$data->password}}" required>
									</div>

									<button type="submit" class="btn btn-primary mr-2" value="Save">Edit Profile</button>
									<a href="{{url('/redirects')}}" class="btn btn-dark">Batal</a>
								</form>
							</div>
						</div>
					</div>

					@endforeach



				</div>
			</div>
			<!-- content-wrapper ends -->
			@include("admin.footer")
		</div>
	</div>

	@include("admin.adminscript")

</body>

</html>