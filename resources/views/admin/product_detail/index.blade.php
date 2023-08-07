@extends('admin.layout.main')
@section('content-page')
<p class=" bg-info fs-1 d-flex justify-content-center align-items-center text-white rounded" style="height: 100px">
    productdetails manager</p>
<a href="{{ route('productdetails.create') }}" class="btn btn-primary my-3">Add detail product</a>
<div class="border rounded p-3 border-primary">
    <table id="example" class="table table-bordered table-striped rounded border-dark" style="width:100%">
        {{-- protected $fillable = ['name','description','price','condition','status','imgMain','categoryId']; --}}
        <thead>
        <tr class="bg-info">
            <th style="width: 20px">id</th>
            <th>product</th>
            <th>color</th>
            <th>status</th>
        </tr>
        </thead>
        <tbody>
        @if ($data->count() > 0)
        @foreach ($data as $value)
        <tr class="fs-4">
            <td class="text-center">{{ $value->id }}</td>
            <td>{{ $value->product->name }}</td>
            <td>{{ $value->color->name }}</td>
            <td>
                <form action="{{ route('productdetails.updatestatus', $value->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <select name="status" class="form-control">
                        <option value="1" {{ $value->status == 1 ? 'selected' : '' }}>Còn hàng</option>
                        <option value="0" {{ $value->status == 0 ? 'selected' : '' }}>Hết hàng</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
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
