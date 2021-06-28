<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=https://baseventas.000webhostapp.com;dbname=id17149195_ventas",
			            "id17149195_ventas2021",
			            "msmWS)}0Xu*Orl+7");

		$link->exec("set names utf8");

		return $link;

	}

}
