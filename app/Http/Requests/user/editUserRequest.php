<?php

namespace App\Http\Requests\user;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class editUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $table = (new User())->getTable();
        $id =request()->segment('2');

        return [
            'name' => [
                'required','string','max:50',
            ],
            'email'=>"required|string|max:50|unique:$table,email",
            'password'=>"required|string|max:20|min:8",
            'phone'=>"required|string|max:10|min:10|unique:$table,phone",
            'address'=>"required|string|max:199",
            'role'=>"required|string|max:20",
            'avt'=>"nullable|image|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000",
        ];
    }
}
