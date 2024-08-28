<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $this->credentials($request);

        if (Auth::validate($credentials)) {
            $user = Auth::getLastAttempted();
            /* Aquí es donde verificas que esté activo el usuario, asumiendo que 
           tengas un campo booleano active */
            if ($user->active) {
                Auth::login($user, $request->has('remember'));
                return redirect()->intended($this->redirectTo);
            } else {
                return redirect(route('login'))
                    ->withErrors(['active' => trans('Usuario deshabilitado')]);
                /* Sino vuelvo a la pagina de login y muestro el error correspondiente */
            }
        }

        return redirect(route('login'))
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => trans('auth.failed'),
            ]);
    }
}
