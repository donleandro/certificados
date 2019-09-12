<?php

namespace App\Http\Controllers\Eventos;

use App\User;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Model\Eventos\Evento;
use App\Model\Eventos\Asistente;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class AsistenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Evento $model)
    {
        return view('asistentes.index', ['datos' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Evento $eventos)
    {
        return view('asistentes.create', ['eventos' => $eventos->all() ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->Validate($request,[
            'evento' => 'required|',
            'asistentes' => 'mimes:xlsx',
        ]);

        Excel::import(new UsersImport, $request->asistentes);
        $asistentes = (new UsersImport)->toArray($request->asistentes);

        for ($i=0; $i < count($asistentes[0]); $i++)
        {
            echo $email = $asistentes[0][$i][2];

            $user = User::where('email',$email)->first();

            $noValido = Asistente::where('user_id',$user->id)->where('evento_id',$request->evento)->first();

            if(!$noValido)
            {
                $asistencias = new Asistente;
                $asistencias->evento_id = $request->evento;
                $asistencias->user_id = $user->id;
                $asistencias->asistencia = $request->evento.'-'.rand();
                $asistencias->save();
            }
        }

        return redirect()->route('asistentes')->withStatus(__('Asistentes agregados correctamente.'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Eventos\Asistente  $asistente
     * @return \Illuminate\Http\Response
     */
    public function show($id, Evento $evento)
    {
        $asistentes = Asistente::where('evento_id',$id)->get();
        $evento = $evento->find($id);
        return view('asistentes.show', compact('evento'), ['datos' => $asistentes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Eventos\Asistente  $asistente
     * @return \Illuminate\Http\Response
     */
    public function edit(Asistente $asistente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Eventos\Asistente  $asistente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asistente $asistente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Eventos\Asistente  $asistente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asistente $asistente)
    {
        //
    }
}
