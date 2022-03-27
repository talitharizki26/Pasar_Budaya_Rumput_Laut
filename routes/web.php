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




Route::get("/", [HomeController::class, "index"]);

Route::get("/redirects", [HomeController::class, "redirects"]);

Route::get("/pelanggan", [AdminController::class, "pelanggan"]);

Route::get("/deleteuser/{id}", [AdminController::class, "deleteuser"]);






Route::get("/profil", [AdminController::class, "profil"]);

Route::get("/editprofile", [HomeController::class, "editprofile"]);


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


// End Artikel








Route::post("/reservation", [AdminController::class, "reservation"]);


Route::get("/testimoni", [AdminController::class, "testimoni"]);









Route::post("/addcart/{id}", [HomeController::class, "addcart"]);

Route::get("/showcart/{id}", [HomeController::class, "showcart"]);

Route::get("/showarticle/{id}", [HomeController::class, "showarticle"]);



Route::get("/remove/{id}", [HomeController::class, "remove"]);



Route::post("/orderconfirm", [HomeController::class, "orderconfirm"]);



Route::get("/pesanan", [AdminController::class, "pesanan"]);



Route::get("/search", [AdminController::class, "search"]);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
