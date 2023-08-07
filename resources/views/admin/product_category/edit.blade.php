@extends('admin.layout.main')
@section('content-page')
    <p class=" bg-info fs-1 d-flex justify-content-center align-items-center text-white rounded" style="height: 100px">
        Sale Add</p>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        {{-- protected $fillable = ['name','description','price','condition','status','imgMain','categoryId']; --}}
    @endif
    <form action="{{ route('sales.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="w-50 mx-auto border bg-light rounded h-100 p-4 mt-5">
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Product:</label>
                <input type="text" class="form-control" name="productId"
                placeholder="Enter title" value="{{ $data->product->id }}" hidden>
                <span>{{ $data->product->name }}</span>
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Discount (%):</label>
                <input type="text" class="form-control" name="discount" value="{{ $data->discount }}"
                    placeholder="Enter title">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">current start date: {{ $data->start_date??'not yet' }}</label> <br>
                <label for="email" class="form-label">start date:</label>
                <input  type="datetime-local" class="form-control" value="{{ $data->start_date }}" name="start_date" id="start_date"
                    placeholder="Enter title">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">current end date: {{ $data->end_date??'not yet ' }}</label> <br>

                <label for="email" class="form-label">end date:</label>
                <input  type="datetime-local" class="form-control" value="{{ $data->end_date }}" name="end_date" id="end_date"
                    placeholder="Enter title">
            </div>

            <div class="text-center">
                <button >Submit</button>
            </div>
        </div>
    </form>
@endsection

