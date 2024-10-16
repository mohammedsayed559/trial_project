<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255|min:3',
            'description' => 'required|max:1000|min:20',
            'user_id' => 'required|integer|exists:users,id'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Title is required',
            'title.min' => 'Title must be at least 3 characters',
            'title.max' => 'Title must be less than 255 characters',
            'description.required' => 'Description is required',
            'description.min' => 'Description must be at least 20 characters',
            'description.max' => 'Description must be less than 1000 characters',
            'user_id.required' => 'Username is required',
            'user_id.exists' => 'Username does not exist'

        ];
    }


}
