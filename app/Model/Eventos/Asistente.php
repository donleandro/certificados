<?php

namespace App\Model\Eventos;

use Illuminate\Database\Eloquent\Model;

class Asistente extends Model
{
   	protected $table = 'ev_asistentes';

   	public function eventos()
	{
	    return $this->belongsTo('App\Model\Evento','evento_id');
	}


}
