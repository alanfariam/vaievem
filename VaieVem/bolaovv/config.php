<?php
require 'environment.php';

$config = array();

if(ENVIRONMENT == 'development'){
	define("BASE_URL", "http://localhost/vaievem/bolaovv/");
	$dsn = "mysql:dbname=bolao;host=localhost";
	$dbuser = "root";
	$dbpass = "";
} else {
	define("BASE_URL", "http://portalvv.com.br/bolaovv/");
	$dsn = "mysql:dbname=porta426_bolao;host=108.167.132.210";
	$dbuser = "porta426_adm";
	$dbpass = "plc001";
}


try{
	$db = new PDO($dsn,$dbuser,$dbpass);
} catch (PDOException $e){
	echo "Falha ao conectar com o banco de dados: ".$e->getMessage();
	exit;
}

?>