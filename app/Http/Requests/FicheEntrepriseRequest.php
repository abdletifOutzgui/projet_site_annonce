<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FicheEntrepriseRequest extends FormRequest
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
            "ville"        => "required",
            "nom_societe"  => "required|min:8",
            "path"         => "required|image|mimes:png,jpg,jpeg,svg"
        ];
    }
}
