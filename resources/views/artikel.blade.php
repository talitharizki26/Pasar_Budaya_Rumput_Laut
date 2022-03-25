<!-- ***** Menu Area Starts ***** -->
<section class="section" id="chefs">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 text-center">
                <div class="section-heading">
                    <h6>Artikel</h6>
                    <h2>Pilih artikel yang ingin dibaca</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item-carousel">
        <div class="col-lg-12">
            <div class="owl-menu-item owl-carousel">



                @foreach($data2 as $data2)

                <form action="{{ URL('/showarticle',$data2->id)}}" action="post">

                    @csrf

                    <div class="item">

                        <div style="background-image: url('/artikelimage/{{$data2->gambar_artikel}}');" class='card'>

                            <div class='info'>
                                <h1 class='title'>{{$data2->judul_artikel}}</h1>
                                <p class='description'>-{{$data2->sumber_artikel}}</p>

                            </div>
                        </div>
                        <input type="submit" class="btn btn-new" value="Lihat Artikel" style="width: 100%; margin-top:10px;">


                    </div>

                </form>


                @endforeach





            </div>
        </div>
    </div>
    </div>
</section>
<!-- ***** Menu Area Ends ***** -->
<!-- ***** Chefs Area Ends ***** -->