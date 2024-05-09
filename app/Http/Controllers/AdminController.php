<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function add_category(){
        return view('admin.category');
    }

    public function add_category_item(Request $request){
        $request->validate([
            'name' => 'required',
            'category_slug' => 'required',
            
        ]);

        $data = new category;
        $data->name = $request->name;
        $data->category_slug = $request->category_slug;
        $data->save();
        return redirect()->back()->with('message','Category Wass Added Succesfuly');

    }

    public function show_category_item(){
        $data = Category::all();

        return view('admin.showcategory', compact('data'));
    }

    public function delete_category($id){
        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('message','Item was deleted ');

    }

    //Checking for Cart Items
    public function create_orders(){
        if (Auth::id()){
            $id =Auth::user()->id;
            $cart = cart::where('user_id', '=', $id)->get();
           
            $products = Product::all();
            return view('admin.order_create', compact('products', 'cart'));
        }
        

    }


    //Deleting Cart items
    public function remove_cart($id){
        $cart = Cart::find($id);
        if(!$cart){
            return redirect()->back()->with("error", "Item not found in the cart");
        }
        $cart->delete();
        return redirect()->back()->with("message", "Item was deleted successfully");
    }
    


    public function addItem(Request $request){

        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required|numeric|min:1',
        ]);

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $product = Product::find($productId);
        
        if(!$product){
            return redirect()->back()->with('error','Product Not found');
        }

        if($product->quantity < $quantity){
            return redirect()->back()->with('error','Only ' . $product->quantity .' quantities are available ');
        }

        $productData = [
            'product_id' => $product->id,
            'name' => $product->name,
            'image' => $product->image,
            'price' => $product->price,
            'quantity' => $quantity,
        ];

        if (!in_array($product->id, Session::get('productItemsId', []))) {
            Session::push('productItemsId', $product->id);
            Session::push('productItems', $productData);
        } else {
            $productItems = Session::get('productItems', []);
            foreach ($productItems as $key => $prodSessionItem) {
                if ($prodSessionItem['product_id'] == $product->id) {
                    $newQuantity = $prodSessionItem['quantity'] + $quantity;
                    $productData['quantity'] = $newQuantity;
                    Session::put("productItems.$key", $productData);
                }
            }
        }
        return redirect()->back()->with('message','Item was Added '. $product->name);

    }


}
