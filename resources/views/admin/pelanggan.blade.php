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
									<div class="row" style="float:right">
										<form action="{{url('/search_pelanggan')}}" method="get" class="nav-link mt-md-0 d-none d-lg-flex search">
											@csrf
											<input class="form-control" type="text" name="search_pelanggan" style="color:white; width:300px" placeholder="Cari pelanggan">
											<button style="margin-left:25px" type="submit" value="Search" class="btn btn-primary"><i style="padding-left:5px" class="mdi mdi-magnify"></i></button>
										</form>
									</div><br>
									<div class="table-responsive">
										<table class="table table-striped">
											<thead>
												<tr align="center">
													<th> No. KTP Pelanggan</th>
													<th> Nama Pelanggan</th>
													<th> No. HP Pelanggan</th>
													<th> Alamat Pelanggan</th>
												</tr>
											</thead>
											<tbody>
												@foreach($data as $data)
												<tr align="center">
													<td>{{$data->user_id}}</td>
													<td>{{$data->nama}}</td>
													<td>{{$data->no_hp}}</td>
													<td>{{$data->alamat}}</td>

													<!-- @if($data->usertype=="0")
													<td><a href="{{url('/deleteuser',$data->id)}}">Delete</a></td>
													@else
													<td><a>Not Allowed</a></td>

													@endif -->

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