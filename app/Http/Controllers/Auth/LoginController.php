<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {
        if (Auth()->user()->role == 1) {
            return redirect()->route('admin.dashboard');
        }elseif(Auth()->user()->role == 2){
            return redirect()->route('user.home');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt([ 'email' => $input['email'], 'password'=> $input['password'] ])) {
            if (Auth()->check() && Auth()->user()->role->slug !== 'user') {
                return redirect()->route('admin.dashboard');
            }elseif(Auth()->user()->role->slug == 'user'){
                // return redirect()->route('front.home');
                return redirect()->back();
            }
        }else{
            return redirect()->route('login')->with('error','Credentials are wrong!');
        }
    }
}
