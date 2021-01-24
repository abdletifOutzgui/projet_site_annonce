<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\UserRegistredEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class StagiaireController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view("stagiaire.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'civilite'    => ['required', 'string', 'max:5'],
            'name'        => ['required', 'string', 'max:255'],
            'last_name'   => ['required', 'string', 'max:255'],
            'GSM'         => ['required', 'numeric', 'regex:/(0)[0-9]{9}/'],
            'email'       => ['required', 'string', 'email', 'max:255', 'unique:users,email','confirmed'],
            'password'    => ['required', 'string', 'min:8', 'confirmed'],
        ])->validateWithBag('stagiaire');

        $user= User::create([
            'name'      => $request['name'],
            'email'     => $request['email'],
            'last_name' => $request['last_name'],
            'password'  => Hash::make($request['password']),
        ]);


        $user->profile()->create([
            'civilite'  => $request['civilite'],
            'GSM'       => $request['GSM'],
            'path'      => "https://ui-avatars.com/api/?name={$user->name}+{$user->last_name}"
        ]);

        Mail::to($user->email)->queue(new UserRegistredEmail());

        Auth::login($user);

        return redirect(route("home"))->with("compte.created","Votre compte à été bien crée!");
    }
}
