<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Echo_;

class ProductController extends Controller
{
    public function create_view(){

        $categories = Category::all();
        return view('create_view', compact('categories'));
    }

    public function add_product(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|integer',
            'stock'       => 'required|integer',
            'description' => 'required|string',
            'image'       => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $image = 'img-'.time().'.'.$request->image->extension();
        $request->image->move(public_path('gambar'), $image);

        Product::create([
            'name'        => $request->name,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'description' => $request->description,
            'image'       => $image,
            'category_id' => $request->category_id,
        ]);

        return Redirect::route('all_product');
    }


    public function all_product(){
        $products = Product::with('category')->get();
        return view('all_product', compact('products'));
    }



    public function edit_view($id){
        $categories = Category::all();
        $products = Product::where('id', '=', $id)->first();
        return view('edit_view', compact('products', 'categories'));

    }

    public function edit_data(Request $request, $id)
    {

        $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|integer',
            'stock'       => 'required|integer',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product = Product::findOrFail($id);


        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $filePath = public_path('gambar/' . $product->image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            $image = 'img-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('gambar'), $image);
            $product->image = $image;
        }


        $product->name        = $request->name;
        $product->price       = $request->price;
        $product->stock       = $request->stock;
        $product->description = $request->description;
        $product->category_id = $request->category_id;

        $product->save();

        return Redirect::route('all_product')->with('success', 'Produk berhasil diperbarui!');
    }




    public function delete_product($id){
        Product::where('id', '=', $id)->delete();
        return Redirect::route('all_product');

    }
}
