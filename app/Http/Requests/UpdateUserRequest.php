<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'id' => 'required|numeric',
            'name' => ['required', Rule::unique('users')->ignore($request->id)],
            'email' =>  ['required', Rule::unique('users')->ignore($request->id)],
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'section_id' => 'required|numeric'
        ];
    }
}
