<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShowtimesRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'movie' => 'required',
            'dateTime' => 'required',
            'hall' => 'required|integer',
            'cinema' => 'required',
            
        ];
    }

}
