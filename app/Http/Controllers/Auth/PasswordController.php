<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Config;
use Auth;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getReset()
    {
        $config = Config::getConfig();
        if(Auth::check()) {
            return view('auth.reset', compact('config'));
        }
        return Redirect::route('getLogin');
    }

    public function postReset(Requests\ResetPasswordRequest $request)
    {
        if(Auth::check()) {
            if(Auth::validate(['password'=>$request['old_password']])) {
                $input = [
                    'email' => $request['email'],
                    'password' => Hash::make($request['password'])
                ];
                $user = Auth::user();
                $user->update($input);
                return Redirect::route('home');
            }
            return view('auth.reset');
        }
        return Redirect::route('index');
    }

}
