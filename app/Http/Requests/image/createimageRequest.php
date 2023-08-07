<?php

namespace App\Http\Requests\image;

use Illuminate\Foundation\Http\FormRequest;

class createimageRequest extends FormRequest
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
//        'url', 'productId',
        return [
            'productId' => 'required',
            'url'=>'required|image|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ];
    }
}
