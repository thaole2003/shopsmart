@extends('client.layout.main')

@section('content')
<h2>danh sách đơn hàng của bạn</h2>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">status</th>
        <th scope="col">total</th>
        <th scope="col">ship</th>
        <th scope="col">customer_name</th>
        <th scope="col">customer_email</th>
        <th scope="col">customer_phone</th>
        <th scope="col">customer_address</th>
        <th scope="col">note</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($data as $value)
        <tr>
            <th scope="row">{{ $value->id }}</th>
            <td>
                @if ($value->status == 0)
                    đã lên đơn hàng
                @elseif ($value->status == 1)
                    đang giao hàng
                @else
                    giao hàng thành công
                @endif
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
          </tr>
        @endforeach

    </tbody>
  </table>
@endsection
