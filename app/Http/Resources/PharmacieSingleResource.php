<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PharmacieSingleResource extends JsonResource
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
            'company_name' => $this->company_name,
            'registered_name' => $this->registered_name,
            'branch_code' => $this->branch_code,
            'phone'   => $this->phone,
            'country'   => $this->country,
            'state'     => $this->state,
            'city'      => $this->city,
            'country_id' => $this->country_id,
            'license_num'   => $this->license_num,
            'paypal_email'  => $this->paypal_email,
            'blockchain_ver' => $this->blockchain_ver,
            'contact_person' => $this->contact_person
        ];
    }
}
