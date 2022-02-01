<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'min:3',
            'location' => 'alpha|min:3',
            'password' => 'min:6|confirmed',
            'age' => 'integer|min:0',
            'bio' => 'min:10',
            'phone_number' => 'regex:"(9[1236][0-9]) ?([0-9]{3}) ?([0-9]{3})"',
            'twitter' => 'regex:"(@).*"',
            'photoFile' => 'image|max:5000'
        ];

    }


    public function response(array $errors)
    {
      $errors['status'] = 'failed';
      return response()->json($errors);

    }


}
