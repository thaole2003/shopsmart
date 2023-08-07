<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // dd(auth()->user()->id)
        if(auth()->user()){
        $data = Cart::with('productDetail.color', 'productDetail.product')
            ->where('userId', auth()->user()->id)
            ->get();
        $totalPrice = $data->sum(function ($item) {
            return $item->price;
        });
        // dd($data[0]->productDetail->color->name);
        // dd($data[0]->productDetail->product->image);
        return view('client.cart',compact('data','totalPrice'));
    }
    else{
        return redirect()->route('login');
    }
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
        // dd($request->all());
        try{
            if(!isset($request->userId)){
                $request->merge(['userId' => auth()->user()->id]);
                $data = $request->all();
                Cart::create($data);
                return to_route('cart.index')
                    ->with('status', Response::HTTP_OK)
                    ->with('msg', 'Thao tác thành công!');
            }else{
                return redirect()->route('login');

            }

        }catch(\Exception $exception){
            Log::error('Exception', [$exception]);
            return back()
                ->with('status', Response::HTTP_BAD_REQUEST)
                ->with('msg', 'Thao tác thất bại!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(Cart $cart)
    {
        //
        try{
           $cart->delete();
            return to_route('cart.index')
                ->with('status', Response::HTTP_OK)
                ->with('msg', 'Thao tác thành công!');
        }catch(\Exception $exception){
            Log::error('Exception', [$exception]);
            return back()
                ->with('status', Response::HTTP_BAD_REQUEST)
                ->with('msg', 'Thao tác thất bại!');
        }
    }
}
