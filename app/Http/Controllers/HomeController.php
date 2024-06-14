<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect(){
        $usertype = Auth::user()->usertype;
        if($usertype == '1'){
            $total_product = Product::all()->count();
            $total_order = Order::all()->count();
            $total_user = User::all()->count();

            $order = Order::all();
            $total_revenue = 0;

            foreach($order as $orders){
                $total_revenue = $total_revenue + $orders->price;
            }

            $total_deliverd = Order::where('delivery_status', '=','Delivered')->get()->count();
            $total_processing = Order::where('delivery_status', '=','Processing')->get()->count();

            return view('admin.home', compact('total_product','total_order','total_user', 'total_revenue','total_deliverd','total_processing'));
        }else{
            return view('dashboard');
        }
    }

    
}
