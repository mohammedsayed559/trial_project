<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'name' => 'required|string|max:255|min:3|unique:users,name',
            'email' => 'required|string|email|max:255|unique:users,email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6|same:password',
            'position'=>'required|string|min:3',
            'image'=>'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];
    }
    public function messages(): array
    {
        return [
            'name.required ' => 'Name is required',
            'name.string' => 'Name must be string',
            'name.min' => 'Name must be at least 3 characters',
            'name.max' => 'Name must be less than 255 characters',
            'name.unique' => 'Name must be unique',
            'email.required ' => 'Email is required',
            'email.string' => 'Email must be string',
            'email.email' => 'Email must be a valid email',
            'email.max' => 'Email must be less than 255 characters',
            'email.unique' => 'Email must be unique',
            'password.required ' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
            'password.confirmed' => 'Password does not match',
            'position.required ' => 'Position is required',
            'position.min' => 'Position must be at least 3 characters',
            'position.max' => 'Position must be less than 255 characters',
            'image.image' => 'Image must be an image',
            'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif',
        ];
    }
}
