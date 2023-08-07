@extends('admin.layout.main')
@section('content-page')
    <p class=" bg-info fs-1 d-flex justify-content-center align-items-center text-white rounded" style="height: 100px">
        edit Add</p>
    <form action="{{ route('images.update',$data->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="w-50 mx-auto border bg-light rounded h-100 p-4 mt-5">
            <div class="mb-3 mt-3">
                <input type="text" name="productId" value="{{ $data->productId }}" hidden>
                <label for="email" class="form-label">Product:</label>
                <span>{{ $data->product->name }}</span>
                @error('productId')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3" >
                <label for="email" class="form-label">Avatar:</label>
                <input type="file" class="form-control" value  accept="image/*" name="new_url" id="image-input" placeholder="Enter title" >
                <input type="text" class="form-control" value={{ $data->url }} hidden  name="current_url" id="image-input" placeholder="Enter title" >
            </div>
            <div class="mb-3 mt-3" style="text-align:center;">
                <img src={{ $data->url }} style="width: 120px;min-height:120px;border-radius:100%" id="show-image" alt="">
            </div>

            <div class="text-center">
                <button >Submit</button>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script>
        $(() => {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#show-image').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#image-input").change(function() {
                readURL(this);
            });



        });
    </script>
@endsection
