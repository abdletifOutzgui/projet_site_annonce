<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        if(!Auth::user()->role){
            return view("stagiaire.candidatures.message", [
                "messages" => Message::where('destinataire_id', Auth::id())->latest()->get()
            ]);
        }
        return view("messages.index", [
            "messages" => Message::whereUserId(Auth::id())->latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRequest $request)
    {
        Auth()->user()->messages()->create($request->validated() + [
            "destinataire_id" => $request->destinataire_id
        ]);

        return back()->withSuccess("Votre message à été envoyer avec succés!");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $this->authorize("destory", $message);
        $message->delete();

        return back()->withSuccess("Votre message à été envoyer avec succés!");
    }
}
