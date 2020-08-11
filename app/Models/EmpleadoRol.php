<?php

namespace App\Models;

use App\Models\Empleado;
use App\Models\Rol;
use Illuminate\Database\Eloquent\Model;

class EmpleadoRol extends Model
{
    protected $table = "empleado_rol";

    protected $fillable = [
        "empleado_id",
        "rol_id",
    ];

    public function getEmpleado() { return $this->belongsTo(Empleado::class, "empleado_id"); }
    public function getRol() { return $this->belongsTo(Rol::class, "rol_id"); }
}
