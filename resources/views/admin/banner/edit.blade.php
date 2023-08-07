@extends('admin.layout.main')
@section('content-page')
    <p class=" bg-info fs-1 d-flex justify-content-center align-items-center text-white rounded" style="height: 100px">
        Banner Edit</p>
    <form action="{{ route('banners.update',$data->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="w-50 mx-auto border bg-light rounded h-100 p-4 mt-5">
            <div class="mb-3 mt-3" style="text-align:center;">
                <label for="email" class="form-label">Avatar:</label>
                <img src={{ asset($data->image) }} style="width: 120px;max-height:120px;border-radius:100%"
                id="show-image" alt="">
            </div>
            <input type="text" name="current_image" value="{{ $data->image }}" hidden>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Add new image:</label>
                <input type="file" class="form-control" accept="image/*" name="new_image" id="image-input"
                       placeholder="Enter title" value="{{old('new_image')}}">
                @error('new_image')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
@section('script')

    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
    <script>
        $(() => {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#show-image').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#image-input").change(function () {
                readURL(this);
            });


        });
    </script>
@endsection
