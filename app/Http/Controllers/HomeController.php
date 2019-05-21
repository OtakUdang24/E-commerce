<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
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
        if (Auth::check()) {
            $id = Auth::user()->id;
            $user= DB::table('users')->where('id', $id)->get();
            if($user[0]->email_verified_at === null){
                return redirect('email/verify');
            }else{
                return view('client.home', ['currentpage' => 'home']);
            }
        }
        return view('client.home', ['currentpage' => 'home']);
        
    }

    public function register()
    {
        return view('client.register', ['currentpage' => 'register']);
    }
}
