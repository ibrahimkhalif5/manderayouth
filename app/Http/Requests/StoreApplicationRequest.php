<?php

namespace App\Http\Requests;

use App\Models\Application;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('application_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'idno' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'dob' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'gender' => [
                'required',
            ],
            'mobile' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'unique:applications,mobile',
            ],
            'passport' => [
                'required',
            ],
            'passport_no' => [
                'string',
                'nullable',
            ],
            'passport_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'pwd' => [
                'required',
            ],
            'parent_name' => [
                'string',
                'required',
            ],
            'parent_contact' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'subcounty' => [
                'required',
            ],
            'ward' => [
                'required',
            ],
            'are_you_intrested_in' => [
                'required',
            ],
            'qualification' => [
                'string',
                'required',
            ],
            'grade' => [
                'string',
                'required',
            ],
            'year_of_experience' => [
                'required',
            ],
            'position' => [
                'string',
                'nullable',
            ],
        ];
    }
}
