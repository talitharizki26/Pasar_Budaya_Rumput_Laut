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


Route::get("/showarticle/{id}", [HomeController::class, "showarticle"]);

// End Artikel


// Keranjang


Route::post("/addcart/{id}", [HomeController::class, "addcart"]);

Route::get("/showcart/{id}", [HomeController::class, "showcart"]);

Route::post("/reservation", [AdminController::class, "reservation"]);


Route::get("/remove/{id}", [HomeController::class, "remove"]);


Route::post("/orderconfirm", [HomeController::class, "orderconfirm"]);


// End Keranjang


// Pesanan

Route::put('/pesanan/{Pesanan}', [AdminController::class,'updatepesanan']);

Route::get("/pesanan", [AdminController::class, "pesanan"]);
Route::get('/edittolak/{id}',[AdminController::class,'edittolak']);
Route::get('/editbatal/{id}',[AdminController::class,'editbatal']);

Route::get('/statussiap/{id}',[AdminController::class,'statussiap']);
Route::get('/statusantar/{id}',[AdminController::class,'statusantar']);
Route::get('/statusselesai/{id}',[AdminController::class,'statusselesai']);
// End Pesanan

// Testimoni

Route::get("/testimoni", [AdminController::class, "testimoni"]);

//End Testimoni


Route::get("/search", [AdminController::class, "search"]);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
