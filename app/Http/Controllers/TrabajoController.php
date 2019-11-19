<?php

namespace App\Http\Controllers;

use App\Trabajo;
use Illuminate\Http\Request;

class TrabajoController extends Controller
{
    /** This is so we can use the info of the Logged in user. */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $trabajos = Trabajo::all()->where('user_id', auth()->user()->id);
        /* dd($trabajos); */

        return view('trabajos.index', compact('trabajos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('trabajos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = request()->validate([
            'name' => 'required|min:3',
            'duration' => 'required'
        ]);

        $trabajo = new Trabajo;
        $trabajo->name = $request->name;
        $trabajo->duration = $request->duration;
        $trabajo->user_id = $request->user_id;

        $trabajo->save();

        return redirect('/trabajos');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trabajo  $trabajo
     * @return \Illuminate\Http\Response
     */
    /** We shouldn't need to get the selected Model by id since we will be using *
    *   Route model binding                                                                         */
    public function show(Trabajo $trabajo)
    {
    //   dd($trabajo);

        return view('trabajos.show', compact('trabajo'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trabajo  $trabajo
     * @return \Illuminate\Http\Response
     */
    public function edit(Trabajo $trabajo)
    {
        //

        return view('trabajos.edit', compact('trabajo'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trabajo  $trabajo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trabajo $trabajo)
    {
        //
        $trabajo->name = $request->name;
        $trabajo->duration = $request->duration;

        $trabajo->save();

        return redirect('trabajos/'.$trabajo->id)->with('edit', 'Trabajo editado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trabajo  $trabajo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trabajo $trabajo)
    {
        //dd($trabajo);
        
        $trabajo->destroy($trabajo->id);

        return redirect('/trabajos');
    }
}
