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



                {{-- @foreach($data3 as $data)

                  <form action="{{url('/addcart',$data->id)}}" method="post">

                @csrf

                <div class="item">

                    <div style="background-image: url('/foodimage/{{$data->image}}');" class='card'>


                        <div class="price">
                            <h6>{{$data->price}}</h6>
                        </div>
                        <div class='info'>
                            <h1 class='title'>{{$data->title}}</h1>
                            <p class='description'>{{$data->testimoni}}</p>
                            <div class="main-text-button">
                                <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                            </div>

                        </div>
                    </div>


                    <input type="number" name="quantity" min="1" value="1" style="width: 80px;">
                    <input type="submit" value="add cart">


                </div>

                </form>


                @endforeach --}}

                @foreach($data3 as $data)

                <div class="col-lg-4">
                    <div class="chef-item">
                        <div class="thumb">
                            <div class="overlay"></div>
                            <ul class="social-icons">
                                <li><a href="{{url('/showarticle')}}"><i class="fa fa-book"></i></a></li>
                            </ul>
                        </div>
                        <div class="down-content">
                            <h4>{{$data->name}}</h4>
                            <span>{{$data->testimoni}}</span>
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