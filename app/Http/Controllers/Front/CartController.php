<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Vedio;
use Auth;
use DB;

class CartController extends Controller
{
    public function index(){
    $cart=DB::table('cartitem')->join('cart','cart.id','cart_items.cart_id')
    ->join('vedios','vedios.id','cartitem.video_id')
    ->select('vedios.name','vedios.url','vedios.price')
    ->get();
    return view('',compact('$cart'));
    }

    public function add($cart){
        if(isset($cart)==null){
            Cart::create([
                
            ]);
        }
    }

    
}
