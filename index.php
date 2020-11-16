<?php
require_once "header.php";
require "vendor/autoload.php";

session_start();
//si no se encuentra una sesión de maestro entonces muestra lo siguiente
if(!isset($_SESSION["maestro"]) and !isset($_SESSION["alumno"]))
{
 echo <<<_LOGIN1

 
 <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
 </nav>

 <section class="section">
     <h4 class="title is-4">- ingresar como maestro -</h4>
 <form name="login" method="post" action="loginmaestro.php">
  <strong>nombre</strong>
    <input type="text" name="nombre">
  <strong>contraseña</strong>
    <input type="password" name="pass">
    <button class="button is-danger is-light" type="submit" >login</button>
   
 </form>
</section>
 <br>
 <br>

 <section class="section">
 <h4 class="title is-4">- ingresar como alumno -</h4>
 <form name="form1" method="post" action="loginalumno.php">
  <strong>nombre</strong>
    <input type="text" name="nombre">
  <strong>contraseña</strong>
    <input type="password" name="pass">
    <button class="button is-danger is-light" type="submit" >login</button>

 </form>
 </section>
_LOGIN1;
}
//si encontró una sesión de maestro entonces 
else
{
 
    if(isset($_SESSION["alumno"]))
    {
     
    echo <<<_LOGGED2

    <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
            <div class="buttons">
          <a class="button is-dark" href="logout.php">
             <strong>Log out</strong>
          </a>
        </nav>
_LOGGED2;
     }
     else
     {
        $nombre_de_usuario=$_SESSION["maestro"];
 
   echo <<<_LOGGED1

    <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
            <div class="buttons">
          <a class="button is-dark" href="logout.php">
             <strong>Log out</strong>
          </a>
          <a class="button is-dark" href="insertarcal.php">
          <strong>Insertar calificación</strong>
       </a>
       <a class="button is-dark" href="erasecal1.php">
       <strong>eliminar calificación</strong>
    </a>
    </nav>
          
    <section class="hero">
    <div class="hero-head">
      
        <h1 class="title">
        sesion iniciada como: 
        </h1>
        <h2 class="subtitle">
         -$nombre_de_usuario-
        </h2>
      </div>
  </section>



_LOGGED1;




     }
}
