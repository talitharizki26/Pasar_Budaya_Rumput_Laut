<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use Carbon\Carbon;

//use Illuminate\Support\Carbon;

use App\Models\Pelanggan;

use App\Models\Produk;

use App\Models\Pembudidaya;

use App\Models\Artikel;

use App\Models\Cart;

use App\Models\Pesanan;

use App\Models\Saran;

use App\Models\Suka;

use App\Models\Tidaksuka;

use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class HomeController extends Controller
{
    public function index()
    {

        if (Auth::id()) {

            return redirect('redirects');
        } else

            $produk = produk::all();
        $data2 = artikel::where("status", "final")->get();
        $data3 = pesanan::all();

        return view("home", compact("produk", "data2", "data3"));
    }




    public function redirects()
    {


        $id = Auth::id();
        // dd($id);
        $count = cart::where('user_id', $id)->count();
        $user = Auth::user();
        // dd($user);

        if (Auth::id() == $id) {

            $data4 = cart::where('user_id', $id)->join('produks', 'carts.id_rumputlaut', '=', 'produks.id_rumputlaut')->get();
            $status = "Selesai";
            $no_ktp = Auth::user()->no_ktp;
            $data5 = pesanan::select('*')->where('noktp_pelanggan', '=', $no_ktp)->where('isi_testimoni', '=', null)->get();
        }
        // dd($data5);
        //  else {

        //     return redirect()->back();
        // }



        $produk = produk::select('*', 'produks.id_rumputlaut AS id_produk', DB::raw('SUM(jumlah) as total_jumlah'))
            ->where('stok_rumputlaut', '>', '0')
            ->join('pembudidayas', 'produks.noktp_pembudidaya', '=', 'pembudidayas.noktp_pembudidaya')
            ->leftJoin('carts', 'produks.id_rumputlaut', '=', 'carts.id_rumputlaut')
            ->orderBy('produks.id_rumputlaut', 'desc')
            ->groupBy('produks.id_rumputlaut')
            ->get()
            ->take(100);

        $data2 = artikel::where("status", "final")->get();

        $data3 = pesanan::where('status_pesanan', 'Selesai')
            ->whereNotNull('isi_testimoni')
            ->join('pelanggans', 'pesanans.noktp_pelanggan', '=', 'pelanggans.noktp_pelanggan')
            ->orderBy('id_pesanan', 'desc')
            ->get()
            ->take(10);

        $userty = Auth::id();

        if ($userty == null) {
            return redirect('/');
        }
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {

            $id = Auth::id();
            $no_ktp = Auth::user()->no_ktp;
            $id_rumputlaut = DB::table('produks')->where('noktp_pembudidaya', $no_ktp)->value('id_rumputlaut');

            $usertype = Auth::user()->no_ktp;
            //dd($id_rumputlaut);
            $da = produk::Where('noktp_pembudidaya', '=', $no_ktp)->pluck('id_rumputlaut');
            // dd($da);
            if ($da->isNotEmpty()) {
                $datray = [];
                foreach ($da as $key => $value) {
                    $s[] =  intval($value);
                };


                $encodedSku =  str_replace('"', "", $s);
                $s = json_encode($s);

                $data = pesanan::whereIn('id_rumputlaut', $encodedSku)->where('status_pesanan', 'Selesai')->get();
                $selesai = $data->count();
                // dd($data);

                $data1 = pesanan::whereIn('id_rumputlaut', $encodedSku)->where('status_pesanan', 'Diantar')->get();
                $diantar = $data1->count();

                $data2 = pesanan::whereIn('id_rumputlaut', $encodedSku)->where('konfirmasi_pesanan', 'Ditolak')->get();
                $batal = $data2->count();

                $data3 = pesanan::whereIn('id_rumputlaut', $encodedSku)->where('status_pesanan', 'Selesai')->get();
                $total = $data3->sum('total_pesanan');

                $data4 = pesanan::whereIn('id_rumputlaut', $encodedSku)->get();
                $rating = $data4->avg('bintang_testimoni');



                //dd($no_ktp);
                //  DB::table('destination')->where(array('user_id'=>'1' ))->groupBy('tenantID')->get();

                //dd($da);
                $datap = DB::table('produks')->select('id_rumputlaut', 'noktp_pembudidaya')->where('noktp_pembudidaya', '=', $no_ktp)->get('id_rumputlaut');

                //$notif = pesanan::whereIn('id_rumputlaut', $encodedSku)->get()->take(5);
                $notif = pesanan::where('noktp_pembudidaya', $no_ktp)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->orderBy('id_pesanan', 'desc')->get()->take(5);

                $total_pesanan = Pesanan::select(DB::raw("CAST(SUM(jumlah_pesanan) as int) as jumlah_pesanan"))
                    ->GroupBy(DB::raw("Month(tgl_pesanan)"))
                    ->whereIn('id_rumputlaut',   $encodedSku)
                    ->orderBy(DB::raw("Month(tgl_pesanan)"))
                    ->pluck('jumlah_pesanan');
                //dd($total_pesanan);
                //dd($total_pesanan);
                $bulan = Pesanan::select(DB::raw("MONTHNAME(tgl_pesanan) as bulan"))
                    ->GroupBy(DB::raw("MONTHNAME(tgl_pesanan)"))
                    ->WhereIn('id_rumputlaut',   $encodedSku)
                    //     ->join('produks','pesanans.id_rumputlaut', '=','produks.')
                    ->orderBy(DB::raw("Month(tgl_pesanan)"))
                    ->pluck('bulan');
            } else {

                $data = pesanan::where('id_rumputlaut', $no_ktp)->where('status_pesanan', 'Selesai')->get();
                $selesai = $data->count();
                // dd($data);

                $data1 = pesanan::where('id_rumputlaut', $no_ktp)->where('status_pesanan', 'Diantar')->get();
                $diantar = $data1->count();

                $data2 = pesanan::where('id_rumputlaut', $no_ktp)->where('konfirmasi_pesanan', 'Ditolak')->get();
                $batal = $data2->count();

                $data3 = pesanan::where('id_rumputlaut', $no_ktp)->where('status_pesanan', 'Selesai')->get();
                $total = $data3->sum('total_pesanan');

                $data4 = pesanan::where('id_rumputlaut', $no_ktp)->get();
                $rating = $data4->avg('bintang_testimoni');

                $total_pesanan = Pesanan::select(DB::raw("CAST(SUM(jumlah_pesanan) as int) as jumlah_pesanan"))
                    ->GroupBy(DB::raw("Month(tgl_pesanan)"))
                    ->where('id_rumputlaut',   $no_ktp)
                    ->orderBy(DB::raw("Month(tgl_pesanan)"))
                    ->pluck('jumlah_pesanan');
                //dd($total_pesanan);
                //dd($total_pesanan);
                $bulan = Pesanan::select(DB::raw("MONTHNAME(tgl_pesanan) as bulan"))
                    ->GroupBy(DB::raw("MONTHNAME(tgl_pesanan)"))
                    ->where('id_rumputlaut',   $no_ktp)
                    //     ->join('produks','pesanans.id_rumputlaut', '=','produks.')
                    ->orderBy(DB::raw("Month(tgl_pesanan)"))
                    ->pluck('bulan');


                $notif = pesanan::where('noktp_pelanggan', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->orderBy('id_pesanan', 'desc')->get()->take(5);

                $saran = Saran::all();
                $user = Pembudidaya::select('*')->where('noktp_pembudidaya', '=', $usertype)->get();
                return view('admin.adminhome', compact('saran', 'user', 'bulan', 'total_pesanan', 'selesai', 'diantar', 'batal', 'total', 'rating', 'notif'));
            }
            //   dd($data);

            $user = Pembudidaya::select('*')->where('noktp_pembudidaya', '=', $usertype)->get();
            //dd($user);





            $saran = Saran::all();

            //dd($no_ktp);
            return view('admin.adminhome', compact('saran', 'user', 'bulan', 'total_pesanan', 'selesai', 'diantar', 'batal', 'total', 'rating', 'notif'));
        } else {

            $user_id = Auth::user()->no_ktp;
            //dd($user_id);
            $usertype = Auth::user()->no_ktp;
            $count = cart::where('user_id', $user_id)->count();
            $cart = cart::select('*')->where('user_id', '=', $user_id)->get();

            // $data = cart::where('user_id', $id)->join('produks', 'carts.id_rumputlaut', '=', 'produks.id_rumputlaut')->get();

            // dd($usertype);
            $user = DB::table('pelanggans')->where('noktp_pelanggan', $usertype)->first('nama_pelanggan');
            $foto = DB::table('pelanggans')->where('noktp_pelanggan', $usertype)->get();

            //dd($user);
            // $orang = Auth::where('user_')

            //dd($foto);


            return view('home', compact('foto', 'produk', 'data2', 'count', 'data3', 'data4', 'data5', 'user', 'cart'));
        }
    }


    public function addcart(Request $request, $id)
    {


        if (Auth::id()) {

            $no_ktp = Auth::user()->no_ktp;

            $id_rumputlaut = $id;
            $jumlah = $request->jumlah;
            // $stok = $request->stok_rumputlaut;
            // //dd($stok);
            // if ($jumlah > $stok) {
            //     return redirect()->back()->with('toast_error', 'Persediaan Rumput Laut Pembudidaya Kurang!');;
            // } else {
            $cart = new cart;
            $cart->user_id = $no_ktp;
            $cart->id_rumputlaut = $id_rumputlaut;
            $cart->jumlah = $jumlah;

            $cart->save();

            return redirect()->back();
            // }
        } else {

            return redirect('/login');
        }
    }


    public function showcart(Request $request, $id)
    {
        // dd($id);

        $count = cart::where('user_id', $id)->count();


        if (Auth::user()->no_ktp == $id) {

            $data = cart::where('user_id', $id)->join('produks', 'carts.id_rumputlaut', '=', 'produks.id_rumputlaut')->get();

            $data2 = cart::select('*')->where('user_id', '=', $id)->get();

            $data5 = pesanan::select('*')->where('isi_testimoni', '=', null)->get();

            return view('showcart', compact('count', 'data', 'data2', 'data5'));
        } else {

            return redirect()->back();
        }
    }

    public function remove($id)
    {
        $data = cart::find($id);
        $data->delete();
        return redirect()->back();
    }


    public function orderconfirm(Request $request)
    {
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');

        foreach ($request->user_id as $key => $user_id) {

            DB::table('carts')->where('user_id', $user_id)->delete();

            $data = new Pesanan();
            $today = Carbon::today()->setTime(9, 30, 0);
            $time = Carbon::now('utc')->format('H:i:s');
            $data->noktp_pelanggan = $user_id;

            $data->id_rumputlaut = $request->id_rumputlaut[$key];

            //$data->harga_rumputlaut = $request->harga_rumputlaut[$key];
            $data->tgl_pesanan = $today;
            $data->waktu_pesanan = $time;
            $data->jumlah_pesanan = $request->jumlah_pesanan[$key];
            $data->total_pesanan = $request->total_pesanan[$key];
            $data->status_pesanan = "Belum Disiapkan";

            $image = $request->bukti_pembayaran;

            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->bukti_pembayaran->move('bukti_pembayaran', $imagename);

            $data->bukti_pembayaran = $imagename;




            $data->ekspedisi_pesanan = $request->ekspedisi_pesanan;
            // $data->address = $request->address;
            // $data->testimoni = $request->pesan;


            $data->save();
        }

        return redirect()->back();
    }



    // public function showarticle(Request $request, $id)
    // {
    //     $data2 = artikel::select('*')->where('id', '=', $id)->get();

    //     return view('article', compact('data2'));
    // }

    public function showarticle(Request $request, $id)
    {
        if (Auth::id()) {

            $data6 = suka::where('id_artikel', $id);
            $suka = $data6->count();

            $data7 = tidaksuka::where('id_artikel', $id);
            $tidaksuka = $data7->count();

            $data2 = artikel::where('id_artikel', '=', $id)->get();
            $id = Auth::id();
            $usertype = Auth::user()->no_ktp;

            $count = cart::where('user_id', $id)->count();
            $data3 = DB::table('artikels')->get()->take(5);
            $data5 = pesanan::select('*')->where('isi_testimoni', '=', null)->get();
            $foto = DB::table('pelanggans')->where('noktp_pelanggan', $usertype)->get();
            return view("viewarticle", compact("data2", "data3", 'count', 'data5', 'foto', 'suka', 'tidaksuka'));
        } else {

            return redirect('/login');
        }
    }


    public function konfirmasi(Request $request, $id_pesanan)
    {

        $data = Pesanan::where('id_pesanan', '=', $id_pesanan)->get();
        $rumput = Pesanan::where('id_pesanan', '=', $id_pesanan)->pluck('id_rumputlaut');
        $datarumput = Produk::where('id_rumputlaut', '=', $rumput)->get();
        $id = Auth::id();
        $count = cart::where('user_id', $id)->count();
        $data5 = pesanan::select('*')->where('isi_testimoni', '=', null)->get();

        // dd($data2);
        return view('konfirmasi', compact('data', 'data5', 'count', 'datarumput'));
    }



    public function showtes(Request $request, $id_pesanan)
    {

        $id = Auth::id();

        $count = cart::where('user_id', $id)->count();


        if (Auth::id() == $id) {

            $data2 = Pesanan::find($id_pesanan);
            //dd($data2);
            $data5 = pesanan::select('*')->where('isi_testimoni', '=', null)->get();

            // dd($data2);
            return view('isitestimoni', compact('data2', 'data5', 'count'));
        }
    }

    public function showref(Request $request, $id_pesanan)
    {

        $id = Auth::id();

        $count = cart::where('user_id', $id)->count();


        if (Auth::id() == $id) {

            $data2 = Pesanan::find($id_pesanan);
            //dd($data2);
            $data5 = pesanan::select('*')->where('isi_testimoni', '=', null)->get();

            // dd($data2);
            return view('isiref', compact('data2', 'data5', 'count'));
        }
    }



    public function uploadtestimoni(Request $request, $id)
    {
        $data = Pesanan::find($id);
        $today = Carbon::today()->setTime(9, 30, 0);
        $now = date('H:i:s');
        $data->isi_testimoni = $request->isi_testimoni;
        $data->bintang_testimoni = $request->bintang_testimoni;
        $data->tgl_testimoni = $today;
        $data->waktu_testimoni = $now;
        $data->save();
        // dd($data);
        return redirect('redirects');
        // return view('/redirects');
    }

    public function uploadref(Request $request, $id)
    {
        // $rumput = Pesanan::where('id_pesanan', '=', $id)->pluck('id_rumputlaut');
        // $aa = DB::table('pesanans')->where('id_pesanan', $id)->value('jumlah_pesanan');
        // $stock = DB::table('produks')->where('id_rumputlaut', $rumput)->value('stok_rumputlaut');
        // $update_stok = produk::find($rumput)->first();
        // $sisa = $aa + $stock;
        // $update_stok->stok_rumputlaut = $sisa;
        // $update_stok->save();
        // dd($sisa);

        // $datarumput = Produk::where('id_rumputlaut', '=', $rumput)->pluck('stok_rumputlaut');
        // dd($datarumput);
        $data = Pesanan::find($id);
        $today = Carbon::today()->setTime(9, 30, 0);
        $now = date('H:i:s');
        $data->isi_testimoni = $request->isi_testimoni;
        $data->alasan_refund = $request->alasan_refund;
        $data->tgl_testimoni = $today;
        $data->waktu_testimoni = $now;
        $data->konfirmasi_pesanan = "Belum Dikonfirmasi";
        $data->status_pesanan = "Direfund";
        $data->save();
        // dd($data);
        return redirect('redirects');
        // return view('/redirects');
    }


    public function saran(Request $request)
    {

        if (Auth::id() == null) {
            return redirect('/login');
        } else {
            $id = Auth::user()->no_ktp;
            $data = new saran;
            $today = Carbon::today()->setTime(9, 30, 0);
            $data->isi_saran = $request->saran;
            $data->noktp_pelanggan = $id;
            // dd($data);
            $data->save();
            return redirect()->back()->with('toast_success', 'Terima kasih atas saranya ');;
        }


        // return view("viewarticle", compact("data2"));
    }


    public function editprofil($id)
    {
        $data = pelanggan::find($id);
        // dd($data);
        return view("editprofile", compact('data'));
    }


    public function updateprofil(Request $request, $id)
    {
        $data = pelanggan::find($id);

        $request->validate([
            'nama_pelanggan'  => 'alpha',
            'gambar'  => 'mimes:jpg,jpeg,png',
            'tgllahir_pelanggan' => 'before:-17 years',

        ]);

        $image = $request->gambar;

        if ($image) {

            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->gambar->move('userimage', $imagename);

            $data->foto_pelanggan = $imagename;
        }

        $data->nama_pelanggan = $request->nama_pelanggan;
        $data->alamat_pelanggan = $request->alamat_pelanggan;
        $data->nohp_pelanggan = $request->nohp_pelanggan;
        $data->jenkel_pelanggan = $request->jenkel_pelanggan;
        $data->tgllahir_pelanggan = $request->tgllahir_pelanggan;

        $data->save();
        return redirect()->back();
        //dd("oke");
        //return redirect('redirects');
    }





    public function like($id_artikel)
    {

        //$data = suka::find($id_artikel);
        $id = Auth::user()->no_ktp;
        //$suka = DB::table('sukas')->where('id_artikel', $id_artikel)->where('noktp_pelanggan', $id)->first();
        $suka = Suka::where('id_artikel', $id_artikel)->where('noktp_pelanggan', $id)->first();

        if ($suka) {
            $suka->delete();
            return redirect()->back();
            //return "hapus like";
        } else {
            //return "tambah like";
            Suka::create([
                'id_artikel' => $id_artikel,
                'noktp_pelanggan' => $id
            ]);
            //$data->id_artikel = $id_artikel;
            //$data->noktp_pelanggan = $id;
            //$data->save();
            return redirect()->back();
        }
    }

    public function dislike($id_artikel)
    {
        $id = Auth::user()->no_ktp;
        $dislike = Tidaksuka::where('id_artikel', $id_artikel)->where('noktp_pelanggan', $id)->first();

        if ($dislike) {
            $dislike->delete();
            return redirect()->back();
        } else {
            Tidaksuka::create([
                'id_artikel' => $id_artikel,
                'noktp_pelanggan' => $id
            ]);
            return redirect()->back();
        }
    }





    // public function editprofile()
    // {
    //     $user_id = Auth::id();

    //     $user = DB::table('users')->where('id', $user_id)->first('name');
    //     $data = json_decode(json_encode($user), true);
    //     $userfix = Pelanggan::where('nama_pelanggan', $data)->get('id');
    //     foreach ($userfix as $student) {

    //         $id = ($student['id']
    //         );
    //     }
    //     $data5 = Pelanggan::select('*')->where('id', '=', $id)->get();

    //     // $id = json_decode(json_encode($userfix), true);


    //     $id2 = json_encode($data5);
    //     // $k = $dataPoints;
    //     // dd($k);
    //     // $data4 = Pelanggan::findOrFail($id);
    //     // dd($id2);
    //     // $orang = Auth::where('user_')

    //     return view('editprofile', compact('userfix', 'data5'));
    // }
}
