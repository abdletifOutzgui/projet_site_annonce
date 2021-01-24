<?php

namespace App\Http\Controllers;

use App\Models\Postule;
use Illuminate\Http\Request;
use App\Events\SendMailsEvent;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostuleRequest;
use Illuminate\Support\Facades\Storage;

class PostuleController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostuleRequest $request)
    {
        $user = Auth::user();

        if($request->file("mon_cv")){

            $path = $request->file('mon_cv')->store('cvs');

            $postule = $user->postules()->create([
                "CV"                   => $path,
                "lettre_de_motivation" => $request->lettre_de_motivation,
                "offre_id"             => $request->offre_id
            ]);

            event(new SendMailsEvent($postule, $user));

            return back()->withSuccess("Votre candidature à été bien enregistré !");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Postule  $postule
     * @return \Illuminate\Http\Response
     */
    public function edit(Postule $postule)
    {
        $this->authorize("update", $postule);
        return view("stagiaire.candidatures.edit", compact("postule"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Postule  $postule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postule $postule)
    {

        $this->authorize("update", $postule);

        if($request->mon_cv){
            if($request->file("mon_cv")){
                Storage::delete($postule->mon_cv);

                $postule->CV = $request->file("mon_cv")->store("cvs");
                $postule->save();
            }
        }
        if ($request->lettre_de_motivation) {
            $postule->lettre_de_motivation = $request->lettre_de_motivation;
            $postule->save();
        }

        return back()->withSuccess("Votre candidature à été modifier!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Postule  $postule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postule $postule)
    {
        $this->authorize("delete",$postule);
        $postule->delete();

        return back()->withSuccess("Votre candidature à été bien suppprimer!");
    }
}
