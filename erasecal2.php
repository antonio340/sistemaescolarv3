<?php
require_once 'index.php';
use Illuminate\Database\Capsule\Manager as DB;
require 'vendor\autoload.php';
require 'config\database.php';

//se obtiene el nombre puesto en el cuadro de texto llamadado 'nombre'
$nombre=$_GET['nombre'];

//se busca el ID del alumno, por medio de su nombre
$alumnoID = DB::table('alumnos')->where('nombre', $nombre)->value('idalumnos');

//se busca el ID del alumno en la tabla de calificaciones
$revisionID=0;
$revisionID= DB::table('calificaciones')->where('alumnos_idalumnos', $alumnoID)->value('alumnos_idalumnos');

if ($revisionID==null){
    echo '<img src="Error alumno.png" alt="" height="200px" width="500px">';
}
else
{
 //si el ID del alumno se encontro en la tabla de calificaciones...
 if ($alumnoID == $revisionID){

    //se obtiene el ID de la tabla que contiene el ID del alumno
    $tablaID = DB::table('calificaciones')->where('alumnos_idalumnos', $alumnoID)->value('idcalificaciones');

    //se encuentra el ID de la tabla para borrarla
    DB::table('calificaciones')->where('idcalificaciones', $tablaID)->delete();
    echo 'Se ha eliminado el registro de calificaciones de ',$nombre;
  }
  else
  {
    echo '<img src="Error alumno.png" alt="" height="200px" width="500px">';
  }
}