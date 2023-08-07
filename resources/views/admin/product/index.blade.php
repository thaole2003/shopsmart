@extends('admin.layout.main')
@section('content-page')
<p class=" bg-info fs-1 d-flex justify-content-center align-items-center text-white rounded" style="height: 100px">
    Product manager</p>
<a href="{{ route('products.create') }}" class="btn btn-primary my-3">Add Product</a>
<div class="border rounded p-3 border-primary">
    <table id="example" class="table table-bordered table-striped rounded border-dark" style="width:100%">
        {{-- protected $fillable = ['name','description','price','condition','status','imgMain','categoryId']; --}}
        <thead>
        <tr class="bg-info">
            <th style="width: 20px">id</th>
            <th>name</th>
            <th>sku</th>
            <th>image</th>
            <th>price</th>
            <th>describe</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>
        @if ($data->count() > 0)
            @foreach ($data as $value)
                <tr class="fs-4">
                    <td class="text-center">{{ $value->id }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->sku }}</td>
                    <td class="" style=""><img style="width: 120px;height:120px;border-radius:100%" src="{{ $value->image }}" alt=""></td>
                    <td>{{ $value->price }}</td>

                    <td>{{ $value->describe }}</td>

                    <td class="text-center">
                        <a class="m-2 btn btn-primary" href="{{ route('products.edit',$value->id) }}">sửa</a>
                        <form action="{{ route('products.destroy',$value->id) }}" method="POST" id="">
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
                <td colspan=6>Không có dữ liệu</td>

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
