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
												<th> Tgl Pesan </th>
												<th> ID Pelanggan </th>
												 <th> Waktu Pesan </th> 
												<th> ID Rumput Laut </th>
												<th> Jumlah Pesanan </th>
												<th> Ekspedisi</th>
												<th> Total Pesanan </th>
												<th> Bukti Bayar</th>
												<th> Konfirmasi Pesanan</th>
												<th> Status Pesanan </th>
												<th> Action </th>
											</tr>
										</thead>


										<tbody>
											@foreach($data as $data)

											<tr align="center" style="background-color: black;">
												<td>{{$data->id_pesanan}}</td>
												 <td>{{$data->tgl_pesanan}}</td> 
												<td>{{$data->user_id}}</td>
												 <td>{{$data->waktu_pesanan}}</td> 
												<td>{{$data->id_rumputlaut}}</td>
												<td>{{$data->jumlah_pesanan}}</td>
												<td>{{$data->ekspedisi_pesanan}}</td>
												<td>Rp. {{$data->total_pesanan}}</td>
												<td>{{$data->bukti_pembayaran}}</td>
												<td>
													{{$data->konfirmasi_pesanan}}
												</td>
												<td>
													{{$data->status_pesanan}}
												</td>
												<td>
													<button class="btn btn-primary" data-toggle="modal" data-target="#modalUpdateBarang{{ $data->id_pesanan }}">Update</button>
													</td>

											</tr>

														<!-- Modal Update Barang-->
<div class="modal fade" id="modalUpdateBarang{{ $data->id_pesanan }}" tabindex="0" aria-labelledby="modalUpdateBarang" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
	<h5 class="modal-title">Update Barang</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	<span aria-hidden="true">&times;</span>
	</button>
	</div>
	<div class="modal-body">
	<!--FORM UPDATE BARANG-->
	<form action="/pesanan/{{ $data->id_pesanan }}" method="post">
	@csrf
	@method('put')
	<div class="form-group">
	{{-- <label for="">Nama Barang</label>
	<input type="text" class="form-control" id="updateNamaBarang" name="updateNamaBarang"
	value="{{ $data->jumlah_pesanan}}">
	</div>
	<div class="form-group">
	<label for="">Jumlah Barang</label>
	<input type="text" class="form-control" id="updateJumlahBarang" name="updateJumlahBarang"
	value="{{ $data->status_pesanan}}">
	</div> --}}

	<label for="">Konfirmasi Pesanan</label>
	<div class="form-check form-check-inline">
		<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Pesanan dikonfirmasi"
		{{ $data->konfirmasi_pesanan == 'Pesanan dikonfirmasi' ? 'checked' : '' }} >
		<label class="form-check-label" for="inlineRadio1">Pesanan dikonfirmasi</label>
	  </div>
	  <div class="form-check form-check-inline">
		<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Pesanan ditolak"
		{{ $data->konfirmasi_pesanan == 'Pesanan ditolak' ? 'checked' : '' }} >
		<label class="form-check-label" for="inlineRadio2">Pesanan Ditoalk</label>
	  </div>

	  <label for="">Konfirmasi Status</label>
	  <div class="form-check form-check-inline">
		  <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio11" value="Pesanan Disiapkan"
		  {{ $data->status_pesanan == 'Pesanan Disiapkan' ? 'checked' : '' }} >
		  <label class="form-check-label" for="inlineRadio11">Pesanan Disiapkan</label>
		</div>
		<div class="form-check form-check-inline">
		  <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio22" value="Pesanan Diantar"
		  {{ $data->status_pesanan == 'Pesanan Diantar' ? 'checked' : '' }} >
		  <label class="form-check-label" for="inlineRadio22">Pesanan Diantar</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio33" value="Pesanan Selesai"
			{{ $data->status_pesanan == 'Pesanan Selesai' ? 'checked' : '' }} >
			<label class="form-check-label" for="inlineRadio33">Pesanan Selesai</label>
		  </div>


	<button type="submit" class="btn btn-primary">Perbarui Data</button>
	</form>
	<!--END FORM UPDATE BARANG-->
	</div>
	</div>
	</div>
	</div>
	<!-- End Modal UPDATE Barang-->

											@endforeach
										</tbody>
									</table>
									
											
					

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>







<!-- Button trigger modal -->

  
  <!-- Modal -->
  {{-- <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<p>Konfirmasi</p>
			<a href="{{url('/edittolak',$data->id_pesanan)}}"class="badge badge-outline-success">Pesanan dikonfirmasi</a>
			<a href="{{url('/editbatal',$data->id_pesanan)}}" class="badge badge-outline-danger">Pesanan dibatalkan</a>

			<p>Status</p>
			<a href="{{url('/statussiap',$data->id_pesanan)}}"class="badge badge-outline-primary">Pesanan disiapkan</a>
			<a href="{{url('/statusantar',$data->id_pesanan)}}" class="btn btn-warning">Pesanan diantar</a>
			<a href="{{url('/statusselesai',$data->id_pesanan)}}" class="btn btn-primary">Pesanan selesai</a>


			{{-- <td>{{$data->id_pesanan}}</td> --}}
	
		</div>
		{{-- <div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  <button type="button" class="btn btn-primary">Save changes</button>
		</div> --}}
	  </div>
	</div>
	
  </div> 

  
			<!-- content-wrapper ends -->
			@include("admin.footer")
		</div>



	</div>



	@include("admin.adminscript")

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



  <script >
	$(document).ready(function() {
	  $('#myTable').DataTable();
  } );
 
 </script>
</body>

</html>