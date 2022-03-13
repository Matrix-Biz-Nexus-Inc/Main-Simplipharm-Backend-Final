<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PharmacieStoreRequest extends FormRequest
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
        return [
            'company_name' => ['required'],
            'registered_name' => ['required'],
            'branch_code' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
            'country_id' => ['required'],
            'city_id' => ['required'],
            'department_id' => ['required'],
            'license_num' => ['required'],
            'blockchain_ver' => ['required'],
            'contact_person' => ['required'],
        ];
    }
}
