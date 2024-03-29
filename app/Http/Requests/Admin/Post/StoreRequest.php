<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
            'image' => 'nullable|array',
            'file' => 'nullable|array'
        ];
    }

    public function messages()
    {
        return[
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Это поле для ввода текста',
            'content.required' => 'Это поле необходимо для заполнения',
        ];
    }
}
