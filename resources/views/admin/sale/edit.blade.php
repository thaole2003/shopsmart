@extends('admin.layout.main')
@section('content-page')
    <p class=" bg-info fs-1 d-flex justify-content-center align-items-center text-white rounded" style="height: 100px">
        Sale Add</p>
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
                <input type="text" class="form-control" name="discount" value="{{ old('discount') ?? $data->discount }}"
                       placeholder="Enter title">
                @error('discount')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">current start date: {{ $data->start_date ?? 'not yet' }}</label>
                <br>
                <label for="email" class="form-label">start date:</label>
                <input type="datetime-local" class="form-control" value="{{ old('start_date') ?? $data->start_date }}"
                       name="start_date" id="start_date"
                       placeholder="Enter title">
                @error('start_date')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">current end date: {{ $data->end_date ?? 'not yet ' }}</label> <br>

                <label for="email" class="form-label">end date:</label>
                <input type="datetime-local" class="form-control" value="{{old('end_date') ?? $data->end_date }}"
                       name="end_date" id="end_date"
                       placeholder="Enter title">
                @error('end_date')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="text-center">
                <button >Submit</button>
            </div>
        </div>
    </form>
@endsection

