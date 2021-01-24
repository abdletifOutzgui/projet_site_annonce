<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, Profile $profile)
    {
        if (!Auth::attempt(array('email' => $profile->user->email, 'password' => $request->old_password))){
            return back()->withError("l'ancien mot de passe est invalide !");
        }
        $profile->user->update([ 'password'=> $request->password ]);

        return back()->withSuccess("le mot de passe à été modifier avec succés");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        Auth::logout();
        $profile->delete();

        return redirect("/");
    }
     /**
     * Show Profile of user.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        return view("auth.profile");
    }
}
