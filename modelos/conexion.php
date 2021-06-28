<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:sql10.freesqldatabase.com;dbname=sql10421945",
			            "sql10421945",
			            "cwx66emECQ");

		$link->exec("set names utf8");

		return $link;

	}

}
