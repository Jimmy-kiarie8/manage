<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CsvRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'member_number' => 'required',
            'name' => 'required',
            'id_number' => 'required',
            'mobile_number' => 'required',
            'email' => 'required|email|unique:Admin,email'.$request->id,,
            'shares' => 'required',
            'divided_balance' => 'required',
        ];
    }
}
