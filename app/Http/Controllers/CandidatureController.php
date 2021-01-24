<?php

namespace App\Http\Controllers;

use App\Models\Postule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CandidatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        if (Gate::allows('show-candidature')) {
            abort(403);
        }

        $candidatures = Postule::with("offre.user")->whereUserId(Auth::id())
                                                   ->latest()
                                                   ->paginate(5);

        return view("stagiaire.candidatures.index",compact("candidatures"));
    }
}
