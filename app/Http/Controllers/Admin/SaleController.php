<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\sale\createSaleRequest;
use App\Http\Requests\sale\editSaleRequest;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Sale::with('product')->latest('id')->paginate(5);
        // dd($data);
        return view('admin.sale.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $product = Product::all();
        return view('admin.sale.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(createSaleRequest $request)
    {
        //
        try{
            $model = new Sale();

            $model->fill($request->all());

            $model->save();

            return redirect()->route('sales.index')
                ->with('status', Response::HTTP_OK)
                ->with('msg', 'Thao tác thành công!');
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
        $data = Sale::with('product')->latest('id')->findOrFail($id);
        return view('admin.sale.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(editSaleRequest $request, string $id)
    {
        //
        try{
        $data= Sale::findOrFail($id);
        $data->fill($request->all());
        $data->save();
        return redirect()->route('sales.index')
        ->with('status', Response::HTTP_OK)
        ->with('msg', 'Thao tác thành công!');
        }catch(\Exception $exception){
            Log::error('Exception', [$exception]);
            return back()
                ->with('status', Response::HTTP_BAD_REQUEST)
                ->with('msg', 'Thao tác thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
        try {
            $sale->delete();

            return back()
                ->with('status', Response::HTTP_OK)
                ->with('msg', 'Thao tác thành công!');
        } catch (\Exception $exception) {
            Log::error('Exception', [$exception]);

            return back()
                ->with('status', Response::HTTP_BAD_REQUEST)
                ->with('msg', 'Thao tác thất bại!');
        }
    }
}
