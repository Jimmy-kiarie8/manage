<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'start_time' => 'required|time|time_format:H:m:s',
            'end_time' => 'required|time|time_format:H:m:s',

        ];
    }
}
// $calendar->start_time = $request->startTime;
//         $calendar->end_time = $request->endTime;
//         $calendar->start_date = $request->start_date;
//         $calendar->end_date = $request->start_date;
//         $calendar->title = $request->title;