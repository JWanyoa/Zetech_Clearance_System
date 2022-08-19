<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramStoreRequest extends FormRequest
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
            'program_name' => ['required', 'string', 'max:255','unique:programs'],
            'program_code' => ['required', 'string', 'max:4','unique:programs'],
            'program_type' => ['required', 'string', 'max:255'],
            'department_id' => ['required', 'integer', 'max:255'],
        ];
    }
}
