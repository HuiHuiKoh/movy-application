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
            'synopsis' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|',
//            . 'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'casts' => 'required|string|max:400',
            'language' => 'required|string|max:20|min:3',
            'type' => 'required|string|max:100',
            'duration' => 'required|string|max:100',
            'trailer' => 'required|string',
            'releasedDate' => 'required',
            'director' => 'required|string|max:100',
            'category' => 'required',
        ];
    }

}
