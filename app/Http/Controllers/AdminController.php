<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Produk;

use App\Models\Artikel;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Pembudidaya;
use App\Models\pelanggan;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{





  // public function profil()
  // {

  //   $data = pembudidaya::all();

  //   return view("admin.profil", compact("data"));
  // }



  // Dashboard

  public function chart()
  {

    $total_pesanan = Pesanan::select(DB::raw("CAST(SUM(jumlah_pesanan) as int) as jumlah_pesanan"))
      ->GroupBy(DB::raw("Month(tgl_pesanan)"))
      ->pluck('jumlah_pesanan');

    //dd($total_pesanan);
    $bulan = Pesanan::select(DB::raw("MONTHNAME(tgl_pesanan) as bulan"))
      ->GroupBy(DB::raw("MONTHNAME(tgl_pesanan)"))
      ->pluck('bulan');
   // return view('admin.chart', compact('total_pesanan', 'bulan'));
  }



  // End Dashboard



  public function pelanggan()
  {
    $id = Auth::id();

    $usertype = Auth::user()->no_ktp;

    $da = produk::Where('noktp_pembudidaya','=',$usertype)->pluck('id_rumputlaut');
   
    foreach($da as $key=>$value){
        $s[] =  intval($value);     
    };
    
    
    $encodedSku=  str_replace('"', "", $s);
    // $s = json_encode($s);

    //$data = user::all();
    //$data = pesanan::where('no_ktp', $id)->join('users', 'pesanans.id_rumputlaut', '=', 'users.no_ktp')->get();
    //dd($data);
   // $data = pesanan::where('no_ktp', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get();
  //  $users = DB::table('pesanans')
  //  ->join('users', 'pesanans.user_id', '=', 'users.no_ktp')
  //  ->get(); 
  $user = Pembudidaya::select('*')->where('noktp_pembudidaya', '=', $usertype)->get();
    $data = pesanan::whereIn('id_rumputlaut', $encodedSku)->pluck('noktp_pelanggan');
    $dato = pelanggan::whereIn('noktp_pelanggan' , $data)->get();
    //dd($dato);
    $notif = pesanan::where('noktp_pembudidaya', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get()->take(5);
    return view("admin.pelanggan", compact("dato","notif",'user'));
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

    $no_ktp = Auth::user()->no_ktp;
    //dd($no_ktp);
    // $data2 = produk::all();
    // $data3 = DB::table('produks')->where('no_ktp', $no_ktp)->first();
    $data = produk::where('noktp_pembudidaya', $no_ktp)->get();
   // dd($no_ktp);
    $usertype = Auth::user()->no_ktp;
    $user = Pembudidaya::select('*')->where('noktp_pembudidaya', '=', $no_ktp)->get();
    //$user = DB::table('pembudidayas')->where('noktp_pembudidaya', $usertype)->first('nama_pembudidaya');
    // $data = json_decode(json_encode($data3), true);
    //  dd($data3);
//dd($user);
    // $data = produk::where('no_ktp',$no_ktp);
    $notif = pesanan::where('noktp_pembudidaya', $no_ktp)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get()->take(5);
    

    return view("admin.produk", compact("data","notif",'user'));
  }


  public function uploadproduk(Request $request)
  {
    $no_ktp = Auth::user()->no_ktp;


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

    $data->stok_rumputlaut = $request->stok_rumputlaut;

    $data->noktp_pembudidaya = $no_ktp;

    $data->save();

    return redirect()->back()->with('toast_success', 'Rumput Laut Berhasil Ditambahkan!');;
  }


  public function editproduk($id)
  {
    $no_ktp = Auth::id();
    $data = produk::find($id);
    $notif = pesanan::where('noktp_pembudidaya', $no_ktp)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get()->take(5);
    $usertype = Auth::user()->no_ktp;
    $user = Pembudidaya::select('*')->where('noktp_pembudidaya', '=', $usertype)->get();
    // dd($data);
    return view("admin.editproduk", compact("data","notif","user"));
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

    $data->stok_rumputlaut = $request->stok_rumputlaut;

    $data->save();

    return redirect('produk')->with('toast_success', 'Rumput Laut Berhasil Diedit!');;
  }

  public function hapusproduk($id)
  {
    $data = produk::find($id);

    $data->delete();
    return redirect()->back()->with('toast_success', 'Rumput Laut Berhasil Dihapus!');;
  }

  // End Produk


  // Artikel

  public function artikel()
  {
    $no_ktp = Auth::id();
    $id = Auth::user()->no_ktp;
    // $data2 = produk::all();
    // $data3 = DB::table('produks')->where('no_ktp', $no_ktp)->first();
    $user = Pembudidaya::select('*')->where('noktp_pembudidaya', '=', $id)->get();
    $notif = pesanan::where('noktp_pelanggan', $no_ktp)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get()->take(5);
    $data = artikel::where('no_ktp', $no_ktp)->get();

    // $data = artikel::all();
    return view("admin.artikel", compact("data",'notif','user'));
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


    return redirect()->back()->with('toast_success', 'Artikel Berhasil Ditambahkan!');
  }

  public function editartikel(Request $request,$id_artikel)
  {
    $id = Auth::id();
    $data = artikel::find($id_artikel);
    $notif = pesanan::where('noktp_pembudidaya', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get()->take(5);

    return view("admin.editartikel", compact("data",'notif'));
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

    return redirect('artikel')->with('toast_success', 'Artikel Berhasil Diedit!');
  }


  public function hapusartikel($id_artikel)
  {
    $data = artikel::find($id_artikel);

    $data->delete();
    return redirect()->back()->with('toast_success', 'Artikel Berhasil Dihapus!');
  }



  // End Artikel


  // Pesanan


  public function pesanan()
  {
    $id = Auth::user()->no_ktp;
    //$data = Pesanan::all();
    //$data = pesanan::select('*')->where('user_id', '=', $id)->get();
    $user = Pembudidaya::select('*')->where('noktp_pembudidaya', '=', $id)->get();
    $notif = pesanan::where('noktp_pembudidaya', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get()->take(5);
    

    $data = pesanan::where('noktp_pembudidaya', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get();


    return view('admin.pesanan', compact('data','notif','user'));
  }

  public function updatepesanan(Request $request, $id)
  {
    $id_pesanan = Pesanan::find($id)->get('id_rumputlaut');
    $update_barang = Pesanan::find($id);

    $id_rumputlaut = DB::table('pesanans')->where('id_pesanan', $id)->value('id_rumputlaut');
    $update_stok = produk::find($id_rumputlaut);
    $stock = DB::table('produks')->where('id_rumputlaut', $id_rumputlaut)->value('stok_rumputlaut');
    $totalbeli = DB::table('pesanans')->where('id_pesanan', $id)->value('jumlah_pesanan');
    // dd($totalbeli);

    // $coba = $request->inlineRadioOptions;
    $kurang = $request->inlineRadioOptions;
    $tambah = $request->inlineRadioOptions2;
    $update_barang->konfirmasi_pesanan = $request->inlineRadioOptions;
    $update_barang->status_pesanan = $request->inlineRadioOptions2;


    //dd($kurang);
    if($kurang == "Dikonfirmasi" && $tambah == "Disiapkan"){
      $sisa = $stock - $totalbeli;
      $update_stok->stok_rumputlaut =$sisa;
      $update_stok->save();
      // $data = produk::where('id_rumputlaut', $id_rumputlaut)->get();
     // dd($update_barang);
    }

  
  
    // $update_barang->jumlah_barang = $request->updateJumlahBarang;
    // dd($update_barang);
    $update_barang->save();
    // return dd($update_barang);
    return redirect()->back();
  }

  public function laporanpenjualan()
  {
    $id = Auth::id();
    $usertype = Auth::user()->no_ktp;
    $da = produk::Where('noktp_pembudidaya','=',$usertype)->pluck('id_rumputlaut');
$datray = [];
foreach($da as $key=>$value){
    $s[] =  intval($value);     
};


$encodedSku=  str_replace('"', "", $s);
//dd($encodedSku);
$s = json_encode($s);
    $id = Auth::id();
    $data = pesanan::whereIn('id_rumputlaut', $encodedSku)->where('status_pesanan', '=', 'Selesai')->get();
    $notif = pesanan::whereIn('id_rumputlaut', $encodedSku)->get()->take(5);
//dd($data);
$user = Pembudidaya::select('*')->where('noktp_pembudidaya', '=', $usertype)->get();
    return view('admin.laporanpenjualan', compact('data','notif','user'));
  }

  public function cetaklaporan()
  {
    $usertype = Auth::user()->no_ktp;
    $da = produk::Where('noktp_pembudidaya','=',$usertype)->pluck('id_rumputlaut');
$datray = [];
foreach($da as $key=>$value){
    $s[] =  intval($value);     
};


$encodedSku=  str_replace('"', "", $s);
$s = json_encode($s);
    $id = Auth::id();
    //$data = Pesanan::all();
    //$data = pesanan::select('*')->where('user_id', '=', $id)->get();
    //dd($da);
    $data = pesanan::where('id_rumputlaut', $encodedSku)->where('status_pesanan', '=', 'Selesai')->get();
    

    return view('admin.cetaklaporan', compact('data'));
  }

  // End Pesanan

  // Testimoni

  public function testimoni()
  {


    $id = Auth::user()->no_ktp;
   // $data = pesanan::where('no_ktp', $id)->where('bintang_testimoni',5)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get();
//dd($id);
$data = pesanan::where('noktp_pembudidaya', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get();

//dd($data);
$user = Pembudidaya::select('*')->where('noktp_pembudidaya', '=', $id)->get();
    $notif = pesanan::where('noktp_pelanggan', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get()->take(5);

    return view("admin.testimoni", compact("data",'notif','user'));

    //return redirect('login');
  }

  public function balastestimoni($id_pesanan)
  {
    $id = Auth::id();
    $data = pesanan::find($id_pesanan);
    $notif = pesanan::where('noktp_pelanggan', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get()->take(5);

    return view("admin.balastestimoni", compact("data",'notif'));
  }

  public function updatebalasan(Request $request, $id_pesanan)
  {

    $data = pesanan::find($id_pesanan);

    $data->balasan_testimoni = $request->balasan_testimoni;

    $data->save();

    return redirect('testimoni')->with('toast_success', 'Balasan Testimoni Berhasil Dikirim!');
  }



  // End Testimoni

  // Cari

  public function search_pelanggan(Request $request)
  {

    $search_pelanggan = $request->search_pelanggan;
    $id = Auth::id();


    $data = pesanan::where('no_ktp', $id)->where('id_pesanan', 'Like', '%' . $search_pelanggan . '%')->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get();
//dd($search_testimoni);

  if($data->isNotEmpty())
  {
  return view('admin.testimoni', compact('data','notif'));
  } else{
    return redirect()->back()->with('toast_error', 'Data tidak ditemukan!');
    $data = pesanan::where('no_ktp', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get();

  return view("admin.testimoni", compact('data','notif'));
  }

  }



  public function search_testimoni(Request $request)
  {

    $search_testimoni = $request->search_testimoni;
    $id = Auth::id();


    $data = pesanan::where('no_ktp', $id)->where('id_pesanan', 'Like', '%' . $search_testimoni . '%')->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get();
//dd($search_testimoni);
    $notif = pesanan::where('no_ktp', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get()->take(5);

  if($data->isNotEmpty())
  {
  return view('admin.testimoni', compact('data','notif'));
  } else{
    return redirect()->back()->with('toast_error', 'Data tidak ditemukan!');

    $data = pesanan::where('no_ktp', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get();

  return view("admin.testimoni", compact("data",'notif'));
  }

  }



  public function search_pesanan(Request $request)
  {

    $search_pesanan = $request->search_pesanan;
    $id = Auth::id();

    $id_rumputlaut = DB::table('produks')->where('no_ktp', $id)->value('id_rumputlaut');

    $data = pesanan::where('no_ktp', $id)->where('user_id', 'Like', '%' . $search_pesanan . '%')->orWhere('id_pesanan', 'Like', '%' . $search_pesanan . '%')->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get();

    $notif = pesanan::where('no_ktp', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get()->take(5);

if($data->isNotEmpty())
{
return view('admin.pesanan', compact('data','notif'));
} else{
  $id = Auth::id();
  $data = pesanan::where('no_ktp', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get();
  return redirect()->back()->with('toast_error', 'Data tidak ditemukan!');
  
return view("admin.pesanan", compact('data','notif'));
}

  }


  public function search_artikel(Request $request)
  {

    $search_artikel = $request->search_artikel;
    $id = Auth::id();

     $data = DB::table('artikels')
         ->where('no_ktp', $id)
         ->where('judul_artikel', 'Like', '%' . $search_artikel . '%')
         ->orwhere('sumber_artikel', 'Like', '%' . $search_artikel . '%')
         ->get();
// dd($data);
$notif = pesanan::where('no_ktp', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get()->take(5);

if($data->isNotEmpty())
{
  return view('admin.artikel', compact('data','notif'));
} else{
  $no_ktp = Auth::id();
  $data = artikel::where('no_ktp', $no_ktp)->get();
  return redirect()->back()->with('toast_error', 'Data tidak ditemukan!');
  // $data = artikel::all();
  return view("admin.artikel", compact('data','notif'));
}
    // $data = Artikel::where('no_ktp', $id)->where('judul_artikel', 'Like', '%' . $search_artikel . '%')->orWhere('sumber_artikel', 'Like', '%' . $search_artikel . '%')
    //   ->get();


    //return view('admin.artikel', compact('data'));
  }


  public function search_produk(Request $request)
  {

    $search = $request->search;
    $id = Auth::id();

     $data = DB::table('produks')
         ->where('no_ktp', $id)
         ->where('jenis_rumputlaut', 'Like', '%' . $search . '%')
         ->get();
// dd($data);
$notif = pesanan::where('no_ktp', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get()->take(5);

if($data->isNotEmpty())
{
  return view('admin.produk', compact('data','notif'));
} else{
  $no_ktp = Auth::id();
  $data = produk::where('no_ktp', $no_ktp)->get();
  return redirect()->back()->with('toast_error', 'Data tidak ditemukan!');
  // $data = artikel::all();
  return view("admin.produk", compact('data','notif'));
}
    // $data = Artikel::where('no_ktp', $id)->where('judul_artikel', 'Like', '%' . $search_artikel . '%')->orWhere('sumber_artikel', 'Like', '%' . $search_artikel . '%')
    //   ->get();


    //return view('admin.artikel', compact('data'));
  }


  // End Cari


  public function editprofile($id)
  {
      $data = pembudidaya::find($id);
     // dd($data);
return view("admin.editadminprofil", compact('data'));
  }

  public function updateprofile(Request $request, $id)
  {
    $data = pembudidaya::find($id);

    $image = $request->gambar;

    if ($image) {

      $imagename = time() . '.' . $image->getClientOriginalExtension();

      $request->gambar->move('userimage', $imagename);

      $data->foto_pembudidaya = $imagename;
    }


    $data->nama_pembudidaya = $request->nama_pembudidaya;

    $data->alamat_pembudidaya = $request->alamat_pembudidaya;

    $data->nohp_pembudidaya = $request->nohp_pembudidaya;

    $data->jenkel_pembudidaya = $request->jenkel_pembudidaya;

    $data->tgllahir_pembudidaya = $request->tgllahir_pembudidaya;


    $data->save();
dd("oke");
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
}
