<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Notification;

use function Termwind\render;

class OrdersController extends Controller
{
    public function cash_order(){
        $user = Auth::user();
        $userid = $user->id;

        
        $data = Cart::where('user_id','=',$userid)->get();
        $totalAmount = 0;

        // checking each item in the cart table and then creating an order for it         
        foreach($data as $data){

            $product = Product::find($data ->product_id);
            if ($product->quantity < $data->quantity){
                return redirect()->back()->with('error',"Order quantity for {$data->product_title} exceeds the available stock. The quantity left is {$product->quantity}.");
            }

            $order = new order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;

            $order->product_title = $data->product_title;
            
            $order->quantity = $data->quantity;
            $order->price = $data->price * $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status ='Cash on Delivery';
            $order->delivery_status = 'Processing';
            $order->save();

            $totalAmount += $order->price;

            // Updating the product Quantity in the database 
            $product->quantity -= $data->quantity;
            $product->save();

            // deleting the cart item from the cart table
            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }

        $transaction = new Transaction;
        $transaction->user_id = $userid;
        $transaction->order_id = $order->id; // Assuming one transaction per order
        $transaction->total_amount = $totalAmount;
        $transaction->payment_type = 'Cash on Delivery';
        $transaction->save();


        return redirect()->back()->with("message", "Order Succesful");
    }



    public function momo_order(){
        return redirect()->back()->with("message", "Sorry this Fuction have not been implemented Yet");
    }


    public function orders(){
        $order = Order::all();
        return view('admin.order')->with('orders',$order);
    }

    public function deliver($id){
        $order = Order::find($id);
        $order->delivery_status = "Delivered";
        $order->save();
        
        return redirect()->back()->with('message',"Order Have been delivied ");

    }

    public function invoice($id){
        $data = Order::find($id);
        $pdf = Pdf::loadView('admin.invoice', compact('data'));
        return $pdf->download('invoice.pdf');


    }

    public function send_mail($id){
        $data = Order::find($id);

        return view('admin.send-mail')->with('data',$data);
    }

    public function send_user_mail(Request $request, $id){
        $order_data = Order::find($id);
        $details = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline
        ];

        Notification::send($order_data, new SendEmailNotification($details));
        return redirect()->back();
    }

    public function search_order(Request $request){
        $searchItem = $request->search;

        $orders = Order::where('name','LIKE',"%$searchItem%")->orWhere('product_title','LIKE',"%$searchItem%")->orWhere('phone','LIKE',"%$searchItem%")->get();

        return view('admin.order', compact('orders'));
    }
}
