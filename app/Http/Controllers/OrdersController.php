<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function cash_order(){
        $user = Auth::user();
        $userid = $user->id;

        
        $data = Cart::where('user_id','=',$userid)->get();

        // checking each item in the cart table and then creating an order for it         
        foreach($data as $data){
            $order = new order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;

            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status ='Cash on Delivery';
            $order->delivery_status = 'Processing';
            $order->save();

            // deleting the cart item from the cart table
            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }

        return redirect()->back()->with("message", "Order Succesful");
    }



    public function momo_order(){
        return redirect()->back()->with("message", "Sorry this Fuction have not been implemented Yet");
    }
}
