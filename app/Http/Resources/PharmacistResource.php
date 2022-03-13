<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PharmacistResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'school'   => $this->school,
            'license_number'   => $this->license_number,
            'license_image'     => $this->license_image,
            'license_verified'      => $this->license_verified,
            'department' => $this->department,
            'date_hired' => $this->date_hired
        ];
    }
}
