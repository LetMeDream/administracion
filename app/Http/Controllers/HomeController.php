<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
    }

    /** From here and down, it's mine  */
    public function store(){

        $data=request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|confirmed',
        ]);
        /* User::create($data); */
        $user = new User;
        $user->name = request()->name;
        $user->email = request()->email;
        $user->password = bcrypt(request()->password);

        $user->save();

        return redirect('/usuarios')->with('success', 'El usuario fue agregado correctamente.');

    }
}
