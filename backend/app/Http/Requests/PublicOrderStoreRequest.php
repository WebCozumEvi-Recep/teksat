<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicOrderStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'city' => ['required', 'string', 'max:255'],
            'district' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'quantity' => ['required', 'integer', 'min:1'],
            'domain' => ['required', 'string'],
            'product_id' => ['required', 'integer', 'exists:products,id'],
        ];
    }
}
