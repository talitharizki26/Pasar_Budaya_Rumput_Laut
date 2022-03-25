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
						<h3 class="page-title"> Lihat Daftar Pelanggan Anda </h3>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Data Pelanggan</a></li>
							</ol>
						</nav>
					</div>
					<div class="row">
						<div class="col-lg-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Tabel Pelanggan</h4>
									</p>
									<div class="table-responsive">
										<table class="table table-striped">
											<thead>
												<tr align="center">
													<th> Nama </th>
													<th> Email </th>
													<th> Aksi </th>
												</tr>
											</thead>
											<tbody>
												@foreach($data as $data)
												<tr align="center">
													<td>{{$data->name}}</td>
													<td>{{$data->email}}</td>

													@if($data->usertype=="0")
													<td><a href="{{url('/deleteuser',$data->id)}}">Delete</a></td>
													@else
													<td><a>Not Allowed</a></td>

													@endif

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