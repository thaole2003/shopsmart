<?php

namespace App\Http\Requests\product;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class createProductRequest extends FormRequest
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
//        'name', 'sku', 'describe', 'image', 'price',
        $table = (new Product())->getTable();
        return [
            'name'=>"required|string|max:50|unique:$table,name",
            'sku'=>'required|string|max:100',
            'describe'=>'nullable|string|max:249',
            'image'=>'required|image|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'price'=>'require|Numeric|max:10000000'
        ];
    }
}
