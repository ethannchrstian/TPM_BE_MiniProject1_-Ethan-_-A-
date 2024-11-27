<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function getHome(){
        $products = Product::all();
        return view('home', compact('products'));
    }
    function getCreateProductPage() {
        $categories = Category::all();
        return view('createProduct', compact('categories'));
    }

    function createProduct(Request $request) {
        $request->validate([
            "ProductName" =>['required'],
            "ProductPrice" => ['required'],
            "ProductImage" => "image",
            "CategoryId" => 'required'
        ],[
            "ProductName.required" => "Company Name is required.",
            "ProductPrice.required" => "Job Title is required.",
            "ProductImage.image" => "Product Image must be an image",
            "ProductImage.required" => "Company Image is required.", 
            "CategoryId.required" => "Category Id is required."

        ]);

        $now = now()->format('Y-m-d_H.i.s');
        $filename = $now.'_'.$request->file('ProductImage')->getClientOriginalName();
        $request->file('ProductImage')->storeAs('/public'.'/'.$filename);

        Product::create([
            "ProductName" => $request -> ProductName,
            "ProductPrice" => $request -> ProductPrice, 
            "ProductImage" => $filename,
            "CategoryId" => $request ->CategoryId
        ]);

        return redirect(route('getHome'));
    }
}
