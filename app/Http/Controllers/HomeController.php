<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
        // return redirect('/');
    }

    public function user()
    {
        # code...
        $Users = User::all();

        foreach ($Users as $user) {
            # code...
           $dateF = $user->created_at->format('M d Y');
        //    array_push($Users,$dateF);
        //    $Users.push($dataF);
        }

        return response($Users);
    }
}
