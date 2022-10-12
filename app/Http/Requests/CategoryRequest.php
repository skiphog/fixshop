<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return void
     */
    protected function prepareForValidation(): void
    {
    }

    public function validated($key = null, $default = null)
    {
        return array_merge(
            parent::validated($key, $default),
            Category::makeData((int)$this['parent_id'], $this['code'])
        );
    }

    public function rules(): array
    {
        $exists = 0 === (int)$this['parent_id'] ? [] : [Rule::exists('categories', 'id')];

        return [
            'parent_id'   => ['required', 'integer', 'min:0', ...$exists],
            'code'        => [
                'required',
                'string',
                'min:3',
                'max:250',
                Rule::unique('categories')->ignore($this->route('category'))
            ],
            'title'       => ['required', 'string', 'min:3', 'max:250'],
            'nav'         => ['required', 'string', 'min:3', 'max:250'],
            'standard'    => ['nullable', 'string', 'max:250'],
            'extra'       => ['nullable', 'string', 'max:250'],
            'img'         => ['nullable', 'string', 'max:250'],
            'description' => ['required', 'string', 'min:3', 'max:250'],
            'content'     => ['required', 'string', 'min:3'],
        ];
    }
}