<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


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
}
