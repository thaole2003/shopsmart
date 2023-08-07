<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\image\createimageRequest;
use App\Http\Requests\image\editimageRequest;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Image::with(['product' => function($query) {
            $query->orderBy('name', 'asc'); // Sắp xếp sản phẩm theo tên (tăng dần)
        }])
        // ->latest('id')
        ->paginate(5);
        return view('admin.image.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $product = Product::all();
        return view('admin.image.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(createimageRequest $request)
    {
        //
        // dd($request->all());
        try{
            $data = $request->all();
            if ($request->hasFile('url')) {
                $file = $request->file('url');
                $folder = 'images/admin/ImageProduct';
                $filePathAfterUpload = Storage::put($folder, $file);
                $filePathAfterUpload = 'storage/' . $filePathAfterUpload;
                $data['url'] = $filePathAfterUpload;

            }
            Image::create($data);
            return redirect()->route('images.index')
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
        $data = Image::with('product')->findOrFail($id);
        return view('admin.image.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(editimageRequest $request, string $id)
    {
        //
        try{
            $data = Image::findOrFail($id);
            $data->fill($request->all());
            if ($request->hasFile('new_url')) {
                $file = $request->file('new_url');
                $folder = 'images/admin/ImageProduct';
                $filePathAfterUpload = Storage::put($folder, $file);
                $filePathAfterUpload = 'storage/'. $filePathAfterUpload;
                $data->url = $filePathAfterUpload;
            } else {
                // Nếu không có file mới được chọn, giữ lại tên file cũ
                $data->url = $request->input('current_url');
            }
            $data->save();
            return redirect()->route('images.index')
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
    public function destroy(Image $image)
    {
        //
        try {
            $image->delete();

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
