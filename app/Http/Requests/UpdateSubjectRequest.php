<?php

namespace App\Http\Requests;

use App\Models\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateSubjectRequest extends FormRequest
{

    public function authorize()
    {
        $user = User::find(Auth::id());

        return $user->type === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => 'required|numeric',
            'name' => 'required|max:1000'
        ];
    }
}
