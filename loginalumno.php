<?php
require_once 'index.php';
use Illuminate\Database\Capsule\Manager as DB;
require 'vendor\autoload.php';
require 'config\database.php';

//resultados de lo ingresado en los cuadros
$nombre=$_POST['nombre'];
$pass=$_POST['pass'];

$revision_de_nombre = DB::table('alumnos')->where('nombre', $nombre)->value('nombre');


$revision_de_pass=DB::table('alumnos')->where('pass', $pass)->value('pass');


echo '<br>';

if ($nombre==null or $pass==null){
    echo '<img src="Error de usuario.png" alt="" height="100px" width="300px">';
}
//si no 
else{

 //si el nombre y la contraseña son iguales a los de una tabla entonces
 if ($nombre==$revision_de_nombre & $pass==$revision_de_pass){
     //se inicia la sesión
    session_start();
    $_SESSION["alumno"]=$nombre;
    echo 'ingresaste como alumno';
    header("location:tucalificacion.php");
    
 }
 else
 {
    echo '<img src="Error de usuario.png" alt="" height="100px" width="300px">';
 }
}
