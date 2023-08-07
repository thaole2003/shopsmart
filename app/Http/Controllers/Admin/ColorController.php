<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\color\createColorRequest;
use App\Http\Requests\color\editColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Color::latest('id')->paginate(5);
        return view('admin.color.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.color.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(createColorRequest $request)
    {
        //
        try{
            $data = $request->all();
            Color::create($data);
            return redirect()->route('colors.index')
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
        $data= Color::FindOrFail($id);
        return view('admin.color.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(editColorRequest $request, string $id)
    {
        //
        try{
            $data = Color::findOrFail($id);
            $data->fill($request->all());
            $data->save();
            return redirect()->route('colors.index')
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        //
        try {
            $color->delete();

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
