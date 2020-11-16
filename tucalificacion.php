<?php
require_once 'index.php';
use Illuminate\Database\Capsule\Manager as DB;
require 'vendor\autoload.php';
require 'config\database.php';


 //se toma el nombre del usuario
 $nombre_de_usuario=$_SESSION["alumno"];
 echo '<strong>Alumno ',$nombre_de_usuario,'</strong> <br> <br> ';

 //se busca el ID del alumno ingresado 
 $alumnoID = DB::table('alumnos')->where('nombre', $nombre_de_usuario)->value('idalumnos');

 //busca  si hay un ID igual al ingresado
 $revisionID=0;
 $revisionID= DB::table('calificaciones')->where('alumnos_idalumnos', $alumnoID)->value('alumnos_idalumnos');

  //se busca el ID de la tabla
 $tablaID=0;
 $tablaID = DB::table('calificaciones')->where('alumnos_idalumnos', $alumnoID)->value('idcalificaciones');

 if ($tablaID==null)
 {
   echo 'no hay registro';
 }
 else
 {
   //se muestran los datos guardados dentro de la tabla
   $esp_echo = DB::table('calificaciones')->where('idcalificaciones', $tablaID)->value('esp');
   $mat_echo = DB::table('calificaciones')->where('idcalificaciones', $tablaID)->value('mat');
   $his_echo = DB::table('calificaciones')->where('idcalificaciones', $tablaID)->value('his');

    echo '<strong>Español : </strong>',$esp_echo;
    echo '<br>';
    echo '<strong>Matemáticas: </strong>',$mat_echo;
    echo '<br>';
    echo '<strong>Historia: </strong>',$his_echo;
    echo '<br>';

    $promedio1=$esp_echo+$mat_echo+$his_echo;
    $promedio2=$promedio1/3;

    echo '<br><br><strong>tu promedio es: </strong>',$promedio2;
    if ($promedio2<6)
    echo '<br><br><strong> GAME OVER </strong>';
    else{
        echo '<br><br><strong> Wow! incredible</strong>';
    }
 }

