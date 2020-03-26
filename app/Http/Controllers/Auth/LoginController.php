<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Usuario;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/incidencia';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $nom = $request->input('nom');
        $contrasenya = $request->input('contrasenya');
        $user = Usuario::where('nom', $nom)->first();

        if($user != null && Hash::check($contrasenya, $user->contrasenya))
        {
            Auth::login($user);
            return redirect('/incidencia');
        }
        else
        {
            return redirect('login')->withInput();
        }
        
    }


    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

}
