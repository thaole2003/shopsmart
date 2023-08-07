@extends('admin.layout.main')
@section('content-page')
<p class=" bg-info fs-1 d-flex justify-content-center align-items-center text-white rounded" style="height: 100px">
    Bill manager</p>
<div class="border rounded p-3 border-primary">
    <table id="example" class="table table-bordered table-striped rounded border-dark" style="width:100%">
        {{-- protected $fillable = ['name','description','price','condition','status','imgMain','categoryId']; --}}
        <thead>
        <tr class="bg-info">
            <th style="width: 20px">id</th>
            <th>status</th>
            <th>total</th>
            <th>ship</th>
            <th>customer_name</th>
            <th>customer_email</th>
            <th>customer_phone</th>
            <th>customer_address</th>
            <th>note</th>
            <th>người đặt</th>
        </tr>
        </thead>
        <tbody>
        @if ($data->count() > 0)
        @foreach ($data as $value)
        <tr>
            <th scope="row">{{ $value->id }}</th>
            <td>
                <form action="{{ route('order.updatestatus', $value->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <select name="status" class="form-control">
                        <option value="0" {{ $value->status == 0 ? 'selected' : '' }}>Đã lên đơn hàng</option>
                        <option value="1" {{ $value->status == 1 ? 'selected' : '' }}>Đang vận chuyển</option>
                        <option value="2" {{ $value->status == 2 ? 'selected' : '' }}>Giao thành công</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </td>
            <td> ${{ $value->total }}</td>
            <td>
                @if ($value->ship == 0)
                Thanh toán khi nhận hàng
            @elseif ($value->ship == 1)
                Thanh toán qua ví

            @endif
            </td>
            <td>{{ $value->customer_name }}</td>
            <td>{{ $value->customer_email }}</td>
            <td>{{ $value->customer_phone }}</td>
            <td>{{ $value->customer_address }}</td>
            <td>{{ $value->note }}</td>
            <td>{{ $value->user->name }}</td>
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
