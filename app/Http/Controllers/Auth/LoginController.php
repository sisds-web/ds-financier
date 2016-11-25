<?php

namespace DSFinancier\Http\Controllers\Auth;

use DSFinancier\Http\Controllers\Controller;
use DSFinancier\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * @param Request $request
     * @return mixed
     * SOBRESCREVENDO O METODO E ADCIONANDO A VALOR DA ROLE PARA RETORNO NA AUTENTICAÇÃO
     */
    protected function credentials(Request $request)
    {
        $data = $request->only($this->username(), 'password');
        $data['role'] = User::ROLE_ADMIN;
        return $data;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * CRIANDO METODO PARA SOBRESCRITA DO LOGOUT DA APLICAÇÃO
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect(env('REDIRECT_LOGIN'));
    }
}
