<!DOCTYPE html>
<html lang="en">

<head>

    <base href="/public">

    @include("admin.admincss")

</head>

<body>

    <div class="container-scroller">

        @include("admin.navbar")


        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title"> Balas Testimoni </h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Balas Testimoni</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Form Balas Tetsimoni</h4>
                                <form class="forms-sample" action="{{url('/balastestimoni',$data->id_pesanan)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="balasan_testimoni">Balasan Testimoni</label>
                                        <input class="form-control" name="balasan_testimoni" value="{{$data->balasan_testimoni}}" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2" value="Update Chef">Balas Testimoni</button>
                                    <button type="reset" class="btn btn-dark">Batal</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include("admin.adminscript")


</body>

</html>