<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// User


Route::get("/", [HomeController::class, "index"]);

Route::get("/redirects", [HomeController::class, "redirects"]);

Route::get("/pelanggan", [AdminController::class, "pelanggan"]);

Route::get("/deleteuser/{id}", [AdminController::class, "deleteuser"]);

Route::get("/chart", [AdminController::class, "chart"]);

Route::get("/editprofil/{id}", [HomeController::class, "editprofil"]);
Route::post("/updateprofil/{id}", [HomeController::class, "updateprofil"]);

Route::get("/editprofile/{id}", [AdminController::class, "editprofile"]);
Route::post("/updateprofile/{id}", [AdminController::class, "updateprofile"]);

// End User

// Produk


Route::get("/produk", [AdminController::class, "produk"]);

Route::post("/uploadproduk", [AdminController::class, "uploadproduk"]);

Route::get("/editproduk/{id}", [AdminController::class, "editproduk"]);

Route::post("/updateproduk/{id}", [AdminController::class, "updateproduk"]);

Route::get("/hapusproduk/{id}", [AdminController::class, "hapusproduk"]);


// End Produk



// Artikel

Route::get("/artikel", [AdminController::class, "artikel"]);

Route::post("/uploadartikel", [AdminController::class, "uploadartikel"]);


Route::get("/editartikel/{id}", [AdminController::class, "editartikel"]);


Route::post("/updateartikel/{id}", [AdminController::class, "updateartikel"]);


Route::get("/hapusartikel/{id}", [AdminController::class, "hapusartikel"]);

Route::get("/finalartikel/{id}", [AdminController::class, "finalartikel"]);


Route::get("/previewartikel/{id}", [AdminController::class, "previewartikel"]);


Route::get("/like/{id}", [HomeController::class, "like"]);

Route::get("/dislike/{id}", [HomeController::class, "dislike"]);

Route::get("/showarticle/{id}", [HomeController::class, "showarticle"]);




// End Artikel


// Keranjang


Route::post("/addcart/{id}", [HomeController::class, "addcart"]);

Route::get("/showcart/{id}", [HomeController::class, "showcart"]);

Route::post("/saran", [HomeController::class, "saran"]);


Route::get("/remove/{id}", [HomeController::class, "remove"]);


Route::post("/orderconfirm", [HomeController::class, "orderconfirm"]);


// End Keranjang


// Pesanan

Route::put('/pesanan/{Pesanan}', [AdminController::class, 'updatepesanan']);

Route::get("/pesanan", [AdminController::class, "pesanan"]);

Route::get("/refund", [AdminController::class, "refund"]);


Route::get('/edittolak/{id}', [AdminController::class, 'edittolak']);
Route::get('/editbatal/{id}', [AdminController::class, 'editbatal']);

Route::get('/statussiap/{id}', [AdminController::class, 'statussiap']);
Route::get('/statusantar/{id}', [AdminController::class, 'statusantar']);
Route::get('/statusselesai/{id}', [AdminController::class, 'statusselesai']);
// End Pesanan

// Testimoni

Route::get("/testimoni", [AdminController::class, "testimoni"]);

Route::get("/balastestimoni/{id}", [AdminController::class, "balastestimoni"]);

Route::post("/updatebalasan/{id}", [AdminController::class, "updatebalasan"]);

Route::get("/showtes/{id}", [HomeController::class, "showtes"]);

Route::get("/showref/{id}", [HomeController::class, "showref"]);

Route::get("/konfirmasi/{id}", [HomeController::class, "konfirmasi"]);

Route::get("/alasantolak/{id}", [HomeController::class, "alasantolak"]);

Route::get("/belumdikonfirmasi/{id}", [HomeController::class, "belumdikonfirmasi"]);

Route::get("/disiapkan/{id}", [HomeController::class, "disiapkan"]);

Route::get("/diantar/{id}", [HomeController::class, "diantar"]);

Route::get("/direfund/{id}", [HomeController::class, "direfund"]);

Route::get("/refselesai/{id}", [HomeController::class, "refselesai"]);

Route::post("/uploadtestimoni/{id}", [HomeController::class, "uploadtestimoni"]);

Route::post("/uploadref/{id}", [HomeController::class, "uploadref"]);
//End Testimoni

// Laporan

Route::get("/cetaklaporan", [AdminController::class, "cetaklaporan"]);

Route::get("/laporanpenjualan", [AdminController::class, "laporanpenjualan"]);

// End Laporan

// Cari

Route::get("/search_produk", [AdminController::class, "search_produk"]);

Route::get("/search_pesanan", [AdminController::class, "search_pesanan"]);

Route::get("/search_artikel", [AdminController::class, "search_artikel"]);

Route::get("/search_testimoni", [AdminController::class, "search_testimoni"]);

Route::get("/search_pelanggan", [AdminController::class, "search_pelanggan"]);
// End Cari


Route::get("/showarticle/{id}", [HomeController::class, "showarticle"]);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
