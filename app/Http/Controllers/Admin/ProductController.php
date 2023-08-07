<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\product\createProductRequest;
use App\Http\Requests\product\editProductRequest;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Product::latest('id')->paginate(5);
        return view('admin.product.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category = Category::all();
        $color = Color::all();
        return view('admin.product.create',compact('category','color'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
            $product = new Product();
            $product->fill($request->all()
            );
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $folder = 'images/admin/product';
                $filePathAfterUpload = Storage::put($folder, $file);
                $filePathAfterUpload = 'storage/' . $filePathAfterUpload;
                $product->image = $filePathAfterUpload;
            }
                $product->save();
                $id = $product->id;
                if(count($request->file('images'))>0){
                    foreach ($request->file('images') as $key => $image) {
                        $folder = 'images/admin/ImageProduct';
                        $filePathAfterUpload = Storage::put($folder, $image);
                        $filePathAfterUpload = 'storage/' . $filePathAfterUpload;
                        $imageModel = new Image();
                        $imageModel->productId = $id;
                        $imageModel->url = $filePathAfterUpload;
                        $imageModel->save();
                    }
                }
                if(count($request->input('categorys'))>0){
                    foreach ($request->input('categorys') as $key => $idCatetegory) {
                        $CateProModel = new CategoryProduct();
                        $CateProModel->categoryId = $idCatetegory;
                        $CateProModel->productId = $id;
                        $CateProModel->save();
                    }
                }
                if(count($request->input('colors'))>0){
                    foreach ($request->input('colors') as $key => $idColor) {
                        $CateProModel = new ProductDetail();
                        $CateProModel->colorId = $idColor;
                        $CateProModel->productId = $id;
                        $CateProModel->save();
                    }
                }
                return redirect()->route('products.index')
                    ->with('status', Response::HTTP_OK)
                    ->with('msg', 'Thêm sản phẩm thành công!');

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
    public function update(editProductRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        try{
            $product->delete();
            return to_route('products.index')
            ->with('status', Response::HTTP_OK)
            ->with('msg', 'Thao tác thành công!');
        }
        catch(\Exception $exception){
            Log::error('Exception', [$exception]);

            return back()
                ->with('status', Response::HTTP_BAD_REQUEST)
                ->with('msg', 'Thao tác thất bại!');
        }
    }
}
