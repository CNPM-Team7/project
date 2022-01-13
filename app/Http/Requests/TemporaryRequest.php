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
        return [
            'register_date.required' => 'Ngày khai báo không được để trống',
            'register_date.date_format' => 'Định dạng dữ liệu nhập vào phải là ngày/tháng/năm',
            'register_date.before_or_equal' => 'Ngày khai báo phải là ngày hôm nay hoặc trước đó',

            'start_date.required' => 'Ngày bắt đầu tạm vắng không được để trống',
            'start_date.date_format' => 'Định dạng dữ liệu nhập vào phải là ngày/tháng/năm',
            'start_date.before' => 'Ngày bắt đầu tạm vắng phải trước ngày kết thúc tạm vắng',

            'end_date.required' => 'Ngày kết thúc tạm vắng không được để trống',
            'end_date.date_format' => 'Định dạng dữ liệu nhập vào phải là ngày/tháng/năm',
            'end_date.after' => 'Ngày kết thúc tạm vắng phải sau ngày bắt đầu tạm vắng',

            'reason' => 'Lý do tạm vắng không được để trống'
        ];
    }
}
