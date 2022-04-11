<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Produk;

use App\Models\Reservation;

use App\Models\Artikel;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Pembudidaya;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{





  // public function profil()
  // {

  //   $data = pembudidaya::all();

  //   return view("admin.profil", compact("data"));
  // }









  public function pelanggan()
  {
    //$id = Auth::id();
    $data = user::all();
    //$data = user::where('no_ktp', $id)->join('pesanans', 'pesanans.user_id', '=', 'users.no_ktp')->get();
    return view("admin.pelanggan", compact("data"));
  }




  // public function deleteuser($id)
  // {

  //   $data = user::find($id);
  //   $data->delete();
  //   return redirect()->back();
  // }


















  // Produk

  public function produk()
  {

    $no_ktp = Auth::id();

    // $data2 = produk::all();
    // $data3 = DB::table('produks')->where('no_ktp', $no_ktp)->first();
    $data = produk::where('no_ktp', $no_ktp)->get();

    // $data = json_decode(json_encode($data3), true);
    //  dd($data3);

    // $data = produk::where('no_ktp',$no_ktp);

    return view("admin.produk", compact("data"));
  }


  public function uploadproduk(Request $request)
  {

    $no_ktp = Auth::id();

    // dd($no_ktp);

    $data = new produk;

    $image = $request->gambar_rumputlaut;

    $imagename = time() . '.' . $image->getClientOriginalExtension();

    $data->gambar_rumputlaut = $imagename;

    $request->gambar_rumputlaut->move('produkimage', $imagename);

    $data->jenis_rumputlaut = $request->jenis_rumputlaut;

    $data->deskripsi_rumputlaut = $request->deskripsi_rumputlaut;

    $data->harga_rumputlaut = $request->harga_rumputlaut;

    $data->lokasi_rumputlaut = $request->lokasi_rumputlaut;

    $data->durasitahan_rumputlaut = $request->durasitahan_rumputlaut;

    $data->ketersediaan_rumputlaut = $request->ketersediaan_rumputlaut;

    $data->no_ktp = $no_ktp;

    $data->save();

    return redirect()->back();
  }


  public function editproduk($id)
  {

    $data = produk::find($id);
    // dd($data);
    return view("admin.editproduk", compact("data"));
  }


  public function updateproduk(Request $request, $id)
  {
    $data = produk::find($id);

    $image = $request->gambar_rumputlaut;

    if ($image) {

      $imagename = time() . '.' . $image->getClientOriginalExtension();

      $request->gambar_rumputlaut->move('produkimage', $imagename);

      $data->gambar_rumputlaut = $imagename;
    }


    $data->jenis_rumputlaut = $request->jenis_rumputlaut;

    $data->deskripsi_rumputlaut = $request->deskripsi_rumputlaut;

    $data->harga_rumputlaut = $request->harga_rumputlaut;

    $data->lokasi_rumputlaut = $request->lokasi_rumputlaut;

    $data->durasitahan_rumputlaut = $request->durasitahan_rumputlaut;

    $data->ketersediaan_rumputlaut = $request->ketersediaan_rumputlaut;

    $data->save();

    return redirect()->back();
  }

  public function hapusproduk($id)
  {
    $data = produk::find($id);

    $data->delete();
    return redirect()->back();
  }

  // End Produk





  // Artikel

  public function artikel()
  {
    $no_ktp = Auth::id();

    // $data2 = produk::all();
    // $data3 = DB::table('produks')->where('no_ktp', $no_ktp)->first();
    $data = artikel::where('no_ktp', $no_ktp)->get();

    // $data = artikel::all();
    return view("admin.artikel", compact("data"));
  }

  public function uploadartikel(Request $request)
  {
    $data = new artikel;

    $no_ktp = Auth::id();

    $image = $request->gambar_artikel;

    $imagename = time() . '.' . $image->getClientOriginalExtension();

    $request->gambar_artikel->move('artikelimage', $imagename);

    $data->gambar_artikel = $imagename;

    $data->judul_artikel = $request->judul_artikel;

    $data->isi_artikel = $request->isi_artikel;

    $data->sumber_artikel = $request->sumber_artikel;

    $data->tglupload_artikel = $request->tglupload_artikel;

    $data->no_ktp = $no_ktp;

    $data->save();


    return redirect()->back();
  }

  public function editartikel($id_artikel)
  {

    $data = artikel::find($id_artikel);

    return view("admin.editartikel", compact("data"));
  }

  public function updateartikel(Request $request, $id_artikel)
  {

    $data = artikel::find($id_artikel);


    $image = $request->gambar_artikel;

    if ($image) {

      $imagename = time() . '.' . $image->getClientOriginalExtension();

      $request->gambar_artikel->move('artikelimage', $imagename);

      $data->gambar_artikel = $imagename;
    }



    $data->judul_artikel = $request->judul_artikel;

    $data->isi_artikel = $request->isi_artikel;

    $data->sumber_artikel = $request->sumber_artikel;

    $data->tglupload_artikel = $request->tglupload_artikel;

    $data->save();

    return redirect()->back();
  }


  public function hapusartikel($id_artikel)
  {
    $data = artikel::find($id_artikel);

    $data->delete();
    return redirect()->back();
  }



  // End Artikel


  // Pesanan


  public function pesanan()
  {
    $id = Auth::id();
    //$data = Pesanan::all();
    //$data = pesanan::select('*')->where('user_id', '=', $id)->get();
    $data = pesanan::where('no_ktp', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get();


    return view('admin.pesanan', compact('data'));
  }

  public function cetaklaporan()
  {
    $id = Auth::id();
    //$data = Pesanan::all();
    //$data = pesanan::select('*')->where('user_id', '=', $id)->get();
    $data = pesanan::where('no_ktp', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get();


    return view('admin.cetaklaporan', compact('data'));
  }

  // End Pesanan

  // Testimoni

  public function testimoni()
  {


    $id = Auth::id();

    $data = pesanan::where('no_ktp', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get();

    return view("admin.testimoni", compact("data"));

    //return redirect('login');
  }

  public function balastestimoni($id_pesanan)
  {

    $data = pesanan::find($id_pesanan);

    return view("admin.balastestimoni", compact("data"));
  }

  public function updatebalasan(Request $request, $id_pesanan)
  {

    $data = pesanan::find($id_pesanan);

    $data->balasan_testimoni = $request->balasan_testimoni;

    $data->save();

    return redirect()->back();
  }












  // End Testimoni











  public function search(Request $request)
  {

    $search = $request->search;
    $id = Auth::id();

    $data = Pesanan::where('no_ktp', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->orWhere('status_pesanan', 'Like', '%' . $search . '%')->orWhere('konfirmasi_pesanan', 'Like', '%' . $search . '%')
      ->get();


    return view('admin.pesanan', compact('data'));
  }











  public function edittolak($id_pesanan)
  {
    $data = Pesanan::find($id_pesanan);
    // dd($data);
    Pesanan::where('id_pesanan', $id_pesanan)->update([
      'konfirmasi_pesanan' => "Pesanan Dikonfirmasi"
    ]);

    return redirect()->back();
  }

  public function editbatal($id_pesanan)
  {
    $data = Pesanan::find($id_pesanan);
    // dd($data);
    Pesanan::where('id_pesanan', $id_pesanan)->update([
      'konfirmasi_pesanan' => "Pesanan Dibatalkan"
    ]);

    return redirect()->back();
  }

  public function statussiap($id_pesanan)
  {
    $data = Pesanan::find($id_pesanan);
    // dd($data);
    Pesanan::where('id_pesanan', $id_pesanan)->update([
      'status_pesanan' => "Pesanan Disiapkan"
    ]);

    return redirect()->back();
  }

  public function statusantar($id_pesanan)
  {
    $data = Pesanan::find($id_pesanan);
    // dd($data);
    Pesanan::where('id_pesanan', $id_pesanan)->update([
      'status_pesanan' => "Pesanan Diantar"
    ]);

    return redirect()->back();
  }

  public function statusselesai($id_pesanan)
  {
    $data = Pesanan::find($id_pesanan);
    // dd($data);
    Pesanan::where('id_pesanan', $id_pesanan)->update([
      'status_pesanan' => "Pesanan Selesai"
    ]);

    return redirect()->back();
  }


  public function updatepesanan(Request $request, $id)
  {
    $update_barang = Pesanan::find($id);
    // $coba = $request->inlineRadioOptions;
    $update_barang->konfirmasi_pesanan = $request->inlineRadioOptions;
    $update_barang->status_pesanan = $request->inlineRadioOptions2;
    // $update_barang->jumlah_barang = $request->updateJumlahBarang;
    // dd($update_barang);
    $update_barang->save();
    // return dd($update_barang);
    return redirect()->back();
  }
}
