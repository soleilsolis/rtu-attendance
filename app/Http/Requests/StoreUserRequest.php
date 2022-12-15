<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->type == 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' =>  'required|unique:users',
            'email' =>  'required|email:rfc,dns',
            'password' => 'required|min:8',
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'section_id' => 'required|numeric'
        ];
    }
}
