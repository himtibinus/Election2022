<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    public function showLoginForm()
    {
        Session::put('Page', "login");
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $nim = $request->get('nim');
        $user = User::where('nim', $nim)->first();
        if($user === null){
            return redirect()->route('login')->with([
                'message' => 'NIM/ Lecturer code not found. Please try again!'
            ]);
        }
        Auth::loginUsingId($user->id);
        $this->sendLoginResponse($request);
        if($user->email === null){
            return redirect()->route('input.email', [$user->id]);
        }else{
            return redirect()->route('home');
        }
    }
}
