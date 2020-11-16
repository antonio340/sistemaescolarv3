<?php
require_once 'index.php';
use Illuminate\Database\Capsule\Manager as DB;
require 'vendor\autoload.php';
require 'config\database.php';


//resultados de lo ingresado en los cuadros
$nombre=$_GET['nombre'];
$cal1=$_GET['esp'];
$cal2=$_GET['mat'];
$cal3=$_GET['his'];

//se busca el ID del alumno ingresado 
$alumnoID = DB::table('alumnos')->where('nombre', $nombre)->value('idalumnos');
echo '<br>';

//busca  si hay un ID igual al ingresado
$revisionID=0;
$revisionID= DB::table('calificaciones')->where('alumnos_idalumnos', $alumnoID)->value('alumnos_idalumnos');


if ($alumnoID==null or $cal1==null or $cal2==null or $cal3=null)
{
echo '<img src="notfound.png" alt="" height="200px" width="500px">';
}
else
{
 //se realiza la comparación 
 if ($alumnoID == $revisionID){

    //se busca el ID de la tabla
    $tablaID = DB::table('calificaciones')->where('alumnos_idalumnos', $alumnoID)->value('idcalificaciones');
    

    //se edita el resto de los datos en la bdd
  DB::table('calificaciones')->where('idcalificaciones', $tablaID)->update(['esp' => $cal1]);
  DB::table('calificaciones')->where('idcalificaciones', $tablaID)->update(['mat' => $cal2]);
  DB::table('calificaciones')->where('idcalificaciones', $tablaID)->update(['his' => $cal3]);
 
 //se muestra el nombre ingresado

 echo '<br> Nombre del alumno: ',$nombre,'<br>';
 

  //se muestran los datos guardados dentro de la tabla
  $id_echo = DB::table('calificaciones')->where('alumnos_idalumnos', $alumnoID)->value('alumnos_idalumnos');
  $esp_echo = DB::table('calificaciones')->where('idcalificaciones', $tablaID)->value('esp');
  $mat_echo = DB::table('calificaciones')->where('idcalificaciones', $tablaID)->value('mat');
  $his_echo = DB::table('calificaciones')->where('idcalificaciones', $tablaID)->value('his');

  #echo 'ID del alumno: ',$id_echo;
  echo '<br>';

  echo 'Español : ',$esp_echo;
  echo '<br>';
  echo 'Matemáticas: ',$mat_echo;
  echo '<br>';
  echo 'Historia: ',$his_echo;
  echo '<br>';
}
 else{
    
    DB::table('calificaciones')->insert(['alumnos_idalumnos' => $alumnoID]);
    
    //se busca el ID de la tabla
    $tablaID = DB::table('calificaciones')->where('alumnos_idalumnos', $alumnoID)->value('idcalificaciones');
   
 
    //se inserta/edita el resto de los datos en la bdd
    DB::table('calificaciones')->where('idcalificaciones', $tablaID)->update(['esp' => $cal1]);
    DB::table('calificaciones')->where('idcalificaciones', $tablaID)->update(['mat' => $cal2]);
    DB::table('calificaciones')->where('idcalificaciones', $tablaID)->update(['his' => $cal3]);
 
    //se muestra el nombre ingresado

    echo '<br> Nombre del alumno: ',$nombre,'<br>';
 
    //se muestran los datos guardados dentro de la tabla
    $id_echo = DB::table('calificaciones')->where('alumnos_idalumnos', $alumnoID)->value('alumnos_idalumnos');
    $esp_echo = DB::table('calificaciones')->where('idcalificaciones', $tablaID)->value('esp');
    $mat_echo = DB::table('calificaciones')->where('idcalificaciones', $tablaID)->value('mat');
    $his_echo = DB::table('calificaciones')->where('idcalificaciones', $tablaID)->value('his');

    #echo 'ID del alumno: ',$id_echo;
    echo '<br>';

    echo 'Español : ',$esp_echo;
    echo '<br>';
    echo 'Matemáticas: ',$mat_echo;
    echo '<br>';
    echo 'Historia: ',$his_echo;
    echo '<br>';
 }
}