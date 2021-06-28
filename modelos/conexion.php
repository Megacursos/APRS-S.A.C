<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:https://databases.000webhost.com/db_structure.php?server=1&db=id17149195_ventas;dbname=id17149195_ventas",
			            "id17149195_ventas2021",
			            "msmWS)}0Xu*Orl+7");

		$link->exec("set names utf8");

		return $link;

	}

}
