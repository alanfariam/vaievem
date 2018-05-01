<?php
require 'config.php';
require 'Classes/usuarios.class.php';


$u = new Usuarios($pdo);

$u->setNome('Teste');
$u->setUsuario('Teste');
$u->setEmail('teste@teste.com.br');
$u->setSenha('Teste');
$u->setTipo('U');
$u->salvar();

echo "teste";



?>