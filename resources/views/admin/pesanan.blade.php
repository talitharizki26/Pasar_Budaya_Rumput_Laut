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
				<div class="row">
					<form action="{{url('/search')}}" method="get">

						@csrf

						<input type="text" name="search" style="color:blue;">

						<input type="submit" value="Search" class="btn btn-success">

					</form>
				</div>
				<div class="page-header">

					<h3 class="page-title"> Lihat Daftar Pesanan dari Pelanggan Anda </h3>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Data Pesanan</a></li>
						</ol>
					</nav>
				</div>
				<div class="row">
					<div class="col-lg-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Tabel Pesanan</h4>
								</p>
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr align="center">
												<th> ID Pesanan </th>
												<th> ID Pelanggan </th>
												<th> Tgl Pesan </th>
												<th> Waktu Pesan </th>
												<th> Ekspedisi Pesanan </th>
												<th> Total Pesanan </th>
												<th> Kirim Instruksi Bayar </th>
												<th> Instruksi Pesanan </th>
												<th> Bukti Pembayaran </th>
												<th> Status Pesanan </th>
											</tr>
										</thead>
										<tbody>
											@foreach($data as $data)

											<tr align="center" style="background-color: black;">
												<td>{{$data->name}}</td>
												<td>{{$data->phone}}</td>
												<td>{{$data->address}}</td>
												<td>{{$data->foodname}}</td>
												<td>{{$data->price}}$</td>
												<td>{{$data->testimoni}}</td>
												<td>{{$data->quantity}}</td>
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