<?php

namespace App\Http\Controllers;
use App\Cart;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;

class cartController extends Controller
{
    public function sendToCart(Request $request){ 
        $userId=$request->session()->get('userId');
        if(!isset($userId)){
          $userId=$request->cookie('userId');
          if(isset($userId))
          $request->session()->put('userId',$userId);
        }
        if(isset($userId)){
        $productId=$request->input('productId');
        $count=DB::table('carts')->where([['user_id','=',$userId],['product_id','=',$productId]])->count();
        if($count==0)
        DB::table('carts')->insert(['user_id'=>$userId,'product_id'=>$productId]);
        echo '1';
        }
        else{
          echo '0';
        }
      }
      public function displayCart(Request $request){
        
              $cartProducts= Cart::where('user_id','=',$request->session()->get('userId'))->get();
              return view('cart.cart',['cartProducts'=>$cartProducts]);
            }
      public function deleteFromCart(Request $request){
              $userId=$request->session()->get('userId');
             $productId=$productId=$request->input('productId');
             DB::table('carts')->where([['user_id','=',$userId],['product_id','=',$productId]])->delete();
             $cartProducts= Cart::where('user_id','=',$request->session()->get('userId'))->get();
             $totalPrice=0;
             foreach($cartProducts as $cartProduct){
               $product=$cartProduct->product;
               $totalPrice=$totalPrice + ($cartProduct->quantity * ($product->price - $product->discount));

             }
            
             echo $totalPrice;
            }
            public function changeQuantity(Request $request){
              $userId=$request->session()->get('userId');
             $productId=$request->input('productId');
             $quantity=$request->input('quantity');
             DB::table('carts')->where([['user_id','=',$userId],['product_id','=',$productId]])->update(['quantity'=>$quantity]);
             $cartProducts= Cart::where('user_id','=',$request->session()->get('userId'))->get();
             $totalPrice=0;
             foreach($cartProducts as $cartProduct){
               $product=$cartProduct->product;
               $totalPrice=$totalPrice + ($cartProduct->quantity * ($product->price - $product->discount));
               if($product->id == $productId)
               {
                 $price=$product->price - $product->discount;
                 $quantity=$cartProduct->quantity;

               }

             }
             return [$totalPrice,$quantity * $price];
            }    
             
            
}
