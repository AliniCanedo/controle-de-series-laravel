<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public $timestamp = false;
    protected $fillable = ['nome'];

    public function temporada()
    {
        return $this->hasMany(Temporada::class);
    }
}
