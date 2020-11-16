
<?php
require_once 'index.php';


if(!isset($_SESSION["maestro"]))
{
 echo('no puedes estar aqui');
}
else{

echo <<<_INSERTARCAL

<section class="section">
    <p>- insertar y editar calificaciones -</p>
    <br>
<form method="get" action="calresult.php">

 <p>nombre del alumno</p>
   <input type="text" name="nombre">
 <p>español</p>
   <input type="text" name="esp">
 <p>matemáticas</p>
   <input type="text" name="mat">
 <p>historia</p>
   <input type="text" name="his">
  <br> 
  <br>
   <button class="button is-danger is-light" type="submit">insertar</button>

</form>
</section>
_INSERTARCAL;
}
