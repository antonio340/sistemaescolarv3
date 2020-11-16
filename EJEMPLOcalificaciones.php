<?php
use Illuminate\Database\Capsule\Manager as DB;
require 'vendor\autoload.php';
require 'config\database.php';

$cal=$_POST['calificacion'];

DB::table('calificaciones')->insert(['calificacion' => $cal]);
echo 'datos guardados';