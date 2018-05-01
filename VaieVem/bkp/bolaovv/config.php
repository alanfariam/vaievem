<?php

session_start();

$dsn = "mysql:dbname=bolao;host=localhost";
$dbuser = "root";
$dbpass = "";

try{
	$pdo = new PDO($dsn,$dbuser,$dbpass);

} catch (PDOException $e){
	echo "Falha ao conectar com o banco de dados: ".$e->getMessage();
}

?>