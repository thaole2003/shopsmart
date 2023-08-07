<?php

namespace App\Http\Requests\category;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class createCategoryRequest extends FormRequest
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
//'name', 'image',
    public function rules(): array
    {
        $table = (new Category())->getTable();
        return [
            'name'=>"required|string|max:50|unique:$table,name",
            'image'=>'required|image|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ];
    }
}
