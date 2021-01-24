<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DemandeRequest;

class DemandeController extends Controller
{
    /**
     * Construct of Controller
     */
    public function __construct(){
        $this->middleware("auth")->except(["all","show"]);
    }

    /**
     * All DEMANDES
     */
    public function all(){
        return view("stagiaire.demandes.all",[
            'demandes' => Demande::with("user")->latest()->paginate(10)
        ]);
    }
    /**
     * Get ALl demandes
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $this->authorize("view",Demande::class);

        return view("stagiaire.demandes.index",[
            "demandes" => Auth::user()->demandes()->latest()->get()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $this->authorize("create",Demande::class);
        return view("stagiaire.demandes.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DemandeRequest $request)
    {
        Auth::user()->demandes()->create($request->validated() +
                                   ['slug' => Str::slug($request->title)]
                                );

        return back()->withSuccess("Votre demande à été enregistrer avec succés !");
    }

    /**
     * Show form to edit demande.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Demande $demande){

        $this->authorize("update",$demande);
        return view("stagiaire.demandes.edit",compact("demande"));
    }

     /**
     * Update une demande.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(DemandeRequest $request, Demande $demande){

        $this->authorize("update",$demande);

        if($request->title != $demande->title){
            $demande->slug = Str::slug($request->title);
            $demande->save();
        }
        $demande->update($request->validated());

        return back()->withSuccess("Votre demande à été modifier avec succés!");
    }

    /**
     * show demande
     */
    public function show(Demande $demande){
        return view("stagiaire.demandes.show", compact("demande"));
    }

    /**
     * Delete Demande
     */
    public function destroy(Demande $demande){

        $this->authorize("delete", $demande);
        $demande->delete();

        return back()->withSuccess("la demande à été supprimer !");
    }
}
