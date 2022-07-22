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
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

  // Profile

  public function editprofile($id)
  {
    $data = pembudidaya::find($id);
    $notif = pesanan::where('noktp_pembudidaya', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->orderBy('id_pesanan', 'desc')->get()->take(5);
    $usertype = Auth::user()->no_ktp;

    $akun = User::where('no_ktp', $usertype)->get();
    $user = Pembudidaya::select('*')->where('noktp_pembudidaya', '=', $usertype)->get();
    //dd($akun);
    return view("admin.editprofile", compact('data', 'notif', 'user', 'akun'));
  }

  public function updateprofile(Request $request, $id)
  {
    $data = pembudidaya::find($id);

    $request->validate([

      // 'no_ktp' => ['required', 'numeric', 'digits:16', 'unique:users'],
      'nama_pembudidaya' => ['required', 'alpha'],
      'nohp_pembudidaya' => ['required', 'numeric', 'min:9'],
      'tgllahir_pembudidaya' => ['required', 'date', 'before:-17 years'],
      'foto_pembudidaya' => ['mimes:jpg,jpeg,png'],

    ]);
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
    return redirect('redirects')->with('toast_success', 'Profil Berhasil Diedit!');
  }

  // End Profile


  // // Dashboard

  // public function chart()
  // {

  //   $total_pesanan = Pesanan::select(DB::raw("CAST(SUM(jumlah_pesanan) as int) as jumlah_pesanan"))
  //     ->GroupBy(DB::raw("Month(tgl_pesanan)"))
  //     ->pluck('jumlah_pesanan');

  //   //dd($total_pesanan);
  //   $bulan = Pesanan::select(DB::raw("MONTHNAME(tgl_pesanan) as bulan"))
  //     ->GroupBy(DB::raw("MONTHNAME(tgl_pesanan)"))
  //     ->pluck('bulan');
  //   // return view('admin.chart', compact('total_pesanan', 'bulan'));
  // }

  // // End Dashboard


  // Pesanan

  public function pesanan()
  {
    $id = Auth::user()->no_ktp;
    $user = Pembudidaya::select('*')->where('noktp_pembudidaya', '=', $id)->get();
    $notif = pesanan::where('noktp_pembudidaya', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->orderBy('id_pesanan', 'desc')->get()->take(5);
    $data = pesanan::where('noktp_pembudidaya', $id)
      ->where('status_pesanan', '!=', 'Direfund')
      //->orWhere('konfirmasi_pesanan', '!=', 'Refund Ditolak')
      ->orWhere('status_pesanan', '=', null)
      ->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')
      ->join('pelanggans', 'pesanans.noktp_pelanggan', '=', 'pelanggans.noktp_pelanggan')
      ->orderBy('id_pesanan', 'desc')
      ->get();

    return view('admin.pesanan', compact('data', 'notif', 'user'));
  }

  public function refund()
  {
    $id = Auth::user()->no_ktp;
    $user = Pembudidaya::select('*')->where('noktp_pembudidaya', '=', $id)->get();
    $notif = pesanan::where('noktp_pembudidaya', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->orderBy('id_pesanan', 'desc')->get()->take(5);
    $data = pesanan::where('noktp_pembudidaya', $id)
      ->where('status_pesanan', '=', 'Direfund')
      //->orWhere('konfirmasi_pesanan', '=', 'Refund Ditolak')
      ->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')
      ->join('pelanggans', 'pesanans.noktp_pelanggan', '=', 'pelanggans.noktp_pelanggan')
      ->orderBy('id_pesanan', 'desc')
      ->get();

    return view('admin.refund', compact('data', 'notif', 'user'));
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
    $kurang = $request->inlineRadioOptions;
    $tambah = $request->inlineRadioOptions2;
    $update_barang->konfirmasi_pesanan = $request->inlineRadioOptions;
    $update_barang->status_pesanan = $request->inlineRadioOptions2;
    $update_barang->alasan_ditolak = $request->alasan_ditolak;
    if ($update_barang->konfirmasi_pesanan == "Ditolak") {
      $update_barang->status_pesanan = "Ditolak";
    }

    // if ($update_barang->konfirmasi_pesanan == "Refund Ditolak") {
    //   $update_barang->status_pesanan = "Refund Ditolak";
    // }
    //dd($kurang);
    if ($kurang == "Dikonfirmasi" && $tambah == "Disiapkan") {
      $sisa = $stock - $totalbeli;
      $update_stok->stok_rumputlaut = $sisa;
      $update_stok->save();
    }
    $update_barang->save();
    // return dd($update_barang);
    return redirect()->back();
  }


  // Pelanggan

  public function pelanggan()
  {
    $id = Auth::id();
    $no_ktp = Auth::user()->no_ktp;
    $da = produk::Where('noktp_pembudidaya', '=', $no_ktp)->pluck('id_rumputlaut');
    if ($da->isNotEmpty()) {
      foreach ($da as $key => $value) {
        $s[] =  intval($value);
      };

      $encodedSku =  str_replace('"', "", $s);

      $user = Pembudidaya::select('*')->where('noktp_pembudidaya', '=', $no_ktp)->get();
      $data = pesanan::whereIn('id_rumputlaut', $encodedSku)->pluck('noktp_pelanggan');
      $dato = pelanggan::whereIn('noktp_pelanggan', $data)->get();
      //dd($dato);

      $notif = pesanan::where('noktp_pembudidaya', $no_ktp)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->orderBy('id_pesanan', 'desc')->get()->take(5);
      return view("admin.pelanggan", compact("dato", "notif", 'user'));
    } else {
      $user = Pembudidaya::select('*')->where('noktp_pembudidaya', '=', $no_ktp)->get();
      $data = pesanan::where('id_rumputlaut', $id)->pluck('noktp_pelanggan');
      $dato = pelanggan::where('noktp_pelanggan', $no_ktp)->pluck('noktp_pelanggan');
      $notif = pesanan::where('noktp_pembudidaya', $no_ktp)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->orderBy('id_pesanan', 'desc')->get()->take(5);
      return view("admin.pelanggan", compact("dato", "notif", 'user'));
    }
  }

  // public function deleteuser($id)
  // {

  //   $data = user::find($id);
  //   $data->delete();
  //   return redirect()->back();
  // }

  // End Pelanggan


  // Produk

  public function produk()
  {
    //dd($no_ktp);
    //dd($user);
    //$data = produk::where('no_ktp',$no_ktp);
    $no_ktp = Auth::user()->no_ktp;
    $data = produk::where('noktp_pembudidaya', $no_ktp)->orderBy('id_rumputlaut', 'desc')->get();
    $usertype = Auth::user()->no_ktp;
    $user = Pembudidaya::select('*')->where('noktp_pembudidaya', '=', $no_ktp)->get();
    $notif = pesanan::where('noktp_pembudidaya', $no_ktp)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->orderBy('id_pesanan', 'desc')->get()->take(5);

    return view("admin.produk", compact("data", "notif", 'user'));
  }


  public function uploadproduk(Request $request)
  {
    $no_ktp = Auth::user()->no_ktp;
    // dd($no_ktp);


    $request->validate([

      'harga_rumputlaut'  => 'required', 'integer', 'min:500',
      'durasitahan_rumputlaut'  => 'required', 'integer', 'min:1',
      'stok_rumputlaut'  => 'required', 'integer', 'min:0',
      'gambar_rumputlaut'  => 'mimes:jpg,jpeg,png',

    ]);
    //   Validator::make( [
    //     $request->jenis_rumputlaut => ['required', 'integer','digits:16'],
    //     // 'no_hp' => ['required', 'integer','between:9,14'],
    //     // // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //     // 'foto' => [ 'mimes:jpg,jpeg,png'],
    //     //  'password' => $this->passwordRules(),
    //     // 'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
    // ])->validate();
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
    $no_ktp = Auth::user()->no_ktp;
    $data = produk::find($id);
    $notif = pesanan::where('noktp_pembudidaya', $no_ktp)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->orderBy('id_pesanan', 'desc')->get()->take(5);
    $usertype = Auth::user()->no_ktp;
    $user = Pembudidaya::select('*')->where('noktp_pembudidaya', '=', $usertype)->get();
    // dd($data);
    return view("admin.editproduk", compact("data", "notif", "user"));
  }


  public function updateproduk(Request $request, $id)
  {
    $data = produk::find($id);
    $image = $request->gambar_rumputlaut;

    $request->validate([
      'gambar_rumputlaut'  => 'mimes:jpg,jpeg,png',

    ]);

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
    return redirect('produk')->with('toast_success', 'Rumput Laut Berhasil Diedit!');
  }

  public function hapusproduk($id)
  {
    $data = produk::find($id);

    $data->delete();
    return redirect()->back()->with('toast_success', 'Rumput Laut Berhasil Dihapus!');
  }

  // End Produk


  // Artikel

  public function artikel()
  {
    $no_ktp = Auth::user()->no_ktp;
    $user = Pembudidaya::select('*')->where('noktp_pembudidaya', '=', $no_ktp)->get();
    $notif = pesanan::where('noktp_pembudidaya', $no_ktp)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->orderBy('id_pesanan', 'desc')->get()->take(5);
    $data = artikel::where('no_ktp', $no_ktp)->orderBy('id_artikel', 'desc')->get();
    // $data = artikel::all();
    return view("admin.artikel", compact("data", 'notif', 'user'));
  }

  public function uploadartikel(Request $request)
  {
    $data = new artikel;
    $request->validate([
      'gambar_artikel'  => 'mimes:jpg,jpeg,png',
      'tglupload_artikel'  => 'required',

    ]);

    $no_ktp = Auth::user()->no_ktp;
    $image = $request->gambar_artikel;
    $imagename = time() . '.' . $image->getClientOriginalExtension();
    $request->gambar_artikel->move('artikelimage', $imagename);
    $data->gambar_artikel = $imagename;
    $data->judul_artikel = $request->judul_artikel;
    $data->isi_artikel = $request->isi_artikel;
    $data->sumber_artikel = $request->sumber_artikel;
    $data->tglupload_artikel = $request->tglupload_artikel;
    $data->no_ktp = $no_ktp;
    $data->status = "preview";
    $data->save();

    return redirect()->back()->with('toast_success', 'Artikel Berhasil Ditambahkan!');
  }

  public function editartikel(Request $request, $id_artikel)
  {
    $id = Auth::id();
    $no_ktp = Auth::user()->no_ktp;
    $data = artikel::find($id_artikel);
    $notif = pesanan::where('noktp_pembudidaya', $no_ktp)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->orderBy('id_pesanan', 'desc')->get()->take(5);
    $usertype = Auth::user()->no_ktp;
    $user = Pembudidaya::select('*')->where('noktp_pembudidaya', '=', $usertype)->get();

    return view("admin.editartikel", compact("data", 'notif', 'user'));
  }

  public function updateartikel(Request $request, $id_artikel)
  {
    $data = artikel::find($id_artikel);

    $image = $request->gambar_artikel;

    $request->validate([
      'gambar_artikel'  => 'mimes:jpg,jpeg,png',

    ]);

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

  public function hapusartikel($id)
  {
    $data = artikel::find($id);

    $data->delete();
    return redirect()->back()->with('toast_success', 'Artikel Berhasil Dihapus!');
  }

  public function finalartikel($id)
  {
    $data = artikel::find($id);

    $data->status = "final";

    $data->save();
    return redirect()->back()->with('toast_success', 'Artikel Berhasil Disimpan!');
  }



  public function previewartikel($id)
  {

    $data2 = artikel::where('id_artikel', '=', $id)->get();

    return view("admin.previewartikel", compact("data2"));
  }


  // End Artikel

  // Testimoni

  public function testimoni()
  {
    $id = Auth::user()->no_ktp;
    //dd($id);
    $data = pesanan::where('noktp_pembudidaya', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->where('status_pesanan', '=', 'Selesai')->orderBy('id_pesanan', 'desc')->get();

    //dd($data);
    $user = Pembudidaya::select('*')->where('noktp_pembudidaya', '=', $id)->get();
    $notif = pesanan::where('noktp_pembudidaya', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->orderBy('id_pesanan', 'desc')->get()->take(5);

    return view("admin.testimoni", compact("data", 'notif', 'user'));
  }

  public function balastestimoni($id_pesanan)
  {
    $id = Auth::id();
    $usertype = Auth::user()->no_ktp;
    $no_ktp = Auth::user()->no_ktp;
    $user = Pembudidaya::select('*')->where('noktp_pembudidaya', '=', $usertype)->get();
    $data = pesanan::find($id_pesanan);
    $notif = pesanan::where('noktp_pembudidaya', $no_ktp)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->orderBy('id_pesanan', 'desc')->get()->take(5);

    return view("admin.balastestimoni", compact("data", 'notif', 'user'));
  }

  public function updatebalasan(Request $request, $id_pesanan)
  {
    $data = pesanan::find($id_pesanan);
    $data->balasan_testimoni = $request->balasan_testimoni;

    $data->save();
    return redirect('testimoni')->with('toast_success', 'Balasan Testimoni Berhasil Dikirim!');
  }

  // End Testimoni


  // Cetak Laporan

  public function laporanpenjualan()
  {
    // $id = Auth::user()->no_ktp;
    // //$id = Auth::id();
    // $data = pesanan::where('no_ktp', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->where('status_pesanan', '=', 'Selesai')->get();
    // $notif = pesanan::where('no_ktp', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get()->take(5);

    $id = Auth::user()->no_ktp;
    $user = Pembudidaya::select('*')->where('noktp_pembudidaya', '=', $id)->get();
    $notif = pesanan::where('noktp_pembudidaya', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->orderBy('id_pesanan', 'desc')->get()->take(5);
    $data = pesanan::where('noktp_pembudidaya', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->where('status_pesanan', '=', 'Selesai')->orderBy('id_pesanan', 'desc')->get();

    return view('admin.laporanpenjualan', compact('data', 'notif', 'user'));
  }

  public function cetaklaporan()
  {
    $id = Auth::user()->no_ktp;
    $data = pesanan::where('noktp_pembudidaya', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->where('status_pesanan', '=', 'Selesai')->get();

    return view('admin.cetaklaporan', compact('data'));
  }

  // End Cetak Laporan



  // Cari

  public function search_pesanan(Request $request)
  {
    $search_pesanan = $request->search_pesanan;
    $id = Auth::user()->no_ktp;
    $user = Pembudidaya::select('*')->where('noktp_pembudidaya', '=', $id)->get();
    $data = pesanan::where('noktp_pembudidaya', $id)
      ->where('id_pesanan', 'Like', '%' . $search_pesanan . '%')
      ->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')
      ->orderBy('id_pesanan', 'desc')
      ->get();

    $notif = pesanan::where('noktp_pembudidaya', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->orderBy('id_pesanan', 'desc')->get()->take(5);

    if ($data->isNotEmpty()) {
      return view('admin.pesanan', compact('data', 'notif', 'user'));
    } else {
      $data = pesanan::where('noktp_pembudidaya', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->orderBy('id_pesanan', 'desc')->get();
      return redirect()->back()->with('toast_error', 'Data tidak ditemukan!');

      return view("admin.pesanan", compact('data', 'notif', 'user'));
    }
  }

  public function search_pelanggan(Request $request)
  {
    $search_pelanggan = $request->search_pelanggan;
    $id = Auth::User()->no_ktp;
    $notif = pesanan::where('noktp_pembudidaya', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->orderBy('id_pesanan', 'desc')->get()->take(5);
    $user = Pembudidaya::select('*')->where('noktp_pembudidaya', '=', $id)->get();
    $da = produk::Where('noktp_pembudidaya', '=', $id)->pluck('id_rumputlaut');

    foreach ($da as $key => $value) {
      $s[] =  intval($value);
    };

    $encodedSku =  str_replace('"', "", $s);

    $data = pesanan::whereIn('id_rumputlaut', $encodedSku)->where('noktp_pelanggan', 'Like', '%' . $search_pelanggan . '%')->pluck('noktp_pelanggan');
    $dato = pelanggan::whereIn('noktp_pelanggan', $data)->get();
    //$data = pesanan::where('noktp_pelanggan', $id)->where('id_pesanan', 'Like', '%' . $search_pelanggan . '%')->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get();
    //dd($search_testimoni);

    if ($data->isNotEmpty()) {
      return view('admin.pelanggan', compact('dato', 'notif', 'user'));
    } else {
      return redirect()->back()->with('toast_error', 'Data tidak ditemukan!');
    }
  }

  public function search_produk(Request $request)
  {

    $search = $request->search;
    $id = Auth::user()->no_ktp;
    $user = Pembudidaya::select('*')->where('noktp_pembudidaya', '=', $id)->get();
    $data = DB::table('produks')
      ->where('noktp_pembudidaya', $id)
      ->where('jenis_rumputlaut', 'Like', '%' . $search . '%')
      ->orderBy('id_rumputlaut', 'desc')
      ->get();
    // dd($data);
    $notif = pesanan::where('noktp_pembudidaya', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->orderBy('id_pesanan', 'desc')->get()->take(5);

    if ($data->isNotEmpty()) {
      return view('admin.produk', compact('data', 'notif', 'user'));
    } else {
      $data = produk::where('noktp_pembudidaya', $id)->orderBy('id_rumputlaut', 'desc')->get();
      return redirect()->back()->with('toast_error', 'Data tidak ditemukan!');
      // $data = artikel::all();
      return view("admin.produk", compact('data', 'notif', 'user'));
    }
  }

  public function search_artikel(Request $request)
  {
    $search_artikel = $request->search_artikel;
    $id = Auth::user()->no_ktp;
    $user = Pembudidaya::select('*')->where('noktp_pembudidaya', '=', $id)->get();
    $data = DB::table('artikels')
      ->where('no_ktp', $id)
      ->where('judul_artikel', 'Like', '%' . $search_artikel . '%')
      ->orderBy('id_artikel', 'desc')
      ->get();
    // dd($data);
    $notif = pesanan::where('noktp_pembudidaya', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->orderBy('id_pesanan', 'desc')->get()->take(5);

    if ($data->isNotEmpty()) {
      return view('admin.artikel', compact('data', 'notif', 'user'));
    } else {
      $data = artikel::where('no_ktp', $id)->orderBy('id_artikel', 'desc')->get();
      return redirect()->back()->with('toast_error', 'Data tidak ditemukan!');
      // $data = artikel::all();
      return view("admin.artikel", compact('data', 'notif', 'user'));
    }
  }

  public function search_testimoni(Request $request)
  {
    $search_testimoni = $request->search_testimoni;
    $id = Auth::user()->no_ktp;
    $user = Pembudidaya::select('*')->where('noktp_pembudidaya', '=', $id)->get();
    $data = pesanan::where('noktp_pembudidaya', $id)
      ->where('id_pesanan', 'Like', '%' . $search_testimoni . '%')
      ->where('status_pesanan', '=', 'Selesai')
      ->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')
      ->orderBy('id_pesanan', 'desc')
      ->get();
    //dd($search_testimoni);
    $notif = pesanan::where('noktp_pembudidaya', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->orderBy('id_pesanan', 'desc')->get()->take(5);

    if ($data->isNotEmpty()) {
      return view('admin.testimoni', compact('data', 'notif', 'user'));
    } else {
      $data = pesanan::where('noktp_pembudidaya', $id)
        ->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->orderBy('id_pesanan', 'desc')->get();
      return redirect()->back()->with('toast_error', 'Data tidak ditemukan!');

      return view("admin.testimoni", compact("data", 'notif', 'user'));
    }
  }

  // End Cari


}
