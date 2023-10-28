<?php

namespace App\Controllers;
use App\Models\Contactos;

class ContactosController extends Controller
{
    public function index()
    {
        //Este metodo sirve para mostrar a los registros de la tabla de contactos
        $datosEmpleados= Contactos::all();
        response()->json($datosEmpleados);
    }
    public function Consultar($id)
    {
        //consultar un contacto solo por su id
        $datosEmpleados= Contactos::find($id);
        response()->json($datosEmpleados);
    }
    public function Agregar()
    {
        //Se va a insertar cada uno de los datos para el que se necesitas un contacto
        $contacto= new Contactos;

        $contacto->nombre=app()->request()->get('nombre');
        $contacto->primerapellido=app()->request()->get('primerapellido');
        $contacto->segundoapellido=app()->request()->get('segundoapellido');
        $contacto->correo=app()->request()->get('correo');
        $contacto->save();

        response()->json(["message"=> "Contacto Agregado"]);
    }
    public function Eliminar($id)
    {
        //El Contacto se va a borrar por el ID
        Contactos::destroy($id);
        response()->json(["message"=> "El contacto ha sido Eliminado: ".$id]);
    }
    public function Actualizar($id)
    {
        //Se actualiza cada dato segun lo su ID

        $nombre=app()->request()->get('nombre');
        $primerapellido=app()->request()->get('primerapellido');
        $segundoapellido=app()->request()->get('segundoapellido');
        $correo=app()->request()->get('correo');

        $contacto= Contactos::findOrFail($id);


        $contacto->nombre=($nombre!="")?$nombre:$contacto->nombre;
        $contacto->primerapellido=($primerapellido!="")?$primerapellido:$contacto->primerapellido;
        $contacto->segundoapellido=($segundoapellido!="")?$segundoapellido:$contacto->segundoapellido;
        $contacto->correo=($correo!="")?$correo:$contacto->correo;

        $contacto->update();

        response()->json(["message"=> "El contacto ha sido actualizado: ".$id]);
    }
}
