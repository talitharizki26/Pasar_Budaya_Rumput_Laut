<!DOCTYPE html>
<html lang="en">

<head>
    <title>Article</title>
    <link rel="icon" href="img/icon.png" type="image/png" sizes="16x16">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://themes.audemedia.com/html/goodgrowth/css/owl.theme.default.min.css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/assets/owl.carousel.min.css'>
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/artikel_konten.css?v=<?php echo time(); ?>">

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
</head>


<body class="hero-section">


    <main>

        @foreach($data2 as $data2)
        <div class="section visi-misi">
            <div class="container">
                <a href="{{url('/redirects')}}" class="logo">
                    <i class="fa fa-arrow-left fa-1x" aria-hidden="true"> Kembali</i>
                </a>
                <div class="row justify-content-between">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-12 text-center">
                        <h2>{{$data2->judul_artikel}}</h2>
                        <h6>Sumber Artikel : {{$data2->sumber_artikel}}</a></h6>
                        <hr>
                        <img src='/artikelimage/{{$data2->gambar_artikel}}' alt="Hero Image" width="60%">
                        <!-- <a href="http://www.freepik.com">Designed by stories / Freepik</a> -->
                        <hr>

                        <table border=0>
                            <tr>
                                <td>
                                    <p>
                                        {{$data2->isi_artikel}}
                                    </p>
                                </td>
                            </tr>
                        </table>




                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-12 text-md-left text-center">
                        <h4>Apakah Anda Menyukai Artikel Ini?</h4><br>
                        <a href="{{url('/tambahlike',$data2->id_artikel)}}">
                            <span class="menu-icon">
                                <i class="fa fa-heart fa-2x text-danger"> {{$data2->suka_artikel}} Suka</i>
                            </span>
                        </a>
                        @endforeach

                        <br><br><br>
                        <h4>Artikel Lainnya</h4>
                        @foreach($data3 as $data2)
                        <hr class="garis-judul">
                        <a class="artikel-link" href="{{url('/showarticle',$data2->id_artikel)}}">{{$data2->judul_artikel}}</a>


                        @endforeach


                    </div>
                </div>
            </div>
        </div>










    </main>


</body>
<!-- Script -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    (function($) {
        "use strict";

        $(function() {
            var header = $(".start-style");
            $(window).scroll(function() {
                var scroll = $(window).scrollTop();

                if (scroll >= 10) {
                    header.removeClass('start-style').addClass("scroll-on");
                } else {
                    header.removeClass("scroll-on").addClass('start-style');
                }
            });
        });

        //Animation

        $(document).ready(function() {
            $('body.hero-section').removeClass('hero-section');
        });

        //Menu On Hover

        $('body').on('mouseenter mouseleave', '.nav-item', function(e) {
            if ($(window).width() > 750) {
                var _d = $(e.target).closest('.nav-item');
                _d.addClass('show');
                setTimeout(function() {
                    _d[_d.is(':hover') ? 'addClass' : 'removeClass']('show');
                }, 1);
            }
        });

    })(jQuery);
</script>
<script src="js/faq.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/owl.carousel.min.js'></script>
<script src="js/associate.js"></script>

</html>