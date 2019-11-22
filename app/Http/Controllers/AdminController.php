<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Trabajo;
use Carbon\Carbon;
use PDF;
use Session;

class AdminController extends Controller
{
    //

    public function index(){

        $users = User::all();
        return view('admin.usuarios', compact('users'));

    }

    public function show(User $usuario){ // ROUTE MODEL BINDING used in here

        $meses = ['Todos los meses' => '00','Enero' => '01', 'Febrero' => '02', 'Marzo' =>'03', 'Abril' =>'04', 'Mayo' =>'05', 'Junio' =>'06', 'Julio' =>'07', 'Agosto' =>'08', 'Septiembre' =>'09', 'Octubre' =>'10', 'Noviembre' =>'11', 'Diciembre'=>'12'];

        $trabajos = $usuario->trabajos;

        $prices = $trabajos->pluck('total');
        $total = 0;
        $allNumbers = true;
        foreach($prices as $price){
            if(is_nan($price)){
                // Acá no hagamos nada mejor
            }else{
                $total += $price;
            }
        }

        /** Pasándole los trabajos del usuario al PDF */
        Session::put('filtrados', $trabajos);
        Session::put('total', $total);

        return view('admin.detalles', compact('usuario', 'trabajos' ,'meses', 'total'));

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

    /** Filtering */
    public function filter(Request $request, User $usuario){

        /* $d['month']; */ //11
        $meses = ['Todos los meses'=>'00','Enero' => '01', 'Febrero' => '02', 'Marzo' =>'03', 'Abril' =>'04', 'Mayo' =>'05', 'Junio' =>'06', 'Julio' =>'07', 'Agosto' =>'08', 'Septiembre' =>'09', 'Octubre' =>'10', 'Noviembre' =>'11', 'Diciembre'=>'12'];
        $mes = $request->month;

        $trabajos = $usuario->trabajos; // Collection returned
        $now = Carbon::now();
        if($mes != '00'){
            $filtered_trabajos = $trabajos->filter(function($trabajo) use ($mes, $now) {
                $date = $trabajo->created_at;

                $d = date_parse_from_format('Y-m-d', $date);

                return (($d['month'] == $mes) && ($now->year == $d['year'] ));
            });
        } else {
            $filtered_trabajos = $trabajos;
        }

        /** Let's pass this variable to the 'export_pdf' method */
        if($filtered_trabajos){
            Session::put('filtrados', $filtered_trabajos);
        }
        /** supossedly done */

        /** Avoiding to do the calculation with Jquery */
        $prices = $filtered_trabajos->pluck('total');
        $total = 0;
        $allNumbers = true;
        foreach($prices as $price){
            if(is_nan($price)){
                /** Acá no hagamos nada, mejor. */
            }else{
                $total += $price;
            }
        }

        /* dd($allNumbers); */

        Session::put('total', $total);
        return view('admin.detalles', ['usuario' => $usuario,'trabajos' => $filtered_trabajos , 'meses' => $meses, 'mes' => $mes , 'total' => $total]);



    }

    public function export_pdf( User $usuario){
        set_time_limit(300);
        $meses = ['Enero' => '01', 'Febrero' => '02', 'Marzo' =>'03', 'Abril' =>'04', 'Mayo' =>'05', 'Junio' =>'06', 'Julio' =>'07', 'Agosto' =>'08', 'Septiembre' =>'09', 'Octubre' =>'10', 'Noviembre' =>'11', 'Diciembre'=>'12'];

        /** Obteniendo tareas filtradas por mes (en caso de haber sido filtradas) */
        $trabajos = Session::get('filtrados');
        $total = Session::get('total');

        $pdf = PDF::loadView('admin.pdf', compact('usuario', 'trabajos' ,'meses', 'total'))->setPaper('a4', 'portrait');

        $fileName = $usuario->name;

        return $pdf->download($fileName . '.pdf');

    }
}
