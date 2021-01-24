<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FicheEntrepriseRequest;

class EntrepriseController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $this->authorize("view",Auth::user());
        return view("entreprises.fiche");
    }

    /**
     * Store data "Fiche Entreprise".
     *
     * @return \Illuminate\Http\Response
     */
    public function store(FicheEntrepriseRequest $request){

        $user=Auth::user()->profile;

        if($request->file("path")){

            $path = $request->file("path")->storeAs("images",$user->nom_societe);

            $user->update([
                "path"        => $path,
                "nom_societe" => $request->nom_societe,
                "ville"       => $request->ville
            ]);

            return back()->withSuccess("Votre fiche à été bien modifié !");
        }
    }

}
