<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Season;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::Paginate(6);
        return view('index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        $seasons = Season::all();
        $product_seasons = $product->seasons()->get();
        return view('show', compact('product', 'seasons', 'product_seasons'));
    }

    public function update(Request $request)
    {
        if ($request->has('back')) {
            return redirect('/products');
        }
        $product = Product::find($request->id);
        $form = $request->only(['name', 'price', 'image', 'description']);
        $seasons = $request->only(['season']);
        $product->update($form);
        $product->seasons()->sync($seasons['season']);
        return redirect('/products');
    }
}
