<?php
require_once "../class/Conexao.php";

$remove = true;

if(!isset($_GET["id"])){
  $remove = false;
}
if($remove){
Conexao::deletar();
}


header("Location:../index.php");