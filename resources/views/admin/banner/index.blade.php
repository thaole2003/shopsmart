@extends('admin.layout.main')
@section('content-page')
<p class=" bg-info fs-1 d-flex justify-content-center align-items-center text-white rounded" style="height: 100px">
    banner manager</p>
<a href="{{ route('banners.create') }}" class="btn btn-primary my-3">Add banner</a>
<div class="border rounded p-3 border-primary">
    <table id="example" class="table table-bordered table-striped rounded border-dark" style="width:100%">
        {{-- protected $fillable = ['name','description','price','condition','status','imgMain','categoryId']; --}}
        <thead>
        <tr class="bg-info">
            <th style="width: 20px">id</th>
            <th>img</th>
            <th>action</th>

        </tr>
        </thead>
        <tbody>
        @if ($data->count() > 0)
            @foreach ($data as $value)
                <tr class="fs-4">
                    <td class="text-center">{{ $value->id }}</td>
                    <td class="" style=""><img style="width: 400px;height:120px;"src={{ $value->image }} alt=""></td>
                    <td class="text-center">
                        <a class="m-2 btn btn-primary" href="{{ route('banners.edit',$value->id) }}">sửa</a>
                        <form action="{{ route('banners.destroy',$value->id) }}" method="POST" id="">
                            @csrf
                            @method('DELETE')
                            <button class="m-2 btn btn-danger" onclick="return confirm('chắc chắn xóa')">xóa
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan = 3 >Không có dữ liệu</td>

            </tr>
        @endif
        </tbody>
        <tfoot>
        </tfoot>
    </table>
    <div>
        {{ $data->links() }}
    </div>
</div>

@endsection
