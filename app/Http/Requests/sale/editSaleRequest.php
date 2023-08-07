<?php

namespace App\Http\Requests\sale;

use App\Models\Sale;
use Illuminate\Foundation\Http\FormRequest;

class editSaleRequest extends FormRequest
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
        $table = (new Sale())->getTable();
        return [
            'productId'=>"required|string|unique:$table,productId",
            'discount'=>'required|numeric|min:0|max:100',
            'start_date'=>'required|date',
            'end_date'=>'required|date',
        ];
    }
}
