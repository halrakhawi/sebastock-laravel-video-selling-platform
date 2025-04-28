<?php

namespace App\Models;
use App\Models\Offer;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Cart
{
    use HasFactory;
    public $items = [];
    public $totalQty ;
    public $totalPrice;
    public $offerprice;

    public function __Construct($cart = null) {
        if($cart) {
            
            $this->items = $cart->items;
            $this->totalQty = $cart->totalQty;
            $this->totalPrice = $cart->totalPrice;
            $this->offerprice=$cart->offerprice;
        } else {
            
            $this->items = [];
            $this->totalQty = 0;
            $this->totalPrice = 0;
            $this->offerprice=0.0;
        }
    }
    public function add($video) {
        $offer=Offer::where('video_id',$video->id)->first();
        
        $item = [
            'id' =>  $video->id,
            'title' => $video->name,
            'price' => $video->price,
            'qty' => 0,
            'offerprice'=>0,
            'url' => $video->url,
             'offer'=>0,
        ];

        if( !array_key_exists($video->id, $this->items)) {
            $this->items[$video->id] = $item ;
            $this->totalQty +=1;
            // if(isset($offer)){
            // $this->totalPrice += $offer->offerPrice; 
            // $this->items[$video->id]['offer']=1;
            // }
            // else
            if($offer){
                // dd($cart->items[$video->id]['offer']);
                $this->items[$video->id]['offer']=1;
                $this->totalPrice += $offer->offerPrice; 
                $this->items[$video->id]['offerprice']=$offer->offerPrice;

            }else{
                $this->totalPrice += $video->price; 

            }
            
        } else {
            
            $this->totalQty +=1 ;
            $this->totalPrice += $video->price; 
        }
        
        $this->items[$video->id]['qty']  += 1 ;
        
    }

    public function remove($id) {
        $offer=Offer::where('video_id',$id)->first();

        if( array_key_exists($id, $this->items)) {
           
            
             
             if($offer){
                
                $this->totalQty -= $this->items[$id]['qty'];
                $this->totalPrice -= $this->items[$id]['qty'] * $this->items[$id]['offerprice'];
                

            }else{
                $this->totalQty -= $this->items[$id]['qty'];
                $this->totalPrice -= $this->items[$id]['qty'] * $this->items[$id]['price'];

            }
            unset($this->items[$id]);

            // dd($this->items);

        }

    }

    public function updateQty($id, $qty) {
        
        //reset qty and price in the cart ,
        $this->totalQty -= $this->items[$id]['qty'] ;
        $this->totalPrice -= $this->items[$id]['price'] * $this->items[$id]['qty']   ;
        // add the item with new qty
        $this->items[$id]['qty'] = $qty;

        // total price and total qty in cart
        $this->totalQty += $qty ;
        $this->totalPrice += $this->items[$id]['price'] * $qty   ;

    }

}
