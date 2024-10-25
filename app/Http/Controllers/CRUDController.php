<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CRUDController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }



    public function Form()
    {
        return view('create');
    }






    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'Product_Image' => 'required|mimes:jpg,png',
        ]);

        $pro = new Product();
        $pro->name = $request->name;
        $pro->description = $request->description;
        $pro->quantity = $request->quantity;
        $pro->price = $request->price;
        $imagename = time() . '.' . $request->Product_Image->extension();
        $request->Product_Image->move(public_path('ProductImages'), $imagename);
        $pro->Product_Image = $imagename;
        $pro->save();
        return redirect()->route('index');
    }


    public function edit($id)
    {
        $product = Product::find($id);

        return view('edit', compact('product'));
    }


    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->description = $request->description;


        $product->save();
        return redirect()->route('index')
            ->withSuccess('Product is deleted successfully.');
    }






    public function delete($id)
    {
        $product = Product::find($id);

        $product->delete();
        return redirect()->route('index')
            ->withSuccess('Product is deleted successfully.');
    }
}
