<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function show_cart(){
        if (Auth::id()){
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();
    
            // Calculate total price
            $totalPrice = $cart->sum(function ($item) {
                return $item->price * $item->quantity;
            });
    
            return view('order_create',[
                'cart' => $cart,
                'totalPrice' => $totalPrice,
            ]);
        }
    }
    

    public function updateCart(Request $request)
    {
        $productId = $request->input('productId');
        $quantity = $request->input('quantity');

        // Update the cart in the database
        $cartItem = Cart::where('product_id', $productId)->first();
        if ($cartItem) {
            $cartItem->quantity = $quantity;
            $cartItem->save();
        }
        
        // Fetch the updated cart data
        $updatedCart = Cart::all();

        // Calculate total quantities and total price
        $totalQuantities = $updatedCart->sum('quantity');
        $totalPrice = $updatedCart->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        

        return response()->json([
            'success' => true,
            'cart' => $updatedCart,
            'totalQuantities' => $totalQuantities,
            'totalPrice' => number_format($totalPrice, 2)
        ]);
    }

    public function showCart()
{
    // Fetch cart data
    $cart = Cart::all();

    // Calculate total price
    $totalPrice = $cart->sum(function ($item) {
        return $item->price * $item->quantity;
    });

    return view('your_view_name', [
        'cart' => $cart,
        'totalPrice' => $totalPrice, // Pass $totalPrice to the view
    ]);
}


    public function add_to_cart(Request $request, $id){
        if (Auth::id()){
            $user = Auth::user();
            $product = product::find($id);
            
            if (!$product) {
                // Handle the case where the product doesn't exist
                return redirect()->back()->withErrors('Product not found.');
            }

            // Check if the product already exists in the user's cart
            $cart = Cart::where('user_id', $user->id)
                        ->where('product_id', $product->id)
                        ->first();
            
            if ($cart) {
                // If the product is already in the cart, update the quantity
                $cart->quantity += $request->quantity;
            } else {
                // If the product is not in the cart, create a new cart item
                $cart = new Cart;
                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->user_id = $user->id;
                $cart->address = $user->address;
                $cart->product_title = $product->name;
                $cart->price = ($product->discount_price != null) ? 
                                $product->discount_price : 
                                $product->price;

                $cart->image = $product->image;
                $cart->product_id = $product->id;
                $cart->quantity = $request->quantity;
            }

            $cart->save();
            return redirect()->back()->with("message","Product have been added to cart");
        }else{
            return redirect('/login');
        }

    }
}
