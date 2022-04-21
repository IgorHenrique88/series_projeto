<?php

namespace App;

use App\Http\Controllers\TemporadasController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;


class Temporada extends Model
{
    protected $fillable = ['numero'];
    public $timestamps = false;
    public function episodeos()
    {
        return $this-> hasMany(Episodeo::class);
    }
    public function serie()
    {
        return $this-> belongsTo(Serie::class);
    }
    public function getEpisodiosAssistidos():Collection
    {
        return $this->episodeos->filter(function ($episodeos){
            return $episodeos->assistido;
        });
    }
}
