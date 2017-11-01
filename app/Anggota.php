<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    public function user()
    {
    	protected $table="anggota";
        return $this->belongsTo('App\User');
    }
}
