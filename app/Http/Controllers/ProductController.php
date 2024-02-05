<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return view("product.index",compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("product.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $FormFields = $request->validate([
            'RefPdt' => 'required|unique:products', 
            'libPdt' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric|min:0.01',
            'Qte' => 'required|integer|min:1',
            'image'=>"image|mimes:jpeg,png,jpg,gif|max:2048",
            'type' => 'required|in:Electronique,Electricite,Informatique',
        ]);
        if($request->hasFile("image")){
            $FormFields['image']=$request->file("image")->store("images","public");
        }else{
        $FormFields['image']=null;
        }

        

        Product::create($FormFields);
        return redirect()->route('product.index')->with('message', 'Product created successfully');
    }


    public function show(Product $product)
    {
        return view("product.show",compact("product"));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view("product.edit",compact("product"));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $FormFields = $request->validate([
            'libPdt' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric|min:0.01',
            'Qte' => 'required|integer|min:1',
            'image'=>"image|mimes:jpeg,png,jpg,gif|max:2048",
            'type' => 'required|in:Electronique,Electricite,Informatique',
        ]);
        if($request->hasFile("image")){
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $FormFields['image']=$request->file("image")->store('images',"public");
        }
        $product->fill($FormFields)->save();
        return redirect()->route('product.index')->with('message', 'Product updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('product.index')->with('message', 'Product deleted successfully.');
    }

}
