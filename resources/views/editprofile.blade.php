<head>

	<base href="/public">

	@include("admin.admincss")

</head>




<div class="content-wrapper">
	<div class="row">
		<div class="col-md-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Form Edit Profile</h4>
					<form class="forms-sample" action="{{url('/updateprofil',$data->noktp_pelanggan)}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="jenis">Nama </label>
							<input class="form-control" name="nama_pelanggan" value="{{$data->nama_pelanggan}}" required>
							@error('nama_pelanggan')
							<span class="text-danger">{{$message}}</span>
							@enderror
						</div>
						<div class="form-group">
							<label for="deskripsi">Alamat</label>
							<input class="form-control" name="alamat_pelanggan" value="{{$data->alamat_pelanggan}}" required>
						</div>
						<div class="form-group">
							<label for="harga">No HP </label>
							<input type="number" class="form-control" name="nohp_pelanggan" value="0{{$data->nohp_pelanggan}}" required>
						</div>


						<fieldset class="form-group">

							<legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
							<div class="col-sm-10">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="jenkel_pelanggan" id="P" value="Perempuan" {{ ($data->jenkel_pelanggan=="Perempuan")? 'checked' : "" }}> Perempuan

								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="jenkel_pelanggan" id="L" value="Laki-Laki" {{ ($data->jenkel_pelanggan=="Laki-Laki")? 'checked' : "" }}> Laki-Laki

								</div>
							</div>


							<div class="form-group">
								<label for="durasitahan">Tanggal Lahir</label>
								<input type="date" class="form-control" name="tgllahir_pelanggan" value="{{$data->tgllahir_pelanggan}}" required>
								@error('tgllahir_pelanggan')
								<span class="text-danger">{{$message}}</span>
								@enderror
							</div>
							<div class="form-group">
								<label for="gambar">Gambar Sebelumnya</label><br>
								<img height="250" width="250" src="/userimage/{{$data->foto_pelanggan}}">
							</div>
							<div class="form-group">
								<label for="gambar">Gambar Baru</label>
								<input type="file" class="form-control" name="gambar">
								@error('gambar')
								<span class="text-danger">{{$message}}</span>
								@enderror
							</div>
							<button type="submit" class="btn btn-primary mr-2" value="Save">Edit Profile</button>
							<a href="{{url('/')}}" class="btn btn-dark">Batal</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>