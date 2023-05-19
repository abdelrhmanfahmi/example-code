<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEmployeeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|min:2|max:50|string',
            'last_name' => 'required|min:2|max:50|string',
            'email' => 'required|min:3|max:100|email|unique:users,email',
            'password' => 'required|min:8|max:30',
            'salary' => 'required|numeric',
            'image' => 'required|mimes:png,jpg,jpeg,svg',
            'department_id' => 'required|integer|exists:departments,id',
            'manager_id' => ['required' , 'integer' , Rule::exists('users' , 'id')->where(function($q){
                    $q->where('department_id' , null);
                })
            ]
        ];
    }
}
