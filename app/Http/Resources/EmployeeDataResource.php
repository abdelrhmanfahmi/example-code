<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TaskResource;

class EmployeeDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'full_name' => $this->first_name . ' ' . $this->last_name,
            'email' => $this->email,
            'salary' => $this->salary,
            'department' => $this->whenLoaded('department')->name,
            'tasks' => $this->whenLoaded('tasks'),
        ];
    }
}
