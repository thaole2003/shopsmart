@extends('admin.layout.main')
@section('content-page')
    <p class=" bg-info fs-1 d-flex justify-content-center align-items-center text-white rounded" style="height: 100px">
        User Add</p>
{{--    @if ($errors->any())--}}
{{--        <div class="alert alert-danger">--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}
    {{--        protected $fillable = ['name', 'email', 'password', 'phone', 'address', 'role', 'avt',];--}}
    <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="w-50 mx-auto border bg-light rounded h-100 p-4 mt-5">
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Avatar:</label>
                <input type="file" class="form-control" accept="image/*" name="avt" id="image-input"
                       placeholder="Enter title" value="{{old('avt')}}">
                @error('avt')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 mt-3" style="text-align:center;">
                <img src="" style="width: 120px;min-height:120px;border-radius:100%" id="show-image" alt="">
            </div>
            {{--        Name--}}
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Name:</label>
                <input type="text" class="form-control" id="email" placeholder="Enter title" name="name"
                       value="{{old('name')}}">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{--            Email--}}
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter title" name="email"
                       value="{{old('email')}}">
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{--            Phone--}}
            <div class="mb-3 mt-3">
                <label for="phone" class="form-label">phone:</label>
                <input type="number" class="form-control" id="phone" placeholder="Enter title" name="phone"
                       value="{{old('phone')}}">
                @error('phone')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{--            Address--}}
            <div class="mb-3 mt-3">
                <label for="address" class="form-label">address:</label>
                <input type="text" class="form-control" id="address" placeholder="Enter title"
                       name="address" value="{{old('address')}}">
                @error('address')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{--            Password--}}
            <div class="mb-3 mt-3">
                <label for="address" class="form-label">password:</label>
                <input type="text" class="form-control" id="password" placeholder="Enter title"
                       name="password">
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{--            Role--}}
            <div class="form-group">
                <label for="">Roles</label>
                <select name="role" id="">
                    <option value="user">user</option>
                    <option value="employee">employee</option>
                    <option value="admin">admin</option>
                </select>
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
