<?php

namespace App\Http\Controllers\Eventos;

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

   
    public function show($user)
    {
        //
    }
}
