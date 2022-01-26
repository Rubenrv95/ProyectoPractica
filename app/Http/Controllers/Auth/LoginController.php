<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Illuminate\Support\Facades\DB; 

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request) {


        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:6'
        ]);

        $credentials =  array(
            'email' => $request->get('email'),
            'password' => $request->get('password')

        );


        $user = DB::table('users')->where(['email'=>$request->get('email'), 'password'=>$request->get('password')])->get();
        $data = json_decode($user, true);

        if (Auth::attempt($credentials)) {
            return view('home')->with(['data'=>$data]);
        }
        else {
            return back()->with('error', 'Datos incorrectos');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->intended('/');
    }
}
