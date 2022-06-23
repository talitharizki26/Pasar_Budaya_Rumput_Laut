<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Carbon\Carbon;
use App\Models\Pelanggan;

use App\Models\Produk;

use App\Models\Pembudidaya;

use App\Models\Artikel;

use App\Models\Cart;

use App\Models\Pesanan;

use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class HomeController extends Controller
{
    public function index()
    {

        if (Auth::id()) {

            return redirect('redirects');
        } else

            $data = produk::all();

        $data2 = artikel::all();

        $data3 = pesanan::all();

        return view("home", compact("data", "data2", "data3"));
    }




    public function redirects()
    {


        $id = Auth::id();

        $count = cart::where('user_id', $id)->count();


        if (Auth::id() == $id) {

            $data4 = cart::where('user_id', $id)->join('produks', 'carts.id_rumputlaut', '=', 'produks.id_rumputlaut')->get();
            $status = "Selesai";
            $data5 = pesanan::select('*')->where('isi_testimoni', '=', null)->get();
        }
        // dd($data5);
        //  else {

        //     return redirect()->back();
        // }



        $data = produk::all();

        $data2 = artikel::all();

        $data3 = pesanan::all();

        $usertype = Auth::user()->usertype;
        // dd($usertype);
        // $namee = Auth::user()->name;selesai
        // $emaill = Auth::user()->emaill;
        // dd($usertype);
        // $user = DB::table('users')->where('name', $namee)->first('id');
        // $ii = $user;
        // dd($ii);
        if ($usertype == '1') {

            $id = Auth::id();
            $no_ktp = Auth::user()->no_ktp;
            $id_rumputlaut = DB::table('produks')->where('noktp_pembudidaya', $no_ktp)->value('id_rumputlaut');

            $usertype = Auth::user()->no_ktp;
//dd($id_rumputlaut);
            $user = Pembudidaya::select('*')->where('noktp_pembudidaya', '=', $usertype)->get();





            // $id = Auth::id();
            // $user = DB::table('pembudidayas')->where('noktp_pembudidaya', $no_ktp)->first('nama_pembudidaya');
            //dd($id_rumputlaut);
            //$data = Pesanan::all();
            //$data = pesanan::select('*')->where('user_id', '=', $id)->get();
            $data = pesanan::where('id_rumputlaut', $id_rumputlaut)->where('status_pesanan', 'Selesai')->get();
            $selesai = $data->count();
            // dd($data);

            $data1 = pesanan::where('id_rumputlaut', $id_rumputlaut)->where('status_pesanan', 'Diantar')->get();
            $diantar = $data1->count();

            $data2 = pesanan::where('id_rumputlaut', $id_rumputlaut)->where('konfirmasi_pesanan', 'Ditolak')->get();
            $batal = $data2->count();

            $data3 = pesanan::where('id_rumputlaut', $id_rumputlaut)->where('status_pesanan', 'Selesai')->get();
            $total = $data3->sum('total_pesanan');

            $data4 = pesanan::where('id_rumputlaut', $id_rumputlaut)->get();
            $rating = $data4->avg('bintang_testimoni');



            //dd($no_ktp);
            //  DB::table('destination')->where(array('user_id'=>'1' ))->groupBy('tenantID')->get();
            $da = produk::Where('noktp_pembudidaya','=',$no_ktp)->get('id_rumputlaut');
            $datap = DB::table('produks')->select('id_rumputlaut','noktp_pembudidaya')->where('noktp_pembudidaya','=',$no_ktp)->get('id_rumputlaut');
            $arrayData = array_map(function($item) {
                return (array)$item; 
            }, $da->toArray());

            //dd($arrayData);
            $datap= json_decode( json_encode($datap), true);

            //dd($datap);
            $total_pesanan = Pesanan::select(DB::raw("CAST(SUM(jumlah_pesanan) as int) as jumlah_pesanan"))
                ->GroupBy(DB::raw("Month(tgl_pesanan)"))
                ->Wherein('id_rumputlaut', [$arrayData ])
                ->orderBy(DB::raw("Month(tgl_pesanan)"))
                ->pluck('jumlah_pesanan');
            //dd($total_pesanan);
            //dd($total_pesanan);
            $bulan = Pesanan::select(DB::raw("MONTHNAME(tgl_pesanan) as bulan"))
                ->GroupBy(DB::raw("MONTHNAME(tgl_pesanan)"))
                ->Wherein('id_rumputlaut', [ $arrayData])
           //     ->join('produks','pesanans.id_rumputlaut', '=','produks.')
                ->orderBy(DB::raw("Month(tgl_pesanan)"))
                ->pluck('bulan');




            $notif = pesanan::where('noktp_pelanggan', $id)->join('produks', 'pesanans.id_rumputlaut', '=', 'produks.id_rumputlaut')->get()->take(5);



            //dd($no_ktp);
            return view('admin.adminhome', compact('user','bulan', 'total_pesanan', 'selesai', 'diantar', 'batal', 'total', 'rating', 'notif'));
        } else {

            $user_id = Auth::id();
           // dd($user_id);
           $usertype = Auth::user()->no_ktp;
            $count = cart::where('user_id', $user_id)->count();
           // dd($usertype);
            $user = DB::table('pelanggans')->where('noktp_pelanggan', $usertype)->first('nama_pelanggan');

             //dd($user);
            // $orang = Auth::where('user_')




            return view('home', compact('data', 'data2', 'count', 'data3', 'data4', 'data5','user'));
        }
    }


    public function addcart(Request $request, $id)
    {


        if (Auth::id()) {

            $no_ktp = Auth::user()->no_ktp;

            $id_rumputlaut = $id;
            $jumlah = $request->jumlah;

            $cart = new cart;
            $cart->user_id = $no_ktp;
            $cart->id_rumputlaut = $id_rumputlaut;
            $cart->jumlah = $jumlah;

            $cart->save();


            return redirect()->back();
        } else {

            return redirect('/login');
        }
    }


    public function showcart(Request $request, $id)
    {
       // dd($id);

        $count = cart::where('user_id', $id)->count();


        if ( Auth::user()->no_ktp == $id) {

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

            $data = new Pesanan();
            $today = Carbon::today()->setTime(9,30,0);
            $time = Carbon::now('utc')->format('H:i:s');
            $data->noktp_pelanggan = $user_id;

            $data->id_rumputlaut = $request->id_rumputlaut[$key];

            //$data->harga_rumputlaut = $request->harga_rumputlaut[$key];
            $data->tgl_pesanan = $today;
            $data->waktu_pesanan = $time;
            $data->jumlah_pesanan = $request->jumlah_pesanan[$key];
            $data->total_pesanan = $request->total_pesanan[$key];
            $data->bukti_pembayaran = $request->bukti_pembayaran;
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

        $data2 = artikel::where('id_artikel', '=', $id)->get();


        return view("viewarticle", compact("data2"));
    }






    public function showtes(Request $request, $id_pesanan)
    {

        $id = Auth::id();

        $count = cart::where('user_id', $id)->count();


        if (Auth::id() == $id) {

            $data2 = Pesanan::find($id_pesanan);
            $data5 = pesanan::select('*')->where('isi_testimoni', '=', null)->get();

            // dd($data2);
            return view('isitestimoni', compact('data2', 'data5', 'count'));
        }
    }



    public function uploadtestimoni(Request $request, $id)
    {
        $data = Pesanan::find($id);

        $data->isi_testimoni = $request->isi_testimoni;
        $data->bintang_testimoni = $request->bintang_testimoni;

        $data->save();
        // dd($data);
        return redirect('redirects');
        // return view('/redirects');
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
