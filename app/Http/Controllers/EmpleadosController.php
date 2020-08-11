<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Empleado;
use App\Models\Rol;
use Illuminate\Http\Request;

/**
 * Clase encargada de la gestión de empleados
 */
class EmpleadosController extends Controller
{
    private const FOLDER = "empleados";
    /**
     * Consulta los empleados de la base de datos y los enlista
     * @return view listar Vista con el listado de empleados
     */
    public function index() {

        $employees = Empleado::orderBy("nombre")->get();

        return view(self::FOLDER . ".listar")->with([
            "employees" => $employees
        ]);
    }
    /**
     * Obtiene los parámetros necesarios para el formulario de creación
     */
    public function create() {

        $sexs = [
            ["F", "Femenino"],
            ["M", "Masculino"]
        ];

        $areas = Area::orderBy("nombre")->get();

        $rols = Rol::all();

        return view(self::FOLDER . ".crear")->with([
            "sexs" => $sexs,
            "areas" => $areas,
            "rols" => $rols,
        ]);
    }
}
