<head>
    <style>
        h2 {
            font-family: sans-serif;
        }

        h3 {
            font-family: sans-serif;
        }

        p {
            font-family: sans-serif;
        }

        .table1 {
            font-family: sans-serif;
            color: #444;
            border-collapse: collapse;
            width: 80%;
            border: 1px solid #f2f5f7;
        }

        .table1 tr th {
            background: #35A9DB;
            color: #fff;
            font-weight: normal;
        }

        .table1,
        th,
        td {
            padding: 8px 20px;
            text-align: center;
        }

        .table1 tr:hover {
            background-color: #f5f5f5;
        }

        .table1 tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>

</head>


<script type="text/javascript">
    window.print()
</script>

<center>
    <table style="margin-top:30px;">
        <tr>
            <td><img style="margin-right:70px;" src="admin/assets/images/pbrl-tab.png" alt="logo" height="100" width="100"></td>
            <td>

                <h2>Hasil Penjualan Rumput Laut Pembudidaya </h2>
                <h2>Dinas Perikanan dan Kelautan Kabupaten Bantaeng</h2>
                <p style="font-size:14px;"><i> Jalan Raya Lanto No.76, Kabupaten Bantaeng, Sulawesi Selatan</i></p>

            </td>
        </tr>
    </table>
</center>
<br>
<hr />
<br>


<center>
    <h3>LAPORAN HASIL PENJUALAN</h3><br>
</center>

<center>
    <div class="table-responsive">
        <table class="table table-striped table1" border="5">
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

                <tr align="center" style="">
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
</center>