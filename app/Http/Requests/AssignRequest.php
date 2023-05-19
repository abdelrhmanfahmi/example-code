<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AssignRequest extends FormRequest
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
            'user_id' => ['required' , 'integer' , Rule::exists('users' , 'id')->where(function($q){
                    $q->where('department_id' ,'!=', null);
                })
            ],
            'task_id' => 'required|integer|exists:tasks,id'
        ];
    }
}
