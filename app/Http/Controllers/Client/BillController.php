<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyTestMail;
class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        if(auth()->user()){
            $data = Cart::with('productDetail.color', 'productDetail.product')
            ->where('userId', auth()->user()->id)
            ->get();
            $totalPrice = $data->sum(function ($item) {
            return $item->price;
        });
            $User = User::findOrFail(auth()->user()->id);
            return view('client.checkout',compact('data','totalPrice','data','User'));
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

        $details = Cart::where('userId', auth()->user()->id)->get();
        // dd($details[0]->detailId);
        $model = new Order();

        $model->fill($request->all());

        $model->save();


        foreach($details as $value){
                $modell = new OrderDetails();
                $modell->detailId = $value->detailId;
                $modell->orderId = $model->id;
                $modell->save();
                $cartItem = Cart::find($value->id);
                $cartItem->delete();
        }
        // Mail::to($model->customer_email)->send(new MyTestMail());
        return to_route('cart.index')
            ->with('status', Response::HTTP_OK)
            ->with('msg', 'Thao tác thành công!');



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
    public function destroy(string $id)
    {
        //
    }
}
