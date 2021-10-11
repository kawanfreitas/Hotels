<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
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
            'latitude' => 'required',
            'longitude' => 'required',
            'ordBy' => 'required',
        ];
    }
    public function message()
    {
        return [
          'latitude.required' => 'Campo latitude obrigatório',
          'longitude.required' => 'Campo longitude obrigatório',
        ];
    }
}
