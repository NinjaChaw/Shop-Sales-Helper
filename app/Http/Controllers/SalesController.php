<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('saler');
    }

    public function index() {

        $products = Product::all();

        return view('sales.index', compact('products'));
    }

    public function product_details($id) {

        $product = Product::find($id);

        return view('sales.details', compact('product'));
    }

    public function search() {

        $q = \request('query');

        $categories = Category::where('name', 'LIKE', '%'.$q.'%')->get();

        return view('sales.query', compact('categories', 'q'));
    }

    public function product_sold($id) {

        $product = Product::find($id);

        $product->delete();

        return redirect()->route('sale.all');
    }
}
