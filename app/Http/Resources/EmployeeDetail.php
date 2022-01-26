<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeDetail extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // $repairs = $this->repair;
        // $repairsConverted = array();
        // foreach ($repairs as $repair) {
        //     $item = $repair->with('equipment')->first();
        //     array_push({
        //         'equipment_name' => $item->equipment->name,
        //         'equipment_code' => 
        //     })
        // }
        return parent::toArray($request);

        // return [
        //     "id" => $this->id,
        //     "code" => $this->code,
        //     "join_date" => $this->join_date,
        //     "name" => $this->name,
        //     "email" => $this->email,
        //     "department_id" => $this->department_id,
        //     "is_manager" => $this->is_manager,
        //     "address" => $this->address,
        //     "phone_number" => $this->phone_number,
        //     "department_name" => $this->department->name,
        //     "request" => $this->request,
        //     "equipment_status_log" => $this->equipment_status_log,
        //     "liquidation" => $this->liquidation,
        //     "repair" => $this->repair
        // ];
    }
}
