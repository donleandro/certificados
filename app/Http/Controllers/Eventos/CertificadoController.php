<?php

namespace App\Http\Controllers\Eventos;

use PDF;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Model\Eventos\Evento;
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

        if (!$usuario) {          
            return redirect()->route('certificados')->with('error', 'Usuario no existe!');
        }

        if (!$evento) {           
            return redirect()->route('certificados')->with('error', 'Evento no existe!');
        }

        if (Auth::user()->rol_id <= 2) {
            $pdf = PDF::loadView('certificados.pdf', ['usuario' => $usuario, 'evento' => $evento]);
            return $pdf->download('invoice.pdf');
        }
        if(Auth::user()->rol_id == 3){            
         
            if (Auth::user()->id == $usuario->id) {

                $pdf = PDF::loadView('certificados.pdf', ['usuario' => $usuario, 'evento' => $evento]);
                return $pdf->download('invoice.pdf');                
            }

            return redirect()->route('certificados')->with('error', 'Esta perdido??');
        }

        



    }
}
