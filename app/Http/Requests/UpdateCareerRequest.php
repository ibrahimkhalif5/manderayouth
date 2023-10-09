<?php

namespace App\Http\Requests;

use App\Models\Career;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCareerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('career_edit');
    }

    public function rules()
    {
        return [
            'opportunity_type' => [
                'required',
            ],
            'title' => [
                'string',
                'required',
            ],
            'training_mode' => [
                'required',
            ],
            'venue' => [
                'string',
                'nullable',
            ],
            'start_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'end_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
