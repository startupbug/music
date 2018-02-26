<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
	protected $table = 'albums';
	protected $primaryKey  = 'id'; 

	public function albums()
    {
        return $this->hasMany('App\Track');
    }
}
