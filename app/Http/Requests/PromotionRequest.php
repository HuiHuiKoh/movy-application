<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromotionRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'promotionTitle' => 'required',
            'promotionDescription' => 'required|min:10',
            'promotionImage' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|',
        ];
    }

}