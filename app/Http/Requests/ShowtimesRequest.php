<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MoviesRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'name' => 'required|string|max:250',
            'dateTime' => 'required',
            'hall' => 'required',
            'cinema' => 'required',
        ];
    }

}
