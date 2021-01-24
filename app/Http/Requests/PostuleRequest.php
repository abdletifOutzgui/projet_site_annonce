<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostuleRequest extends FormRequest
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
            "mon_cv"                =>  "required|file|mimes:pdf,docx",
            "lettre_de_motivation"  =>  "required|min:50",
        ];
    }
}
