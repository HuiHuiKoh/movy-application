<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'name' => 'required|string|max:250',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|'
            . 'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            
        ];
    }

}
