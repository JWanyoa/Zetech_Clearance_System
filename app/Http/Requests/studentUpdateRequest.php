<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class studentUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'user_name' => ['required', 'string', 'max:255', 'unique:users'],
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'national_id' => ['required', 'integer','max:99999999'],
            'phone' => ['required','integer'],
            'guardianPhone' => ['required','integer'],
            'admissionNumber' => ['required','string'],
            'yearOfAdmission' => ['required','string'],
            'department_id' => ['required', 'integer', 'max:255'],
            'program_id' => ['required', 'integer', 'max:255'],
        ];
    }
}
