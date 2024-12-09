<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ProductCollection;
class ProductController extends Controller
{
    function getHome(){
        $products = Product::paginate(6);
        return view('home', compact('products'));
    }
    function getCreateProductPage() {
        $categories = Category::all();
        return view('createProduct', compact('categories'));
    }

    function createProduct(Request $request) {
        $request->validate([
            // Product Name = Company Name
            // ProductPrice = Job Title
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
        $filename = $now . '_' . $request->file('ProductImage')->getClientOriginalName();
        $filePath = $request->file('ProductImage')->storeAs('ProductImage', $filename, 'public');
        // $now = now()->format('Y-m-d_H.i.s');
        // $filename = $now.'_'.$request->file('ProductImage')->getClientOriginalName();
        // $filePath = $request->file('ProductImage')->store($filename, 'public');
        // $request->file('ProductImage')->storeAs('/public'.'/'.$filename);

        Product::create([
            "ProductName" => $request -> ProductName,
            "ProductPrice" => $request -> ProductPrice, 
            "ProductImage" => $filename,
            "CategoryId" => $request ->CategoryId
        ]);

        return redirect(route('getHome'));
    }
    
    function getEditProductPage($productId){
        $product = Product::findOrFail($productId);
        $categories = Category::all();
        return view('editProduct', compact('product','categories'));
    }

    function editProduct(Request $request, $productId){
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
        
        $product = Product::findOrFail($productId);
        Storage::delete('/public'.'/'.$product->ProductImage);
        $now = now()->format('Y-m-d_H.i.s');
        $filename = $now.'_'.$request->file('ProductImage')->getClientOriginalName();
        $filePath = $request->file('ProductImage')->store($filename, 'public');
        // $request->file('ProductImage')->storeAs('/public'.'/'.$filename);

        $product->update([
            "ProductName" => $request -> ProductName,
            "ProductPrice" => $request -> ProductPrice, 
            "ProductImage" => $filename,
            "CategoryId" => $request ->CategoryId
        ]);

        return redirect(route('getHome'));

    }
    
    function deleteProduct($productId){
        $product = Product::findOrFail($productId);
        Storage::delete('/public'.'/'.$product->ProductImage);
        Product::destroy($productId);
        return redirect(route('getHome'));
    }

    function productsAPI() {
        $products = Product::all();
    //     if ($products !=null){
    //     return [
    //         'data' => $products,
    //         'message' => 'Get Jobs Success.'
    //     ];
    // }
    // else{
    //     return[
    //         'message' => 'Get Jobs Failed'
    //     ];
    // }
        return new ProductCollection($products);
    }

}

