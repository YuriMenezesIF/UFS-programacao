<?php

include_once("model/Usuario.php");

$user = new Usuario();
$user->setNome($_POST["nome"]);
$user->setEmail($_POST["email"]);
$user->setSenha($_POST["senha"]);
$user->salvarUser();
?>  