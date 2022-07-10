<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pasar Budaya Rumput Laut | Registrasi</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/pbrl-tab.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-left mb-3">Registrasi</h3>
                            <x-jet-validation-errors class="mb-4" />
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>No. KTP</label>
                                    <input type="text" class="form-control p_input" id="no_ktp" name="no_ktp" value="{{ old('no_ktp') }}" required autofocus autocomplete="no_ktp">
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control p_input" id="nama" name="nama" value="{{ old('nama') }}" required autofocus autocomplete="nama">
                                </div>
                                <div class="form-group">
                                    <label>Registrasi Sebagai</label>
                                    <div class="form-check">
                                        <label for="roleN" class="form-check-label">
                                            <input type="radio" class="form-control p_input" name="role" id="roleN" value="Pelanggan" required>Pelanggan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label for="roleA" class="form-check-label">
                                            <input type="radio" class="form-control p_input" name="role" id="roleA" value="Pembudidaya" required>
                                            Pembudidaya
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>No. HP</label>
                                    <input type="text" class="form-control p_input" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required autofocus autocomplete="no_hp">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <div class="col-sm-7">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-control p_input" name="jenkel" id="P" value="Perempuan" required> Perempuan </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-control p_input" name="jenkel" id="L" value="Laki-laki" required> Laki-laki </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control p_input" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required autofocus autocomplete="tgl_lahir">
                                </div>
                                <div class="form-group">
                                    <label>Alamat Lengkap</label>
                                    <input type="text" class="form-control p_input" rows="3" id="alamat" name="alamat" value="{{ old('alamat') }}" required autofocus autocomplete="alamat"></input>
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" class="form-control p_input" id="foto" value="{{ old('foto') }}" name="foto" required>
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" class="form-control p_input" id="email" name="email" value="{{ old('email') }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Kata Sandi</label>
                                    <input type="password" class="form-control p_input" id="password" name="password" required autocomplete="new-password">
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Kata Sandi</label>
                                    <input type="password" class="form-control p_input" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn">Registrasi</button>
                                </div>
                                <p class="sign-up text-center">Sudah mempunyai akun?<a href="{{ route('login') }}"> Masuk di sini</a></p>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>