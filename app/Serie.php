<?php

namespace App;

use illuminate\Database\Eloquent\Model;

class Serie extends Model 
{
    protected $table = 'series';
    protected $fillable = ['nome'];
    public $timestamps = false;

    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }
}