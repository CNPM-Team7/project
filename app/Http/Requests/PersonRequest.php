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
            'birthday' => ['required', 'date_format:d/m/Y', 'before:now'],
            'birth_place' => ['required'],
            'sex' => ['required'],
            'race' => ['required'],
            'job' => [],
            'work_place' => [],
            'id_number' => [],
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
        if($this->id_number) $rules['id_number'] = ['integer'];
        return $rules;
    }

    public function messages()
    {
        return [];
    }
}
