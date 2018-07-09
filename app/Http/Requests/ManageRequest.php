<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ManageRequest extends FormRequest
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
            'name' => 'required|max:255',
            'color' => 'required|max:30',
            'logo' => 'required|max:25',
            'number' => 'required|numeric',
            // 'manage_id' => 'required',
            'email' => 'required|email|unique:Manages,email'.$request->id,
        ];
    }
}
