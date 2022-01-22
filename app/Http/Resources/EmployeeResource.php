<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;


class EmployeeResource extends ResourceCollection
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
            // "id" => $this->id,
            // "code" => $this->code,
            // "join_date" => $this->join_date,
            // "name" => $this->name,
            // "email" => $this->email,
            // "department_id" => $this->deparment_id,
            // "is_manager" => $this->is_manager,
            // "address" => $this->address,
            // "phone_number" => $this->phone_number,
            'data' => $this->collection,
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}
