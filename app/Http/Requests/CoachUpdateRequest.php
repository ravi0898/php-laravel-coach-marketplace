<?php

namespace App\Http\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CoachUpdateRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        $controllerObj = new Controller();
        throw new HttpResponseException($controllerObj->returnResponse(false, null, "ERR002", $validator->errors()), 422);
    }
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
            'lastName' => 'required', 'string', 'max:50',
            'phone' => 'required', 'max:15',
            'company' => 'required', 'max:100',
            'country' => 'required',
            'profilePhoto' => 'required',
            'profile_headline' => 'required', 'max:500',
            'biography' => 'required', 'max:1000',
            'expertise' => 'required',
            'seniority' => 'required',
            'industry' => 'required',
            'business_model' => 'required',
            'price_20' => 'required', 'numeric', 'max:10000000',
            'price_40' => 'required', 'numeric', 'max:10000000',
            'price_60' => 'required', 'numeric', 'max:10000000',
            'available_slots' => 'required',
            'account_details' => 'required',
            'about_me' => 'required',
            'people_expect' => 'required',
        ];
    }
}
