<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validateData= Validator::make($data, [
            'name'        => ['required', 'string', 'max:255'],
            'civilite'    => ['required', 'string', 'max:5'],
            'nom_societe' => ['string', 'max:255'],
            'ville'       => ['string', 'max:255'],
            'last_name'   => ['required', 'string', 'max:255'],
            'GSM'         => ['required', 'numeric', 'regex:/(0)[0-9]{9}/'],
            'email'       => ['required', 'string', 'email', 'max:255', 'unique:users,email','confirmed'],
            'password'    => ['required', 'string', 'min:8', 'confirmed'],
            // 'captcha'     => ['captcha'],
        ]);
        $validateData->validateWithBag('register');
        return $validateData;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user= User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'last_name' => $data['last_name'],
            'role'      => 1,
            'password'  => Hash::make($data['password']),
        ]);
        $user->profile()->create([
            'nom_societe' => $data['nom_societe'],
            'civilite'    => $data['civilite'],
            'ville'       => $data['ville'],
            'GSM'         => $data['GSM'],
            'path'        => "/storage/images/default.jpg"
        ]);

        return $user;
    }
}
