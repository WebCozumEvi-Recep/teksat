<?php

namespace App\Http\Requests;

use App\Enums\DomainStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreDomainRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'domain' => ['required', 'string', 'max:255', 'unique:domains,domain'],
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'template_id' => ['nullable', 'integer'],
            'status' => ['required', new Enum(DomainStatus::class)],
            'tracking_code' => ['nullable', 'string'],
        ];
    }
}
