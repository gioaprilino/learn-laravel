<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePenggunaRequest extends FormRequest
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
            'phone'=> 'nullable|digits_between:10,13'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'=>'nama tidak diperbolehkan kosong',
            'phone.required'=>'no hp tidak boleh kosong',
            'phone.digits_between'=> 'no hp tidak boleh kurang 10 dan lebih 13'
        ];
    }
}
