<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use App\Models\Postule;
use Illuminate\Support\Str;
use App\Http\Requests\OffreRequest;
use App\Mail\OffreCreatedEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OffreController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->except(["accueil","index","all","show"]);
    }

    /**
     * All offres
     */
    public function all(){
        return view("offres.offres",[
            "offres" => Offre::with("user.profile")->latest()->paginate(10)
        ]);
    }


    public function accueil(){
        return view("accueil",[
            'offres' => Offre::with("user")->latest()->take(3)->get()
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize("view",Auth::user());

        $offresIds = Auth::user()->offres()->pluck("id");
        $postules = Postule::whereIn("offre_id", $offresIds)->get();

        return view("offres.index",[
            'offres' => Auth::user()->offres()->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $this->authorize("create",Offre::class);

        return view("offres.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OffreRequest $request)
    {
        $title = $request->title;
        $offre = Auth::user()->offres()->create($request->validated() +
                                       ['slug' => Str::slug($title)]);

        Mail::to(Auth::user()->email)
                        ->queue(new OffreCreatedEmail($offre));

        return back()->withSuccess("l'offre est ajouté avec succes ");
    }

      /**
     * Show offre
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Offre $offre){

        $postules = Postule::whereUserId(Auth::id())->get();
        $offre->increment("nbr_vue");
        return view("offres.show",compact("offre","postules"));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function edit(Offre $offre){

        $this->authorize("update",$offre);
        return view("offres.edit",compact("offre"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function update(OffreRequest $request, Offre $offre)
    {
        $this->authorize("update",$offre);

        $offre->update($request->validated());
        return back()->withSuccess("l'offre à été bien modifier !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offre $offre){

        $this->authorize("destroy", $offre);
        $offre->delete();

        return back()->withSuccess("l'offre à été supprimé avec succées");
    }
}
