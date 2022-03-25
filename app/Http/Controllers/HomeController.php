<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Produk;

use App\Models\Artikel;

use App\Models\Cart;

use App\Models\Order;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        if (Auth::id()) {

            return redirect('redirects');
        } else

            $data = produk::all();

        $data2 = artikel::all();

        $data3 = order::all();

        return view("home", compact("data", "data2", "data3"));
    }




    public function redirects()
    {


        $data = produk::all();

        $data3 = order::all();

        $data2 = artikel::all();

        $usertype = Auth::user()->usertype;
        // $namee = Auth::user()->name;
        // $emaill = Auth::user()->emaill;

        // $user = DB::table('users')->where('name', $namee)->first('id');
        // $ii = $user;
        // dd($ii);
        if ($usertype == '1') {
            return view('admin.adminhome');
        } else {

            $user_id = Auth::id();

            $count = cart::where('user_id', $user_id)->count();



            return view('home', compact('data', 'data2', 'count', 'data3'));
        }
    }


    public function addcart(Request $request, $id)
    {


        if (Auth::id()) {

            $user_id = Auth::id();

            $foodid = $id;

            $quantity = $request->quantity;

            $cart = new cart;

            $cart->user_id = $user_id;

            $cart->food_id = $foodid;

            $cart->quantity = $quantity;

            $cart->save();


            return redirect()->back();
        } else {

            return redirect('/login');
        }
    }



    public function showcart(Request $request, $id)
    {

        $count = cart::where('user_id', $id)->count();


        if (Auth::id() == $id) {

            $data2 = cart::select('*')->where('user_id', '=', $id)->get();

            $data = cart::where('user_id', $id)->join('produks', 'carts.food_id', '=', 'produks.id')->get();

            return view('showcart', compact('count', 'data', 'data2'));
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

    public function showarticle(Request $request, $id)
    {
        $data2 = artikel::select('*')->where('id', '=', $id)->get();

        return view('article', compact('data2'));
    }


    public function orderconfirm(Request $request)
    {


        foreach ($request->foodname as $key => $foodname) {

            $data = new order;

            $data->foodname = $foodname;

            $data->price = $request->price[$key];

            $data->quantity = $request->quantity[$key];

            $data->name = $request->name;

            $data->phone = $request->phone;

            $data->address = $request->address;
            $data->testimoni = $request->pesan;


            $data->save();
        }

        return redirect()->back();
    }
}
