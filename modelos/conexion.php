<?php

Class Conexion {

   static public function conectar(){

   $link = new PDO("mysql:host=localhost;dbname=lingoscl_reservas",
                   "lingoscl_taylor",
                    "lingosdatabase");

    $link->exec("set names utf8");                
    return $link;

   }




}