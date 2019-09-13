<?php

namespace App\Http\Controllers\Eventos;

use PDF;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Model\Eventos\Evento;
use App\Model\Eventos\Asistente;
use App\Http\Controllers\Controller;

class CertificadoController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Evento $model)
    {
        return view('certificados.index', ['datos' => $model->paginate(15)]);
    }


    public function pdf($evento, $user)
    {
        $usuario = User::find($user);
        $evento  = Evento::find($evento);
        $asistencia = Asistente::where('user_id',$user)->where('evento_id',$evento->id)->first();

        if (!$usuario) {
            return redirect()->route('certificados')->with('error', '!Usuario no existe!');
        }

        if (!$evento) {
            return redirect()->route('certificados')->with('error', '!Evento no existe!');
        }

        if (!$asistencia) {
             return redirect()->route('certificados')->with('error', '!No asistió al evento!');
        }

        if (Auth::user()->rol_id <= 2) {
            $pdf = PDF::loadView('certificados.pdf', ['asistencia' => $asistencia])->setPaper('letter', 'landscape');
            return $pdf->download('certificado.pdf');
        }
        if(Auth::user()->rol_id == 3){

            if (Auth::user()->id == $usuario->id) {

                $pdf = PDF::loadView('certificados.pdf', ['asistencia' => $asistencia])->setPaper('letter', 'landscape');
                return $pdf->download('certificado.pdf');
            }

            return redirect()->route('certificados')->with('error', '¿Está perdido?');
        }
    }
}
