<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RubricRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        // fuck
        return [
            'slug'    => [
                'required',
                'string',
                'max:250',
                Rule::unique('rubrics')->ignore($this->route('rubric'))
            ],

            'title'   => ['required', 'string', 'min:3', 'max:250'],
            'content' => ['required', 'string'],
            'sort'    => ['integer']
        ];
    }
}
