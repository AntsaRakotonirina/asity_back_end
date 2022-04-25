<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterObservationRequest extends FormRequest
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
            'attribute'=>'required|in:animal,habitat,nombre,abondance,presence,zone,suivi_id,animal_id'
        ];
    }
}
