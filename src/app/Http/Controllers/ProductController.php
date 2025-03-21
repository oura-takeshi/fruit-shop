<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Season;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::Paginate(6);
        $input = null;
        return view('index', compact('input', 'products'));
    }

    public function search(Request $request)
    {
        $products = Product::where('name', 'LIKE', "%{$request->input}%")->paginate(6);
        $input = $request->input;
        return view('index', compact('input', 'products'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect('/products');
        }
        $seasons = Season::all();
        $product_seasons = $product->seasons()->get();
        return view('show', compact('product', 'seasons', 'product_seasons'));
    }

    public function update(ProductRequest $request)
    {
        $product = Product::find($request->id);
        $form = $request->only(['name', 'price', 'image', 'description']);
        $seasons = $request->only(['season']);
        $product->update($form);
        $product->seasons()->sync($seasons['season']);
        return redirect('/products');
    }

    public function delete(Request $request)
    {
        Product::find($request->id)->delete();
        return redirect('/products');
    }
}
