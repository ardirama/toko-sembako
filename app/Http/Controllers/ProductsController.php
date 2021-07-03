<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductsController extends Controller
{
    public function index(){
        $category = Category::all();
        $products = Product::all();

        return view('products.index', compact('category','products'));
    }

    public function insert(Request $request){
        $request->validate([
            'productCategory' => 'required',
            'productName' => 'required',
            'productStock' => 'required',
            'productPrice' => 'required'
        ]);

        $product = new Product;
        
        $product->category_id = $request->productCategory;
        $product->name = $request->productName;
        $product->stock = $request->productStock;
        $product->price = $request->productPrice;

        $product->save();

        return redirect()->back();
    }

    public function store(Request $request)
    {
        $request->validate([
            'productCategory' => 'required',
            'productName' => 'required',
            'productStock' => 'required',
            'productPrice' => 'required'
        ]);

        $product = new Product;
        $product->category_id = $request->productCategory;
        $product->name = $request->productName;
        $product->stock = $request->productStock;
        $product->price = $request->productPrice;

        $product->save();

        return redirect('products')->with('status', 'Data berhasil ditambahkan.');

    }

    public function edit(Product $product)
    {
        $category = Category::all();
        
        return view('products.edit', compact('product', 'category'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'productCategory' => 'required',
            'productName' => 'required',
            'productStock' => 'required',
            'productPrice' => 'required'
        ]);

        Product::where('id', $product->id)
        ->update([
            'category_id' => $request->productCategory,
            'name' => $request->productName,
            'stock' => $request->productStock,
            'price' => $request->productPrice,
        ]);

        return redirect('products')->with('status', 'Data berhasil diubah.');
    }

    public function delete($id){
        Product::destroy($id);

        return redirect()->back();
    }
}
