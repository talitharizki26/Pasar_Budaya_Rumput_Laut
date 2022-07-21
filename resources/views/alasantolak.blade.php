<!DOCTYPE html>
<html lang="en">

<head>

    <base href="/public">

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                        <a href="{{url('/redirects')}}" class="logo">
                            <img src="assets/images/pbrl-logo.png" align="klassy cafe html template" width="70%">
                        </a>
                        <!-- ***** Logo End ***** -->


                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="{{url('/redirects')}}" class="active">Beranda</a></li>
                            <!-- <li class="scroll-to-section"><a href="#about">Tentang</a></li> -->
                            <li class="scroll-to-section"><a href="{{url('/redirects#menu')}}">Produk</a></li>
                            <!-- <li class="scroll-to-section"><a href="{{url('/editprofile')}}">edit</a></li> -->
                            <li class="scroll-to-section"><a href="{{url('/redirects#chefs')}}">Artikel</a></li>
                            <li class="scroll-to-section"><a href="{{url('/redirects#testi')}}">Testi</a></li>
                            <li class="scroll-to-section"><a href="{{url('/redirects#reservation')}}">Kontak</a></li>
                            <li class="scroll-to-section border-left">
                                @auth
                                <a href="{{url('/showcart',Auth::user()->no_ktp)}}">
                                    <i class="fa fa-shopping-cart"></i> {{$count}}
                                </a>
                                @endauth
                                @guest
                                <i class="fa fa-shopping-cart"></i>[0]
                                @endguest
                                </a>
                            </li>


                            {{--
                            <li class="scroll-to-section" style="background-color: #d5fdff;">
                                <select name="" id="">
                                    @foreach ($data5 as $item)
                                    <option> </option>
                                        <option value="{{$item->id_pesanan}}"><a href="index.htm">{{$item->status_pesanan}}asd{{$item->status_pesanan}}</a></option>
                            @endforeach
                            </select>
                            {{-- @auth

                                <a href="{{url('/showcart',Auth::user()->no_ktp)}}">

                            <i class="fa fa-shopping-cart"></i>{{$count}}

                            </a>


                            @endauth

                            @guest

                            <i class="fa fa-shopping-cart"></i>[0]

                            @endguest --}}
                            </li>

                            <li class="scroll-to-section dropdown border-left border-right">
                                <a class=" fa fa-bell " id="notificationDropdown" href="#" data-toggle="dropdown">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                                    <h6 class="p-3 mb-0">Notifikasi Anda</h6>
                                    <div class="dropdown-divider"></div>

                                    @auth
                                    @foreach ($data5 as $item)

                                    <div class="preview-item-content">
                                        <a href="{{url('/showtes',$item->id_pesanan)}}" class="dropdown-item preview-item">
                                            <p class="text-muted ellipsis mb-2">{{$item->id_pesanan}} : <b>{{$item->status_pesanan}} </b></p>
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </li>

                            <!-- @endauth

                            @guest

                            <i class="fa fa-shopping-cart"></i>[0]

                            @endguest -->


                            <li>

                                @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                    <div class="navbar-profile row">
                                        <img class="img-xs rounded-circle" width="17%" src="admin/assets/images/faces/face15.jpg" alt="">
                                        <p style="margin-top: 5px; margin-left: 5px;" class="mb-0 d-none d-sm-block navbar-profile-name"> {{ Auth::user()->nama }}</p>
                                        <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                                    <h6 class="p-3 mb-0">Edit Profil Anda atau Keluar dari Aplikasi?</h6>
                                    <div class="dropdown-divider"></div>
                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Edit Profil') }}
                                    </x-jet-dropdown-link><br>
                                    <div class="dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-jet-dropdown-link class="text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();"><i class="mdi mdi-logout text-danger"></i> {{ __(' Keluar') }}</x-jet-dropdown-link>
                                    </form><br>
                                </div>
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
                            @endif

                        </ul>

                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <hr>
        <div id="top" style="overflow-x: hidden; margin-top: 150px;" bgcolor="#89C9D1">
            <div class="col-lg-12 ">
                <div class="contact-form">
                    @foreach($data as $data)
                    <h2 style="margin-top:20px;" align="center">Maaf, Pesanan Anda ditolak karena {{$data->alasan_ditolak}}. Silahkan hubungi pembudidaya untuk info lebih lanjut.</h2>
                    @endforeach
                </div>

                <hr style="margin-bottom: 250px;">
            </div>
        </div>


    </div>



    @include("footer")


    <script type="text/javascript">
        $("#order").click(

            function() {
                $("#appear").show();

            }
        );




        $("#close").click(

            function() {
                $("#appear").hide();

            }
        );
    </script>




    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>
        $(function() {
            var selectedClass = "";
            $("p").click(function() {
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("." + selectedClass).fadeOut();
                setTimeout(function() {
                    $("." + selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);

            });
        });
    </script>






</body>

</html>