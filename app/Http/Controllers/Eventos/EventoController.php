<?php

namespace App\Http\Controllers\Eventos;

use Illuminate\Http\File;
use App\Model\Eventos\Evento;
use Illuminate\Http\Request;
use App\Http\Requests\EventoRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Evento $model)
    {
         return view('eventos.index', ['datos' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventoRequest $request, Evento $model)
    {            
        $nombreImagen = $request->file('imagen')->getClientOriginalName(); 
      
        $model->create(
            [                
                'estado' => $request->estado,
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'imagen' => $nombreImagen,
                'fecha' => $request->fecha,
                'hora' => $request->hora,
            ]
        ); 

        Storage::putFileAs('public/eventos', new File($request->imagen), $nombreImagen);

        return redirect()->route('eventos')->withStatus(__('Evento creado con éxito.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Eventos\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Eventos\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Eventos\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Eventos\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        //
    }
}
