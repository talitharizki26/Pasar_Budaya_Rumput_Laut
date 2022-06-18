<!DOCTYPE html>

<html lang="en">

<head>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>

  @include("admin.admincss")

</head>

<body>

  <div class="container-scroller">

    @include("admin.navbar")

    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-sm-4 grid-margin">
            <div class="card">
              <div class="card-body">
                <h5>Pesanan Selesai</h5>
                <div class="row">
                  <div class="col-8 col-sm-12 col-xl-8 my-auto">
                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                      <h2 class="mb-0">{{$selesai}} Pesanan</h2>
                    </div>
                  </div>
                  <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                    <i class="icon-lg mdi mdi-check-circle-outline text-success ml-auto"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4 grid-margin">
            <div class="card">
              <div class="card-body">
                <h5>Pesanan Diantar</h5>
                <div class="row">
                  <div class="col-8 col-sm-12 col-xl-8 my-auto">
                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                      <h2 class="mb-0">{{$diantar}} Pesanan</h2>
                    </div>
                  </div>
                  <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                    <i class="icon-lg mdi mdi-truck text-primary ml-auto"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4 grid-margin">
            <div class="card">
              <div class="card-body">
                <h5>Pesanan Batal</h5>
                <div class="row">
                  <div class="col-8 col-sm-12 col-xl-8 my-auto">
                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                      <h2 class="mb-0">{{$batal}} Pesanan</h2>
                    </div>
                  </div>
                  <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                    <i class="icon-lg mdi mdi-close-circle-outline text-danger ml-auto"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 grid-margin">
            <div class="card">
              <div class="card-body">
                <h5>Pendapatan Keseluruhan</h5>
                <div class="row">
                  <div class="col-8 col-sm-12 col-xl-8 my-auto">
                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                      <h2 class="mb-0">Rp. {{number_format($total)}}</h2>
                    </div>
                  </div>
                  <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                    <i class="icon-lg mdi mdi-tag text-info ml-auto"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 grid-margin">
            <div class="card">
              <div class="card-body">
                <h5>Penilaian Pelanggan</h5>
                <div class="row">
                  <div class="col-8 col-sm-12 col-xl-8 my-auto">
                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                      <h2 class="mb-0">{{round($rating,2)}} Poin</h2>
                    </div>
                  </div>
                  <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                    <i class="icon-lg mdi mdi-star text-warning ml-auto"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Diagram Progres Penjualan Rumput Laut</h4>
                <script>
                  var pendapatan = <?php echo json_encode($total_pesanan) ?>;
                  var bulan = <?php echo json_encode($bulan) ?>;
                </script>
                <figure class="highcharts-figure">
                  <canvas id="areaChart" style="height:200px"></canvas>
                </figure>
              </div>
            </div>
          </div>
        </div>
        <div class="row ">
          <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Status Pesanan</h4>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr align="center">
                        <th> ID Pesanan </th>
                        <th> Tanggal </th>
                        <th> Waktu </th>
                        <th> ID Pelanggan </th>
                        <th> ID Rumput Laut </th>
                        <th> Jumlah</th>
                        <th> Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr align="center" style="background-color: black;">

                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- content-wrapper ends -->
      @include("admin.footer")
    </div>
    <!-- main-panel ends -->
  </div>

  </div>




  @include("admin.adminscript")


</body>

</html>