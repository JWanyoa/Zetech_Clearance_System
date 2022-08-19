<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RemarksStoreRequest extends FormRequest
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
            'remark' => ['required', 'string'],
            'user_id' => ['required', 'integer', 'max:255'],
            'remark_to' => ['required', 'integer', 'max:255'],
            'issue' => ['required', 'string', 'max:1000'],
        ];
    }
}
