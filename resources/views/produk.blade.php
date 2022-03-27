<!-- ***** Menu Area Starts ***** -->
<section class="section" id="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>Produk Kami</h6>
                    <h2>Pilih Rumput Laut yang diinginkan</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item-carousel">
        <div class="col-lg-12">
            <div class="owl-menu-item owl-carousel">



                @foreach($data as $data)

                <form action="{{url('/addcart',$data->id_rumputlaut)}}" method="post">

                    @csrf

                    <div class="item">

                        <div style="background-image: url('/produkimage/{{$data->gambar_rumputlaut}}');" class='card'>


                            <div class="price">
                                <h6>Rp. {{$data->harga_rumputlaut}}</h6>
                            </div>
                            <div class='info'>
                                <h1 class='title'>{{$data->jenis_rumputlaut}}</h1>
                                <p class='description'>{{$data->deskripsi_rumputlaut}}</p>
                                <p class='description'>Ketahanan: {{$data->durasitahan_rumputlaut}} Hari</p>
                                <p class='description'>Lokasi: {{$data->lokasi_rumputlaut}}</p>
                            </div>
                        </div>

                        <div style="margin-top:10px;" class="contact-form">
                            <fieldset>
                                <input type="number" name="jumlah" min="1" value="1" style="width: 100%;">
                            </fieldset>
                        </div>
                        <input type="submit" class="btn btn-new" value="Tambah Keranjang" style="width: 100%;">
                    </div>
                </form>
                @endforeach

            </div>
        </div>
    </div>
</section>
<!-- ***** Menu Area Ends ***** -->