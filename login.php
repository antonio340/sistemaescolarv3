
<?php
require_once 'index.php';


if(!isset($_SESSION["maestro"]))
{
 echo <<<_LOGIN1

 <br>
 <br>

     <p>- ingresar como maestro -</p>
 <form name="login" method="post" action="loginmaestro.php">
  <p>nombre</p>
    <input type="text" name="nombre">
  <p>contraseña</p>
    <input type="password" name="pass">
  <p>ingresar</p>
    <button type="submit" class="btn btn-primary">login</button>
   
 </form>

 <br>
 <br>

 <p>- ingresar como alumno -</p>
 <form name="form1" method="post" action="loginalumno.php">
  <p>nombre</p>
    <input type="text" name="nombre">
  <p>contraseña</p>
    <input type="password" name="pass">
  <p>ingresar</p>
    <button type="submit" class="btn btn-primary">login</button>

 </form>

_LOGIN1;
}
else
{
  $nombre_de_usuario=$_SESSION["maestro"];
   echo 'sesion iniciada como: ',$nombre_de_usuario,'<br> ';
}
