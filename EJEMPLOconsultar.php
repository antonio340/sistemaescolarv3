<?php
use Illuminate\Database\Capsule\Manager as DB;
require 'vendor\autoload.php';
require 'config\database.php';

$cals = DB::table('calificaciones')->get();
foreach ($cals as $cal) {
    echo $cal->calificacion;
    echo '<br>';
}