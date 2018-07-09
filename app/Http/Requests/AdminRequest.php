<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AdminRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
           'name' => 'required',
           'mobile_number' => 'required',
           'id_number' => 'required',
           'member_number' => 'required',
           'shares' => 'required',
           'divided_balance' => 'required',
           'email' => 'required|email|unique:admins,email'.$request->id,
        ];
    }
}


