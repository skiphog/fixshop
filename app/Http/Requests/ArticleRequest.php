<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
     * Вызывается до валидации
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this['slug'] = str($this['slug'] ?? '')->slug();
    }

    /**
     * Добавить custom fields после валидации
     */
    public function validated($key = null, $default = null)
    {
        return array_merge(parent::validated($key, $default), [
            'time_to_read' => time_to_read($this['content'])
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {

        return [
            'slug'    => [
                'required',
                'string',
                'max:250',
                Rule::unique('articles')->ignore($this->route('article'))
            ],
            'rubric_id' => ['required', 'integer', 'exists:rubrics,id'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'title'   => ['required', 'string', 'min:3', 'max:250'],
            'content' => ['required', 'string'],
        ];
    }
}
