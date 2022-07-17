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

                    <h3 class="page-title"> Lihat Daftar Refund dari Pelanggan Anda </h3>
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
                                <!-- <a href="{{url('/cetaklaporan')}}"><button class="btn btn-success">Cetak Laporan</button></a> -->
                                <div class="row" style="float:right">
                                    <form action="{{url('/search_pesanan')}}" method="get" class="nav-link mt-md-0 d-none d-lg-flex search">
                                        @csrf
                                        <input class="form-control" type="text" name="search_pesanan" style="color:white; width:300px" placeholder="Cari pesanan">
                                        <button style="margin-left:25px" type="submit" value="Search" class="btn btn-primary"><i style="padding-left:5px" class="mdi mdi-magnify"></i></button>
                                    </form>
                                </div><br>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr align="center">
                                                <th> Bukti Bayar</th>
                                                <th> ID Pesanan </th>
                                                <!-- <th> Tanggal </th> -->
                                                <!-- <th> Waktu </th> -->
                                                <th> ID Pelanggan </th>
                                                <th> ID Produk </th>
                                                <th> Jumlah</th>
                                                <th> Ekspedisi</th>
                                                <th> Total</th>
                                                <th> Konfirmasi</th>
                                                <th> Status</th>
                                                <th> Aksi </th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach($data as $data)

                                            <tr align="center" style="background-color: black;">
                                                <td>
                                                    <a href="/bukti_pembayaran/{{$data->bukti_pembayaran}}"><img height="200" width="200" src="/bukti_pembayaran/{{$data->bukti_pembayaran}}"></a>
                                                </td>
                                                <td>{{$data->id_pesanan}}</td>
                                                <!-- <td>{{$data->tgl_pesanan}}</td>
												<td>{{$data->waktu_pesanan}}</td> -->
                                                <td>{{$data->noktp_pelanggan}}</td>
                                                <td>{{$data->id_rumputlaut}}</td>
                                                <td>{{$data->jumlah_pesanan}} Kg</td>
                                                <td>{{$data->ekspedisi_pesanan}}</td>
                                                <td>Rp. {{number_format($data->total_pesanan)}}</td>
                                                <td>
                                                    {{$data->konfirmasi_pesanan}}
                                                </td>
                                                <td>
                                                    {{$data->status_pesanan}}
                                                </td>
                                                <td>
                                                    @if ($data->konfirmasi_pesanan == 'Refund Selesai')
                                                        <span class="btn btn-primary tombol_konfirmasi">Sudah direfund</span>
                                                    @elseif($data->refund_ditolak != Null || $data->refund_ditolak != "")
                                                        <button class="btn btn-warning tombol_ditolak" data-toggle="modal" data-target="#modalUpdateBarang{{ $data->id_pesanan }}">Beri Alasan ditolak</button>
                                                    @elseif ($data->konfirmasi_pesanan == 'Refund ditolak')
                                                        <button class="btn btn-danger tombol_ditolak" data-toggle="modal" data-target="#modalUpdateBarang{{ $data->id_pesanan }}">Refund ditolak</button>
                                                    @elseif($data->konfirmasi_pesanan == 'Refund dikonfirmasi')
                                                        <button class="btn btn-info" data-toggle="modal" data-target="#modalUpdateBarang{{ $data->id_pesanan }}">Update Status Refund</button>
                                                    @else
                                                        <button class="btn btn-success tombol_konfirmasi" data-toggle="modal" data-target="#modalUpdateBarang{{ $data->id_pesanan }}">Konfirmasi</button>
                                                    @endif
                                                </td>

                                            </tr>

                                            <!-- Modal Update Barang-->
                                            <div class="modal fade" id="modalUpdateBarang{{ $data->id_pesanan }}" tabindex="0" aria-labelledby="modalUpdateBarang" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Konfirmasi Status Pesanan</h5>
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
                                                                    <input type="text" class="form-control" id="updateJumlahBarang" name="updateJumlahBarang" value="{{ $data->status_pesanan}}">
                                                                </div> --}}

                                                                <label for="">Konfirmasi Pesanan</label>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input dikonfirmasi" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Refund dikonfirmasi" {{ $data->konfirmasi_pesanan == 'Refund dikonfirmasi' ? 'checked' : '' }} @disabled($data->konfirmasi_pesanan == 'Refund ditolak')>
                                                                    <label class="form-check-label" for="inlineRadio1">Refund Dikonfirmasi</label>
                                                                    <input class="form-check-input ditolak" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Refund ditolak" {{ $data->konfirmasi_pesanan == 'Refund ditolak' ? 'checked' : '' }} @disabled($data->konfirmasi_pesanan == 'Refund dikonfirmasi')>
                                                                    <label class="form-check-label" for="inlineRadio2">Refund Ditolak</label>
                                                                    <div class="form-group">
																		<label for="refund_ditolak">Alasan ditolak</label>
																		<input type="text" class="form-control refund_ditolak" name="refund_ditolak" id="refund_ditolak" value="{{ $data->refund_ditolak }}"  @disabled($data->konfirmasi_pesanan != 'Refund ditolak')>
																	</div>
                                                                </div>

                                                                <label for="">Konfirmasi Status</label>
                                                                <div class="form-check form-check-inline" id="upear">
                                                                    <input class="form-check-input selesai" type="radio" name="inlineRadioOptions2" id="selesai" value="Refund Selesai" {{ $data->status_pesanan == 'Refund Selesai' ? 'checked' : '' }} @disabled($data->konfirmasi_pesanan == 'Refund ditolak')>
                                                                    <label class="form-check-label" for="selesai">Refund Selesai</label>
                                                                </div>


                                                                <button type="submit" class="btn btn-primary">Konfirmasi Pesanan dan Status</button>
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



            <!-- content-wrapper ends -->
            @include("admin.footer")
        </div>



    </div>



    @include("admin.adminscript")

    

    <script src="assets/js/jquery-2.1.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

	<script>

		$('.dikonfirmasi').on('click', function(e) {
            $('.refund_ditolak').attr('disabled', 'disabled');
            $('.selesai').removeAttr('disabled');
        });
		$('.ditolak').on('click', function(e) {
            $('.refund_ditolak').removeAttr('disabled');
            $('.selesai').attr('disabled', 'disabled');
        });

		$('.tombol_ditolak').on('click', function(e) {
            $('.refund_ditolak').removeAttr('disabled');
        });

		$('.tombol_konfirmasi').on('click', function(e) {
            $('.refund_ditolak').attr('disabled', 'disabled');
        });
	</script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



	<script>
		$(document).ready(function() {
			$('#myTable').DataTable();
		});
	</script> -->
</body>

</html>