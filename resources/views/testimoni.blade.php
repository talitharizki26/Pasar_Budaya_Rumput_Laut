<!-- ***** Menu Area Starts ***** -->
<section class="section" id="testi">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>Testimoni</h6>
                    <h2>Testimoni Pelanggan</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item-carousel">
        <div class="col-lg-12">
            <div class="owl-menu-item owl-carousel">


                @foreach($data3 as $data)

                <div class="col-lg-12">
                    <div class="chef-item">
                        <div class="thumb">
                            <div class="overlay"></div>
                            <ul class="social-icons">
                                <li><a href="{{url('/showarticle')}}"><i class="fa fa-check"></i></a></li>
                            </ul>
                        </div>
                        <div class="down-content">
                            <!-- <p>{{$data->id_pesanan}}</p> -->
                            <h4>{{$data->isi_testimoni}}</h4>~~~~~~~~~~~~~~~~~~~~~~
                            <br>
                            Pelanggan: <h6>{{$data->nama_pelanggan}}</h6>
                            ~<p>{{$data->tgl_testimoni}} /</p>
                            <p>{{$data->waktu_testimoni}}</p>
                        </div>
                    </div>
                </div>

                @endforeach





            </div>
        </div>
    </div>
    </div>
</section>
<!-- ***** Menu Area Ends ***** -->