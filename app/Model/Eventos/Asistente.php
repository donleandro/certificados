<?php

namespace App\Model\Eventos;

use Illuminate\Database\Eloquent\Model;

class Asistente extends Model
{
   	protected $table = 'ev_asistentes';

   	public function eventos()
	{
	    return $this->belongsTo('App\Model\Eventos\Evento','evento_id');
	}

	public function usuarios()
	{
	    return $this->belongsTo('App\User','user_id');
	}


}
