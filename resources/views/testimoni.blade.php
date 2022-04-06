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

                <div class="col-lg-4">
                    <div class="chef-item">
                        <div class="thumb">
                            <div class="overlay"></div>
                            <ul class="social-icons">
                                <li><a href="{{url('/showarticle')}}"><i class="fa fa-check"></i></a></li>
                            </ul>
                        </div>
                        <div class="down-content">
                            <h4>{{$data->isi_testimoni}}</h4>
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