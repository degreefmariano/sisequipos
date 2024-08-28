<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    protected $table = 'dependencias';

    public $timestamps = false;

    protected $fillable = [
        'nro',
        'nombre'
    ];

    public function scopeSearch($query, $nro)
    {
        return $query->where('nro', 'LIKE', "%$nro%");
    }
}
