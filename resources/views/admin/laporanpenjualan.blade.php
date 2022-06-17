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

                    <h3 class="page-title"> Lihat Daftar Penjualan Anda</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Data Penjualan</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tabel Data Penjualan</h4>
                                <a href="{{url('/cetaklaporan')}}"><button class="btn btn-primary">Cetak Laporan <i style="padding-left:5px" class="mdi mdi-printer"></i></button></a>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr align="center">
                                                <!-- <th> Bukti Bayar</th> -->
                                                <th> ID Pesanan </th>
                                                <th> Tgl Pesan</th>
                                                <!-- <th> Waktu </th> -->
                                                <!-- <th> ID Pelanggan </th> -->
                                                <th> ID Rumput Laut </th>
                                                <th> Jumlah</th>
                                                <th> Ekspedisi</th>
                                                <th> Total</th>
                                                <th> Status</th>
                                                <th> Tgl Testimoni</th>
                                                <th> Bintang</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach($data as $data)

                                            <tr align="center" style="background-color: black;">
                                                <!-- <td>
                                                    <a href="/bukti_pembayaran/{{$data->bukti_pembayaran}}"><img height="200" width="200" src="/bukti_pembayaran/{{$data->bukti_pembayaran}}"></a>
                                                </td> -->
                                                <td>{{$data->id_pesanan}}</td>
                                                <td>{{$data->tgl_pesanan}}</td>
                                                <!-- <td>{{$data->waktu_pesanan}}</td> -->
                                                <!-- <td>{{$data->user_id}}</td> -->
                                                <td>{{$data->id_rumputlaut}}</td>
                                                <td>{{$data->jumlah_pesanan}} Kg</td>
                                                <td>{{$data->ekspedisi_pesanan}}</td>
                                                <td>Rp. {{number_format($data->total_pesanan)}}</td>
                                                <td>{{$data->status_pesanan}}</td>
                                                <td>{{$data->tgl_testimoni}}</td>
                                                <td> {{$data->bintang_testimoni}} </td>
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







            <!-- Button trigger modal -->



            <!-- content-wrapper ends -->
            @include("admin.footer")
        </div>



    </div>



    @include("admin.adminscript")

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