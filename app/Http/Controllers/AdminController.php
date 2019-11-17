<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Trabajo;

class AdminController extends Controller
{
    //

    public function index(){

        $users = User::all();
        return view('admin.usuarios', compact('users'));

    }

    public function show(User $usuario){ // ROUTE MODEL BINDING used in here

        return view('admin.detalles', compact('usuario'));

    }

    public function setPrice($id, Request $request){

        $trabajo = Trabajo::findOrFail($id);
        /* dd($trabajo); */

        $trabajo->price = $request->price;
        $trabajo->save();

        return back();

    }

}
