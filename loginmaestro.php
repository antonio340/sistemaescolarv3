<?php
require_once 'index.php';
use Illuminate\Database\Capsule\Manager as DB;
require 'vendor\autoload.php';
require 'config\database.php';

//resultados de lo ingresado en los cuadros
$nombre=$_POST['nombre'];
$pass=$_POST['pass'];

//se detecta el nombre en la tabla
$revision_de_nombre = DB::table('maestros')->where('nombre', $nombre)->value('nombre');


//se detecta la contraseña en la tabla
$revision_de_pass=DB::table('maestros')->where('pass', $pass)->value('pass');

echo '<br>';

//si la casilla nombre estaba vacia entonces
if ($nombre==null or $pass==null){
    echo '<img src="Error de usuario.png" alt="" height="100px" width="300px">';
}
//si no 
else{

 //si el nombre y la contraseña son iguales a los de una tabla entonces
 if ($nombre==$revision_de_nombre & $pass==$revision_de_pass){
     //se inicia la sesión
    session_start();
    $_SESSION["maestro"]=$nombre;
    echo 'ingresaste como maestro';
    header("location:insertarcal.php");
    
 }
 else
 {
    echo '<img src="Error de usuario.png" alt="" height="100px" width="300px">';
 }
}
