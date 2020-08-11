<?php

namespace App\Models;

use App\Models\Area;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = "empleados";

    protected $fillable = [
        "nombre",
        "email",
        "sexo",
        "area_id",
        "boletin",
        "descripcion"
    ];

    public function getArea() { return $this->belongsTo(Area::class, "area_id"); }
}
