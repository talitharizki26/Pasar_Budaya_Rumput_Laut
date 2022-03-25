<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.css">
    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">

    <link href="assets/images/pbrl-tab.png" rel="icon">
    <title>Pasar Budaya Rumput Laut</title>
    <!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

</head>




<body>


    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->





    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">

                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">
                            <img src="assets/images/pbrl-logo.png" align="klassy cafe html template" width="70%">
                        </a>
                        <!-- ***** Logo End ***** -->


                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Beranda</a></li>
                            <li class="scroll-to-section"><a href="#about">Tentang</a></li>
                            <li class="scroll-to-section"><a href="#menu">Produk</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Artikel</a></li>
                            <li class="scroll-to-section"><a href="#testi">Testi</a></li>
                            <li class="scroll-to-section"><a href="#reservation">Kontak</a></li>


                            <li class="scroll-to-section" style="background-color: #d5fdff;  padding-top:8px; padding-bottom:2px;">

                                @auth

                                <a href="{{url('/showcart',Auth::user()->id)}}">

                                    <i class="fa fa-shopping-cart"></i>{{$count}}

                                </a>

                                @endauth


                                @guest

                                <i class="fa fa-shopping-cart"></i>[0]

                                @endguest

                                </a>
                            </li>






                            <li>

                                @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                            </li>

                            <x-app-layout>
                            </x-app-layout>

                            </li>
                            @else
                            <li><a href="{{ route('login') }}" class="text-sm text-gray-700 underline">
                                    <i class="fa fa-user fa-2x"></i>
                                </a>
                            </li>

                            @if (Route::has('register'))
                            <li> <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline"><i class="fa fa-pencil-square-o fa-2x"></i></a>
                            </li>
                            @endif
                            @endauth
                </div>
                @endif

                </li>

                </ul>



                <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->



    <!-- ***** Main Banner Area Start ***** -->
    <div id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-content">
                        <div class="inner-content">
                            <center>
                                <h4>Pasar Budaya</h4>
                                <h6> Rumput Laut</h6>

                                <div class="main-white-button scroll-to-section">
                                    <a href="#produk">Pesan Sekarang</a>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="main-banner header-text">
                        <div class="Modern-Slider">
                            <!-- Item -->
                            <div class="item">
                                <div class="img-fill">
                                    <img src="assets/images/pembudidaya1.jpg" alt="">
                                </div>
                            </div>
                            <!-- // Item -->
                            <!-- Item -->
                            <div class="item">
                                <div class="img-fill">
                                    <img src="assets/images/pembudidaya2.jpg" alt="">
                                </div>
                            </div>
                            <!-- // Item -->
                            <!-- Item -->
                            <div class="item">
                                <div class="img-fill">
                                    <img src="assets/images/pembudidaya3.jpg" alt="">
                                </div>
                            </div>
                            <!-- // Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** About Area Starts ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>Tentang Kami</h6>
                            <h2>Aplikasi Pasar Budaya Rumput Laut</h2>
                        </div>
                        <p>Aplikasi "Pasar Budaya Rumput Laut" merupakan aplikasi pemasaran rumput laut berbasis website yang dibuat untuk membantu pembudidaya rumput laut dalam menjual dan mempromosikan rumput lautnya serta membantu pelanggan dalam melakukan pembelian rumput laut secara cepat, mudah dan aman.</p>
                        <div class="row">
                            <div class="col-4">
                                <img src="assets/images/rumputlaut1.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img src="assets/images/rumputlaut2.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img src="assets/images/rumputlaut3.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="right-content">
                        <div class="thumb">
                            <a rel="nofollow" href="https://www.youtube.com/watch?v=XOSoT_r5YYU"><i class="fa fa-play"></i></a>
                            <img src="assets/images/pembudidaya4.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Area Ends ***** -->


    @include("produk")

    @include("artikel")

    @include("testimoni")

    @include("kontak")

    <!-- ***** Menu Area Starts ***** -->

    <!-- ***** Chefs Area Ends ***** -->


    @include("footer")





</body>

</html>