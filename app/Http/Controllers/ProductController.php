<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with('category')->get();
        
        return view('products.index')->with('products', $product);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
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
        $validate = request()->validate([
            'name' => 'required',
            'price' => 'required|float',
            'quantity' => 'required|integer',
            'category_id' => 'required',
            'image' => 'unique'
        ]);

        $data = Product::find($id);
        $data->update($validate);

        return redirect('products')->with('message','Produate Table have been Updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete_product($id)
    {
        $data = Product::find($id);
        $data->delete();

        return redirect()->back()->with('message', 'Product was deleted');
    }

    public function add_product(){
        $category = Category::all();
        return view('products.create')->with('category', $category);
    }

    public function create_product(Request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category_id' => 'required',
             // validating the image
        ]);

        $data = $request->only(['name', 'price', 'description', 'quantity', 'category_id']);

        if ($request->hasFile('image')) {

            
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $data['image'] = $imageName;
        }

        Product::create($data);

        return redirect()->back()->with('message','Product was added succesfuly');
    }

    public function update_product(Request $request, $id){
        $data = Product::with('category')->find($id);
    
        $category = Category::all();
        if (!$data) {
            // Handle the case where the product is not found
            return abort(404); // or redirect, show an error, etc.
        }
        
    
        return view('products.show', compact('data', 'category'));
    }
    
}
