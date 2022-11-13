<?php

namespace App\Http\Requests;

use Illuminate\Support\Arr;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function validated($key = null, $default = null)
    {
        return Arr::except(parent::validated($key, $default), 'policy');
    }

    protected function prepareForValidation(): void
    {
        /*if ($this->user()) {
            // Merge data user_id|name|email|phone|organization
        }*/
    }

    public function rules(): array
    {
        return [
            'user_id'      => ['nullable', 'integer'],
            'name'         => ['required', 'string', 'max:250'],
            'email'        => ['required', 'string', 'max:250', 'email'],
            'phone'        => ['required', 'string', 'max:250'],
            'organization' => ['nullable', 'string', 'max:250'],
            'note'         => ['nullable', 'string'],
            'policy'       => ['accepted']
        ];
    }
}