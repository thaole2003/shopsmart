<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $category = Category::withCount('products')
    ->having('products_count', '>', 0)
    ->paginate(5);
        $products = Product::whereHas('details', function ($query) {
            $query->where('status', 1);
        })
        ->whereHas('sale')
        ->with('details', 'categories', 'images','sale')
        ->get();
        $banner = Banner::orderBy('created_at', 'desc')->paginate(3);
        return view('client.index',compact('category','products','banner'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // dd(auth()->user()->id);
        $product = Product::whereHas('details', function ($query) {
            $query->where('status', 1);
        })
        ->whereHas('sale')
        ->with('details.color', 'categories', 'images','sale')
        ->findOrFail($id);
        return view('client.detail',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
