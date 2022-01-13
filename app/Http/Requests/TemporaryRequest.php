<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TemporaryRequest extends FormRequest
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
            'register_date' => ['required', 'date_format:d/m/Y', 'before_or_equal:now'],
            'start_date' => ['required', 'date_format:d/m/Y', 'before:end_date'],
            'end_date' => ['required', 'date_format:d/m/Y', 'after:start_date'],
            'reason' => ['required'],
            'family_id' => ['required', 'integer'],
        ];
    }

    public function messages()
    {
        return [];
    }
}