<?php

namespace App\Http\Controllers;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Notifications\MailVerification;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    use Notifiable;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function landing()
    {
        return view('auth.login');
    }

    public function email($id)
    {
        return view('auth.verify');
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make(['email' => $request->get('email')] ,[
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/^[\w.+\-]+@binus\.ac\.id|^[\w.+\-]+@binus\.edu$/']]);

        if($validate->fails()){
            return redirect()->route('input.email', [Auth::user()->id, Auth::user()->name])->with([
                'message' => 'Please use your BINUSIAN email address!'
            ]);
        }else{
            $user = User::find($id);
            $user->email = $request->get('email');
            $user->save();
            $user->notify(new MailVerification($user->name, $user->name, $user->email));
            return redirect()->route('home');
        }
    }
}
