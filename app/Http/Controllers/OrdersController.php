<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Cart;
use App\Models\Product;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Notification;

use function Termwind\render;

class OrdersController extends Controller
{
    public function cash_order($user_id = null)
    {
        if ($user_id) {
            // If a user ID is provided, find that user
            $user = User::find($user_id);

            // If the user does not exist, redirect with an error
            if (!$user) {
                return redirect()->back()->with('error', 'User not found.');
            }
        } else {
            // If no user ID is provided, use the authenticated user
            if (Auth::check()) {
                $user = Auth::user();
            } else {
                // If the user is not authenticated and no user ID is provided, redirect to login
                return redirect('/login')->with('error', 'You must be logged in to place an order.');
            }
        }

        $userid = $user->id;
        $data = Cart::where('user_id', $userid)->get();
        $totalAmount = 0;
        $order = null; // Initialize $order variable

        foreach ($data as $item) {
            $product = Product::find($item->product_id);
            if ($product->quantity < $item->quantity) {
                return redirect()->back()->with('error', "Order quantity for {$item->product_title} exceeds the available stock. The quantity left is {$product->quantity}.");
            }

            $order = new Order;
            $order->name = $item->name;
            $order->email = $item->email;
            $order->phone = $item->phone;
            $order->address = $item->address;
            $order->user_id = $item->user_id;
            $order->product_title = $item->product_title;
            $order->quantity = $item->quantity;
            $order->price = $item->price * $item->quantity;
            $order->image = $item->image;
            $order->product_id = $item->product_id;
            $order->payment_status = 'Cash on Delivery';
            $order->delivery_status = 'Processing';
            $order->save();

            $totalAmount += $order->price;

            // Updating the product quantity in the database
            $product->quantity -= $item->quantity;
            $product->save();

            // Deleting the cart item from the cart table
            $cart = Cart::find($item->id);
            $cart->delete();
        }

        // Check if $order was created before trying to use it
        if ($order) {
            $transaction = new Transaction;
            $transaction->user_id = $userid;
            $transaction->order_id = $order->id; // Use $order->id only if $order is defined
            $transaction->total_amount = $totalAmount;
            $transaction->payment_type = 'Cash on Delivery';
            $transaction->save();

            return redirect()->back()->with('message', 'Order Successful');
        } else {
            return redirect()->back()->with('error', 'No items found in cart to create an order.');
        }
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
