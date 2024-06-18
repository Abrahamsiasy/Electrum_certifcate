<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiRefEqInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        {
            return [
                'eq_name' => 'required|string',
                'brand' => 'required|string',
                'model' => 'required|string',
                'serial_no' => 'required|string',
                'eq_id' => 'required|string',
                // 'sensor_sn' => 'required|string',
                // 'sensor_id' => 'required|string',
                // 'split_no' => 'required|string',
                // 'c0' => 'required|numeric',
                // 'c1' => 'required|numeric',
                // 'c2' => 'required|numeric',
                // 'c3' => 'required|numeric',
                // 'c4' => 'required|numeric',
                // 'Serr' => 'required|numeric',
                // 'range_min' => 'required|numeric',
                // 'range_max' => 'required|numeric',
                // 'cal_date' => 'required|date',
                // 'uncert' => 'required|numeric',
                // 'cmc' => 'required|string',
                // 'res' => 'required|numeric',
                // 'unit' => 'required|string',
            ];
        }
    }
}
