<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Order::with('user')->paginate(5);
        return view('admin.order.index',compact('data'));
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
    }
    public function updateStatus(Request $request, $id)
    {
        try {
        $productDetail = Order::findOrFail($id);
        $productDetail->update([
            'status' => $request->status,
        ]);

        return back()
        ->with('productdetails', Response::HTTP_OK)
        ->with('msg', 'Thao tác thành công!');
    } catch (\Exception $exception) {
        Log::error('Exception', [$exception]);

        return back()
            ->with('status', Response::HTTP_BAD_REQUEST)
            ->with('msg', 'Thao tác thất bại!');
    }
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
