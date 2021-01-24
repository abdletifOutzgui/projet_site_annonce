<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OffreRequest extends FormRequest
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
    public function rules(){

        return [
            "title"          => "required|min:10",
            "duree"          => "required|numeric|between:1,6",
            "debut_stage"    => "required",
            "lieu"           =>"required",
            "fonction"       =>"required",
            "nbr_stagiaires" => "required|numeric",
            "type"           => "required",
            "remuneration"   => "required|boolean",
            "mission"          => "required|min:30",
            "profile_recherche"   => "required|min:30"
        ];
    }
}
