<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Trabajo;
use Carbon\Carbon;

class AdminController extends Controller
{
    //

    public function index(){

        $users = User::all();
        return view('admin.usuarios', compact('users'));

    }

    public function show(User $usuario){ // ROUTE MODEL BINDING used in here

        $meses = ['Enero' => '01', 'Febrero' => '02', 'Marzo' =>'03', 'Abril' =>'04', 'Mayo' =>'05', 'Junio' =>'06', 'Julio' =>'07', 'Agosto' =>'08', 'Septiembre' =>'09', 'Octubre' =>'10', 'Noviembre' =>'11', 'Diciembre'=>'12'];

        $trabajos = $usuario->trabajos;

        return view('admin.detalles', compact('usuario', 'trabajos' ,'meses'));

    }

    /** Set a price for a job (trabajo) */
    public function setPrice($id, Request $request){

        $trabajo = Trabajo::findOrFail($id);
        /* dd($trabajo); */
        $data = $request->validate([
            'price' => 'required'
        ]);

        $trabajo->price = $request->price;
        $trabajo->save();

        return back();

    }

    /** Tratar de modificar información de trabajo de usuario */
    public function editJob(User $usuario, Trabajo $trabajo){ // ROUTE MODEL BINDING used in here

        /* dd($trabajo); */
        return view('admin.editarTrabajo', compact('usuario', 'trabajo'));

    }
    /** Updatear información de trabajo de usuario */
    public function updateJob(User $usuario, Trabajo $trabajo, Request $request){ // ROUTE MODEL BINDING used in here

       $data = $request->validate([
           'name' => 'required',
           'duration' => 'required',
           'price' => 'required'
       ]);

        /* dd($trabajo); */

        $trabajo->name = $request->name;
        $trabajo->duration = $request->duration;
        $trabajo->price = $request->price;
        $trabajo->save();

        return redirect('/usuarios/' . $usuario->id);

    }


    /** Failing at filter */
    public function filter(Request $request, User $usuario){

        /* $d['month']; */ //11
        $meses = ['Enero' => '01', 'Febrero' => '02', 'Marzo' =>'03', 'Abril' =>'04', 'Mayo' =>'05', 'Junio' =>'06', 'Julio' =>'07', 'Agosto' =>'08', 'Septiembre' =>'09', 'Octubre' =>'10', 'Noviembre' =>'11', 'Diciembre'=>'12'];
        $x = $request->month;

        $trabajos = $usuario->trabajos; // Collection returned
        $now = Carbon::now();

        $filtered_trabajos = $trabajos->filter(function($trabajo) use ($x, $now) {
                $date = $trabajo->created_at;

                $d = date_parse_from_format('Y-m-d', $date);

                return (($d['month'] == $x) && ($now->year == $d['year'] ));
        });

        return view('admin.detalles', ['usuario' => $usuario,'trabajos' => $filtered_trabajos , 'meses' => $meses ]);

    }
}
