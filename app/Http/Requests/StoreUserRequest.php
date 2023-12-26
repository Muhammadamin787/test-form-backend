<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return true;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:users',
            'sector_id' => 'required',
            'is_agreed' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'name is required!',
            'sector_id.required' => 'secotr is required!',
            'is_agreed.required' => 'is_agreed is required!',
        ];
    }
}
