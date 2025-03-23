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
        $contents = Product::all();
        $contents = Product::Paginate(6);
        return view('product', compact('contents'));
    }

    public function search(Request $request)
    {
        $products = Product::all()->KeywordSearch($request->keyword)->get();
        return view('product', compact('products'));
    }

    public function register()
    {
        $seasons = Season::all();
        return view('register', compact('seasons'));
    }

    public function store(ProductRequest $request)
    {
        $image = $request->file('image');
        $path = isset($image) ? $image->store('image', 'public') : '';
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $path,
        ]);

        return redirect('/products');
    }

    public function detail($productld)
    {
        $product = Product::find($productld);
        $seasons = Season::all();
        return view('detail', compact('product', 'seasons'));
    }

}
