<?php

require_once "../class/Conexao.php";

$salvar=true;
if(!isset($_POST["nome"])){
$salvar=false;
}
if(!isset($_POST["email"])){
$salvar=false;
}
if(!isset($_POST["senha"])){
$salvar=false;
}
if($salvar){
  
Conexao::salvarUser();

        
}
header("Location:../index.php");