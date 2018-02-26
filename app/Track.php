<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Track extends Model 
{
    protected $table = 'tracks';
    protected $primaryKey  = 'id'; 

    public function tracks()
    {
        return $this->hasOne('App\Album');
    }	
}
