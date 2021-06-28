<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:https://databases.000webhost.com;dbname=id17149195_ventas",
			            "id17149195_root",
			            "Ou{>#?R-DXhS!e1F");

		$link->exec("set names utf8");

		return $link;

	}

}
