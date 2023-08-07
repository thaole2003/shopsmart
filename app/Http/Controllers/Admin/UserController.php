<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\createUserRequest;
use App\Http\Requests\user\editUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
// use Illuminate\Validation\Rule;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::latest('id')->paginate(5);
        return view('admin.user.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(createUserRequest $request)
    {
        //
        // dd($request->all());
        try{
            $data = $request->all();
            if ($request->hasFile('avt')) {
                $file = $request->file('avt');
                $folder = 'images/admin/user';
                $filePathAfterUpload = Storage::put($folder, $file);
                $filePathAfterUpload = 'storage/' . $filePathAfterUpload;
                $data['avt'] = $filePathAfterUpload;

            }
            User::create($data);
            return redirect()->route('users.index')
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
        $data = User::FindOrFail($id);
        // dd($data);
        return view('admin.user.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(editUserRequest $request, string $id)
    {
        //
   try{
        $data = User::findOrFail($id);
        $data->fill($request->all());
        if ($request->hasFile('new_avt')) {
            $file = $request->file('new_avt');
            $folder = 'images/admin/user';
            $filePathAfterUpload = Storage::put($folder, $file);
            $filePathAfterUpload = 'storage/'. $filePathAfterUpload;
            $data->avt = $filePathAfterUpload;
        } else {
            // Nếu không có file mới được chọn, giữ lại tên file cũ
            $data->avt = $request->input('current_avt');
        }
        $data->save();
        return redirect()->route('users.index')
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
    public function destroy(User $user)
    {
        try {
            $user->delete();

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
