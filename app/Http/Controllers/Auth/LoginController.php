<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Purpose;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

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
        $target_user = User::whereHas('purpose', function(Builder $query){
            $query->where('user_id', '4');
        })->get();

        // $target_repuest = Purpose::with('user')->where('status', 'draft')->get();
        // $target_repuest = User::with(['purpose', function(Builder $query){
        //     $query->where('status', 'draft');
        // }])->get();

        // $try_test = Purpose::with('user')->where('title', 'test for create')->get();

        // $result = count($target_user) > 0;

        // dd($try_test[0]->title);
        // $this->middleware(['guest']);  
    }


    public function index()
    {
        return view('auth.login');
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if(!auth()->attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('status', 'try again');
        }

        return redirect()->route('purpose.index');
    }
}
