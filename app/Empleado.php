<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = [
        'jerarquia',
        'ni',
        'apeynom',

    ];

    public function scopeSearch($query, $id)
    {
        return $query->where('id', 'LIKE', "%$id%");
    }

    public function aservicio()
    {
        return $this->hasMany('App\Servicio', 'id');
    }
}
