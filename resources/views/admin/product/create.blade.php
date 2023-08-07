@extends('admin.layout.main')
@section('content-page')
<p class=" bg-info fs-1 d-flex justify-content-center align-items-center text-white rounded" style="height: 100px">
    User Add</p>
<form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('post')
    <div class="w-50 container-fluid  mx-auto border bg-light   p-4 mt-5">
            <div class="col-xs-8">
                <div class="mb-3 mt-3" >
                    <label for="email" class="form-label">Main image:</label>
                    <input type="file" class="form-control"  accept="image/*" name="image" id="image-input" placeholder="" value="{{old('image')}}">
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 mt-3" style="text-align:center;">
                    <img src="" style="max-height:100px; width:100px;border-radius:100%" id="show-image" alt="">
                </div>

                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Sku:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter title" name="sku" value="{{old('sku')}}">
                    @error('sku')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter title" name="name" value="{{old('name')}}">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Price:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter title" name="price" value="{{old('price')}}">
                    @error('price')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Describe:</label>
                    <textarea  class="form-control" name="describe" value="{{old('describe')}}"></textarea>
                    @error('productId')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Images's Product:</label>
                    <input type="file" class="form-control" id="email" placeholder="Enter title" name="images[]" multiple>
                </div>
                <div class="form-group">
                    <label for="">Colors : </label><br>
                    @if(count($color)>0)
                    @foreach ($color as $key =>$value )
                    <input style="padding-bottom: 4px" type="checkbox"  name="colors[]" value="{{ $value->id }}" id=""> <span style="background-color: {{ $value->name }};padding:3px;border-radius:5px">{{ $value->name }} </span><br>

                    @endforeach
                    @else
                    <span>let add category!</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Category : </label><br>
                    @if(count($category)>0)
                    @foreach ($category as $key =>$value )
                    <input type="checkbox" name="categorys[]" value="{{ $value->id }}" id=""> {{ $value->name }} <br>

                    @endforeach
                    @else
                    <span>let add category!</span>
                    @endif
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
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
