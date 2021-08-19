<?php

Class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=reservas",
						"root",
						"");

		$link->exec("set names utf8");

		return $link;

	}


}