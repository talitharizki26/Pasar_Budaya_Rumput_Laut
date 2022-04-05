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
					<h3 class="page-title"> Lihat Daftar Testimoni dari Pelanggan Anda </h3>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Data Testimoni</a></li>
						</ol>
					</nav>
				</div>
				<div class="row">
					<div class="col-lg-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Tabel Testimoni</h4>
								</p>
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr align="center">
												<th> ID Pesanan </th>
												<th> ID Pelanggan </th>
												<th> Tanggal</th>
												<th> Isi Testimoni </th>
												<th> Bintang </th>
												<th> Balasan Admin </th>
												<th> Aksi </th>
											</tr>
										</thead>
										<tbody>
											@foreach($data as $data)

											<tr align="center">

												<td>{{$data->id_pesanan}}</td>
												<td>{{$data->user_id}}</td>
												<td>{{$data->tgl_testimoni}}</td>
												<td>{{$data->isi_testimoni}}</td>
												<td>{{$data->bintang_testimoni}}</td>
												<td>{{$data->balasan_testimoni}}</td>
												<td> <a href="" class="btn btn-success">Balas Testimoni</a> </td>




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