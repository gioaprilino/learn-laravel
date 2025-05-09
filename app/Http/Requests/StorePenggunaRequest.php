<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePenggunaRequest extends FormRequest
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
            //
            'name'=> 'required|string|max:100',
            'email'=>'required|email|unique:penggunas',
            'password'=> 'required|min:6|confirmed',
            'phone'=> 'nullable|digits_between:10,13',
            'file_upload'=>'required|file|mimes:pdf,jpg,jpegpng|max:2048'
        ];
    }
    public function messages(): array{
        return [
            'name.required'=>'nama tidak diperbolehkan kosong',
            'email.required'=> 'email tidak diperbolehkan kosong',
            'email.unique'=> 'email sudah pernah digunakan',
            'password.required'=> 'password tidak diperbolehkan kosong',
            'password.confirmed'=> 'password tidak valid',
            'password.min'=> 'password tidak boleh kurang dari 6',
            'file_upload.required'=> 'file upload tidak diperbolehkan kosong',
        ];
    }
}
