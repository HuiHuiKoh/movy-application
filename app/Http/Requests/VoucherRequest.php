<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoucherRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'voucherTitle' => 'required',
            'voucherCode' => 'required|max:10',
            'discountAmount' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'expirationDate' => 'required|date|after:tomorrow',
        ];
    }

}