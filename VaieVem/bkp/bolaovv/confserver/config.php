<?php


$dsn = "mysql:dbname=porta426_bolao;host=108.167.132.210";
$dbuser = "porta426_adm";
$dbpass = "plc001";

try{
	$pdo = new PDO($dsn,$dbuser,$dbpass);

} catch (PDOException $e){
	echo "Falha ao conectar com o banco de dados: ".$e->getMessage();
}

?>