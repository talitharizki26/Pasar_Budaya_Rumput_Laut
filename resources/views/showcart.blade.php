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


    <div id="top" style="overflow-x: hidden;">


        <table align="center" bgcolor="yellow">


            <tr>
                <th style="padding: 30px;">Food Name</th>
                <th style="padding: 30px;">Price</th>
                <th style="padding: 30px;">Quantity</th>
                <th style="padding: 30px;">Action</th>

            </tr>



            <form action="{{url('orderconfirm')}}" method="POST">

                @csrf

                @foreach($data as $data)


                <tr align="center">

                    <td>

                        <input type="text" name="foodname[]" value="{{$data->user_id}}" hidden="">
                        {{$data->user_id}}
                    </td>

                    <td>
                        <input type="text" name="price[]" value="{{$data->food_id}}" hidden="">
                        {{$data->food_id}}

                    </td>
                    <input type="text" name="quantity[]" value="{{$data->quantity}}" hidden="">

                    <td>{{$data->quantity}}</td>



                </tr>

                @endforeach


                @foreach($data2 as $data2)


                <tr style="position: relative; top: -80px; left:360px;">

                    <td>
                        <a class="btn btn-warning" href="{{url('/remove',$data2->id)}}">Remove</a>
                    </td>

                </tr>

                @endforeach




        </table>


        <div align="center" style="padding: 10px;">

            <button class="btn btn-primary" type="button" id="order">Order Now</button>

        </div>




        <div id="appear" align="center" style="padding: 10px; display: none;">


            <div style="padding: 10px;">
                <label>Name</label>
                <input type="text" name="name" placeholder="Name">
            </div>

            <div style="padding: 10px;">
                <label>Phone</label>
                <input type="number" name="phone" placeholder="Phone Number">
            </div>

            <div style="padding: 10px;">
                <label>Address</label>
                <input type="text" name="address" placeholder="Address">
            </div>
            <div style="padding: 10px;">
                <label>Pesan</label>
                <input type="text" name="pesan" placeholder="pesan">
            </div>


            <div style="padding: 10px;">

                <input class="btn btn-success" type="submit" value="Order Confirm">

                <button id="close" type="button" class="btn btn-danger">Close</button>
            </div>


        </div>

        </form>



        @include("footer")





















    </div>


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