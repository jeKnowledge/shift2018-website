<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'team_name' => 'required|unique:teams,name|unique:teams,project_name',
            'team_logo' => 'image|max:5000'
        ];

    }


    public function response(array $errors)
    {
      $errors['status'] = 'failed';
      return response()->json($errors);

    }


}
