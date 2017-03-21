<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name'=>'required|min:3',
            'email'=>[
                'required',
                Rule::unique('users')->ignore((is_null($this->user)?null:$this->user->id))
            ],
            'password'=>(is_null($this->user)?'required|':''),
            'role_id'=>'required|exists:roles,id',
        ];

        return $rules;
    }
}
