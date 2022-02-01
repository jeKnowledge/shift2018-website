<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
            'age' => 'filled|required|integer|min:0',
            'phoneNumber' => 'filled|required|integer|regex:"(9[1236][0-9]) ?([0-9]{3}) ?([0-9]{3})"',
            'location' => 'filled|required',
            'isStudent' => 'filled|required|boolean',
            'type' => 'filled|required',
            'skills' => 'filled|required|at_least:6',
            'university' => 'required_if:isStudent,1',
            'course' => 'required_if:isStudent,1',
            'institution' => 'required_if:isStudent,0',
            'function' => 'required_if:isStudent,0',
            'pitch' => 'filled|required|min:10',
            'tshirt' => 'filled|required',
            'isFirstTime' => 'filled|required',
            'isStudent' => 'filled|required',
        ];

    }


}
