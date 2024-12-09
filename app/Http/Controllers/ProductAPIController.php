<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductAPIController extends Controller
{
    function getProducts(){
        $products = Product::all();
        return response()->json([
            'data' => $products
        ]);
    }

    function createProduct(Request $request) {
       $validated = $request->validate([

            //Product Name = Company Name
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
       

        Product::create([
            "ProductName" => $request -> ProductName,
            "ProductPrice" => $request -> ProductPrice, 
            "ProductImage" => $filename,
            "CategoryId" => $request ->CategoryId
        ]);

        return response('New Job Listing Created Successfully.', 201);
    }

    function updateProduct(Request $request, $productId){
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
        $filename = $now . '_' . $request->file('ProductImage')->getClientOriginalName();
        $filePath = $request->file('ProductImage')->storeAs('ProductImage', $filename, 'public');
        // $request->file('ProductImage')->storeAs('/public'.'/'.$filename);

        $product->update([
            "ProductName" => $request -> ProductName,
            "ProductPrice" => $request -> ProductPrice, 
            "ProductImage" => $filename,
            "CategoryId" => $request ->CategoryId
        ]);

        return response('New Job Listing Updated Successfully.', 201);

    }

    function deleteProduct($productId){
        $product = Product::findOrFail($productId);
        Storage::delete('/public'.'/'.$product->ProductImage);
        Product::destroy($productId);
        return response('Job Listing '.$productId.' Deleted Successfully.', 201);
    }
}
