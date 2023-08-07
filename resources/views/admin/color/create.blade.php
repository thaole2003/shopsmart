@extends('admin.layout.main')
@section('content-page')
    <p class=" bg-info fs-1 d-flex justify-content-center align-items-center text-white rounded" style="height: 100px">
        User Add</p>
    <form action="{{ route('colors.store') }}" method="post">
        @csrf
        @method('post')
        <div class="w-50 mx-auto border bg-light rounded h-100 p-4 mt-5">


            <div class="mb-3 mt-3">
                <label for="email" style="" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter title" name="name" value="{{old('name')}}">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="text-center p-4">
                <img src="{{ asset('color.png') }}" class="w-50 " alt="">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection

