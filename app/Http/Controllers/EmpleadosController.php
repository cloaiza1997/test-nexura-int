<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Empleado;
use App\Models\EmpleadoRol;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Clase encargada de la gestión de empleados
 */
class EmpleadosController extends Controller
{
    private const FOLDER = "empleados";

    // *** HELPERS
    /**
     * Ejecuta una función pasada por parámetro la cual puede generar una excepción
     * @param function $function Función anónima que puede generar error
     * @return conitnue|error_view Continua la ejeución o muestra una vista con error
     */
    private function executeAction($function)
    {
        try {
            return $function();
        } catch (\Throwable $th) {
            // Se pasan por parámetro datos para mostrar en el error
            return redirect("error")->with([
                "message_error" => $th->getMessage(),
                "url" => url("employee")
            ]);
        }
    }

    // *** CRUD
    /**
     * Consulta los empleados de la base de datos y los enlista
     * @return view listar Vista con el listado de empleados
     */
    public function index()
    {
        // Listado de todos los empleado
        $employees = Empleado::orderBy("nombre")->get();

        return view(self::FOLDER . ".listar")->with([
            "employees" => $employees
        ]);
    }
    /**
     * Obtiene los parámetros necesarios para el formulario de creación
     */
    public function create()
    {

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
    /**
     * Elimina un empleado de la base de datos
     * @param number $id Id del empleado a eliminar
     * @return view list Confirmación de la eliminación
     */
    public function destroy($id)
    {
        // Se crea varaible con función anónima de la eliminación del empleado
        $function = function () use ($id) {
            // Se consulta el empleado
            $employee = Empleado::find($id);
            // + Empleado existe | - No existe
            if ($employee) {
                // Se elimina de la tabla de roles
                DB::delete("DELETE FROM empleado_rol WHERE empleado_id = {$employee->id}");
                // Se elimina el empleado
                $success = $employee->delete();
                // + Empleado eliminado
                if ($success) {
                    $message = "Empleado {$employee->nombre} eliminado correctamente";
                    $type_message = "success";
                } else {
                    $message = "Empleado {$employee->nombre} no se pudo eliminar correctamente";
                    $type_message = "error";
                }
            } else {
                $message = "No existe el empleado con el {$id}";
                $type_message = "error";
            }

            return redirect("employee")->with([
                "message" => $message,
                "type_message" => $type_message
            ]);
        };

        return $this->executeAction($function);
    }
    /**
     * Crea un empleado en la base de datos
     * @param request $request Datos recibidos del formulario
     * @return view list Confirmación de la ejecución
     */
    public function store(Request $request)
    {
        $inputs = $request->all();

        $function = function () use ($inputs) {
            // Crear empleado
            $employee = new Empleado();
            $employee->nombre = $inputs["nombre"];
            $employee->email = $inputs["email"];
            $employee->sexo = $inputs["sexo"];
            $employee->area_id = $inputs["area_id"];
            $employee->boletin = ($inputs["boletin"] == "on") ? 1 : 0;
            $employee->descripcion = $inputs["descripcion"];
            $success = $employee->save();

            if ($success) {
                foreach ($inputs["rol"] as $rol_id) {
                    $rol = new EmpleadoRol();
                    $rol->empleado_id = $employee->id;
                    $rol->rol_id = $rol_id;
                    $rol->save();
                }

                $message = "Empleado {$employee->nombre} creado correctamente";
                $type_message = "success";
            } else {
                $message = "Empleado no se pudo crear correctamente";
                $type_message = "error";
            }

            return redirect("employee")->with([
                "message" => $message,
                "type_message" => $type_message
            ]);
        };

        return $this->executeAction($function);
    }
}
