<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\category\createCategoryRequest;
use App\Http\Requests\category\editCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Category::latest('id')->paginate(5);
        return view('admin.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(createCategoryRequest $request)
    {
        //
        // dd($request->all());
        try {
            $data = $request->all();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $folder = 'images/admin/category';
                $filePathAfterUpload = Storage::put($folder, $file);
                $filePathAfterUpload = 'storage/' . $filePathAfterUpload;
                $data['image'] = $filePathAfterUpload;
            }
            Category::create($data);
            return redirect()->route('categories.index')
                ->with('status', Response::HTTP_OK)
                ->with('msg', 'Thao tác thành công!');
        } catch (\Exception $exception) {
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
        $data = Category::FindOrFail($id);
        // dd($data);
        return view('admin.category.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(editCategoryRequest $request, string $id)
    {
        //
        // dd($request->all());
        try{
            //    dd($request->all());
                $data = Category::findOrFail($id);
                $data->fill($request->all());
                // dd($data);
                if ($request->hasFile('new_image')) {
                    // Xử lý upload file mới
                    if ($data->image) {
                        $oldFilePath = str_replace('storage/', '', $data->image); // Loại bỏ 'storage/' từ đường dẫn
                        if (Storage::exists($oldFilePath)) {
                            Storage::delete($oldFilePath);
                        }
                    }
                    $file = $request->file('new_image');
                    $folder = 'images/admin/category';
                    $filePathAfterUpload = Storage::put($folder, $file);
                    $filePathAfterUpload = 'storage/'. $filePathAfterUpload;
                    $data->image = $filePathAfterUpload;
                } else {
                    // Nếu không có file mới được chọn, giữ lại tên file cũ
                    $data->image = $request->input('current_image');
                }
                // dd($data);
                $data->save();
                return redirect()->route('categories.index')
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
    public function destroy(Category $category)
    {
        try {
            if ($category->image) {
                $oldFilePath = str_replace('storage/', '', $category->image); // Loại bỏ 'storage/' từ đường dẫn
                if (Storage::exists($oldFilePath)) {
                    Storage::delete($oldFilePath);
                }
            }
            // Xóa bản ghi trong cơ sở dữ liệu
            $category->delete();

            // Kiểm tra và xóa ảnh từ thư mục storage (nếu ảnh tồn tại)
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
