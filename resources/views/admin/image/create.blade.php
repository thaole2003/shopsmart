@extends('admin.layout.main')
@section('content-page')
    <p class=" bg-info fs-1 d-flex justify-content-center align-items-center text-white rounded" style="height: 100px">
        Image Add</p>
    <form action="{{ route('images.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="w-50 mx-auto border bg-light rounded h-100 p-4 mt-5">
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Product:</label>
                <select name="productId" id="">
                    @if(count($product)>0)
                    @foreach ($product as $value )
                    <option value="{{ $value->id }}">{{ $value->name}}</option>

                    @endforeach
                    @else
                    <span>hãy thêm sản phẩm trước</span>
                    @endif
                </select>
                @error('productId')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3" >
                <label for="email" class="form-label">Avatar:</label>
                <input type="file" class="form-control"  accept="image/*" name="url" id="image-input" placeholder="Enter title" value="{{old('url')}}">
                @error('url')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 mt-3" style="text-align:center;">
                <img src="" style="width: 120px;min-height:120px;border-radius:100%" id="show-image" alt="">
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

//         function validateDates() {
//     const startDateInput = document.getElementById("start_date");
//     const endDateInput = document.getElementById("end_date");
//     const submitButton = document.querySelector("button");

//     const startDateValue = new Date(startDateInput.value);
//     const endDateValue = new Date(endDateInput.value);

//     if (endDateValue <= startDateValue) {
//         alert("End date must be greater than start date. Please choose valid dates.");
//         // Disable the submit button
//         submitButton.disabled = true;
//     } else {
//         // Enable the submit button
//         submitButton.disabled = false;
//     }
// }
    </script>
@endsection
