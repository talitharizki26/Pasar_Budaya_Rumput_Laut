<script type="text/javascript">
    window.print()
</script>


<table>
    <tr>
        <td><img src="admin/assets/images/mini-logo.png" alt="logo" height="100" width="100"></td>
        <td>
            <h2>Hasil Penjualan Rumput Laut Pembudidaya </h2>
            <h2>Dinas Perikanan dan Kelautan Kabupaten Bantaeng</h2>
            <p style="font-size:14px;"><i> Jalan Raya Lanto No.76, Kabupaten Bantaeng, Sulawesi Selatan</i></p>
        </td>
    </tr>
</table>


<hr />


<h3>LAPORAN HASIL PENJUALAN</h3>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr align="center">
                <th> ID Pesanan </th>
                <!-- <th> Tanggal </th> -->
                <!-- <th> Waktu </th> -->
                <th> ID Pelanggan </th>
                <th> ID Rumput Laut </th>
                <th> Jumlah</th>
                <th> Ekspedisi</th>
                <th> Total</th>
                <th> Konfirmasi</th>
                <th> Status</th>
            </tr>
        </thead>


        <tbody>
            @foreach($data as $data)

            <tr align="center" style="background-color: black;">
                <td>{{$data->id_pesanan}}</td>
                <!-- <td>{{$data->tgl_pesanan}}</td>
												<td>{{$data->waktu_pesanan}}</td> -->
                <td>{{$data->user_id}}</td>
                <td>{{$data->id_rumputlaut}}</td>
                <td>{{$data->jumlah_pesanan}}</td>
                <td>{{$data->ekspedisi_pesanan}}</td>
                <td>Rp. {{$data->total_pesanan}}</td>
                <td>
                    {{$data->konfirmasi_pesanan}}
                </td>
                <td>
                    {{$data->status_pesanan}}
                </td>


            </tr>

            <!-- Modal Update Barang-->


            <!-- End Modal UPDATE Barang-->

            @endforeach
        </tbody>
    </table>

</div>
<!-- <div id="print">
    <table width="450" align="right" class="ttd">
        <tr>
            <td width="100px" style="padding:20px 20px 20px 20px;" align="center">
                <strong>kodingbuton.com,</strong>
                <br><br><br><br>
                <strong><u>TTD</u><br></strong><small></small>
            </td>
        </tr>
    </table>
</div> -->