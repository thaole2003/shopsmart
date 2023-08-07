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
                <select name="productId" id="">
                    @if(count($product)<1)
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
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Discount (%):</label>
                <input type="text" class="form-control" name="discount"
                       placeholder="Enter title" value="{{old('discount')}}">
                @error('discount')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">start date:</label>
                <input type="datetime-local" class="form-control" name="start_date" id="start_date"
                       placeholder="Enter title" value="{{old('start_date')}}">
                @error('start_date')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">end date:</label>
                <input type="datetime-local" class="form-control" name="end_date" id="end_date"
                       placeholder="Enter title" value="{{old('end_date')}}">
                @error('end_date')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="text-center">
                <button>Submit</button>
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
