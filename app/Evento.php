<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Evento.
 *
 * @author  The scaffold-interface created at 2019-08-21 04:15:55pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Evento extends Model
{
	
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    
	
    protected $table = 'eventos';

	

	/**
     * user.
     *
     * @return  \Illuminate\Support\Collection;
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     * Assign a user.
     *
     * @param  $user
     * @return  mixed
     */
    public function assignUser($user)
    {
        return $this->users()->attach($user);
    }
    /**
     * Remove a user.
     *
     * @param  $user
     * @return  mixed
     */
    public function removeUser($user)
    {
        return $this->users()->detach($user);
    }

}
