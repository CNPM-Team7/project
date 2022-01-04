<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
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
        $rules = [
            'name' => ['required'],
            'birthday' => ['required'],
            'birth_place' => ['required'],
            'sex' => ['required'],
            'race' => ['required'],
            'job' => [],
            'work_place' => [],
            'id_number' => ['integer'],
            'idn_receive_place' => [],
            'idn_receive_date' => [],
            'register_place' => [],
            'register_date' => [],
            'owner_relation' => ['required'],
            'status' => ['required'],
            'move_to' => [],
            'note' => [],
            'family_id' => [''],
        ];

        if($this->family_id) $rules['family_id'] = ['exists:families,id'];
        return $rules;
    }

    public function messages()
    {
        return [];
    }
}
